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
        
        if ($session->status !== 'concluida') {
            return redirect()->route('sessions.index')
                ->with('error', 'Apenas sessões concluídas podem ser avaliadas!');
        }
        
        if ($session->rating) {
            return redirect()->route('sessions.index')
                ->with('error', 'Esta sessão já foi avaliada!');
        }
        
        return view('rating.create', compact('session'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'session_id' => 'required|exists:session,id',
            'rate' => 'required|integer|min:1|max:5',
            'note' => 'nullable|string|max:500',
        ]);
        
        $session = Session::findOrFail($validated['session_id']);
        
        if ($session->status !== 'concluida') {
            return redirect()->route('sessions.index')
                ->with('error', 'Apenas sessões concluídas podem ser avaliadas!');
        }
        
        Rating::create($validated);
        
        return redirect()->route('sessions.index')
            ->with('success', 'Avaliação enviada com sucesso!');
    }
}