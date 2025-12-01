<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use App\Models\User;

class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::all();
        return view('sessions.index', compact('sessions'));
    }

    public function create()
    {
        $user = auth()->user();

        if ($user->role === 'aluno') {
            $alunos = collect([$user]);
        } else {
            $alunos = User::where('role', 'aluno')->get();
        }

        $monitores = User::where('role', 'monitor')->get();

        return view('sessions.create', [
            'monitores' => $monitores,
            'alunos' => $alunos,
            'monitoresJson' => json_encode($monitores, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT)
        ]);
    }


    public function store(Request $request)
    {
        $user = auth()->user();

        if ($user->role === 'aluno' && (int)$request->aluno_id !== (int)$user->id) {
            return redirect()->back()
                ->withErrors(['aluno_id' => 'Alunos só podem criar sessões para si mesmos.'])
                ->withInput();
        }

        $data = $request->validate([
            'monitor_id' => 'required|exists:users,id',
            'aluno_id'   => 'required|exists:users,id',
            'data'       => 'required|date',
            'hora_inicio' => 'required',
            'hora_fim'   => 'required'
        ]);

        Session::create($data);

        return redirect()->route('sessions.index')
            ->with('success', 'Sessão criada com sucesso!');
    }


    public function edit(Session $session)
    {
        $user = auth()->user();

        if ($user->role === 'aluno') {
            $alunos = collect([$user]);
        } else {
            $alunos = User::where('role', 'aluno')->get();
        }

        $monitores = User::where('role', 'monitor')->get();
        return view('sessions.edit', compact('session', 'alunos', 'monitores'));
    }

    public function show(Session $session)
    {
        $session->load(['monitor', 'aluno', 'rating']);
        return view('sessions.show', compact('session'));
    }

    public function update(Request $request, Session $session)
    {
        $user = auth()->user();

        if ($user->role === 'aluno' && (int)$session->aluno_id !== (int)$user->id) {
            return redirect()->back()
                ->withErrors(['error' => 'Você não tem permissão para editar esta sessão.'])
                ->withInput();
        }

        $data = $request->validate([
            'monitor_id' => 'required|exists:users,id',
            'aluno_id'   => 'required|exists:users,id',
            'data'       => 'required|date',
            'hora_inicio' => 'required',
            'hora_fim'   => 'required',
            'status'     => 'in:PENDENTE,CONFIRMADA,CANCELADA,CONCLUIDA'
        ]);

        $session->update($data);
        return redirect()->route('sessions.index')->with('success', 'Sessão atualizada com sucesso!');
    }

    public function destroy(Session $session)
    {
        $session->delete();
        return redirect()->route('sessions.index')
            ->with('success', 'Sessão removida com sucesso!');
    }
}
