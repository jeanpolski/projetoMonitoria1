<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Session;

class RatingController extends Controller
{
    public function create($sessionId)
    {
        $session = Session::findOrFail($sessionId);
        
        // Comparação case-insensitive
        if (strtolower($session->status) !== 'concluida') {
            return redirect()->route('sessions.index')
                ->with('error', 'Apenas sessões concluídas podem ser avaliadas!');
        }
        
        if ($session->rating) {
            return redirect()->route('sessions.index')
                ->with('error', 'Esta sessão já foi avaliada!');
        }
        
        return view('ratings.create', compact('session'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'session_id' => 'required|exists:monitor_sessions,id',
            'rate' => 'required|integer|min:1|max:5',
            'note' => 'nullable|string|max:500',
        ], [
            'rate.required' => 'Por favor, selecione uma nota de 1 a 5.',
            'rate.min' => 'A nota mínima é 1.',
            'rate.max' => 'A nota máxima é 5.',
            'note.max' => 'O comentário não pode ter mais de 500 caracteres.',
        ]);
        
        $session = Session::findOrFail($validated['session_id']);
        
        if (strtolower($session->status) !== 'concluida') {
            return redirect()->route('sessions.index')
                ->with('error', 'Apenas sessões concluídas podem ser avaliadas!');
        }
        
        if ($session->rating) {
            return redirect()->route('sessions.index')
                ->with('error', 'Esta sessão já foi avaliada!');
        }
        
        $validated['aluno_id'] = $session->aluno_id;
        
        Rating::create($validated);
        
        return redirect()->route('sessions.index')
            ->with('success', 'Avaliação enviada com sucesso! ⭐');
    }
}