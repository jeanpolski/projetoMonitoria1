<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use App\Models\User;

class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::with(['monitor', 'aluno'])->get(); //ADICIONAR RATING, FIZ MERDA E N SABIA COMO ARRUMAR
        return view('sessions.index', compact('sessions'));
    }

    public function create()
    {
        $alunos = User::where('role', 'aluno')->get();
        $monitores = User::where('role', 'monitor')->get();

        return view('sessions.create', compact('alunos', 'monitores'));
    }


    public function store(Request $request)
    {
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

    public function show(Session $session)
    {
        $session->load(['monitor', 'aluno', 'rating']);
        return view('sessions.show', compact('session'));
    }

    public function edit(Session $session)
    {
        $alunos = User::where('role', 'aluno')->get();
        $monitores = User::where('role', 'monitor')->get();
        return view('sessions.edit', compact('session', 'alunos', 'monitores'));
    }


    public function update(Request $request, Session $session)
    {
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
