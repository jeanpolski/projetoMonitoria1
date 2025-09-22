<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\User;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    public function index()
    {
        $availabilities = Availability::with('monitor')->get();
        return view('availabilities.index', compact('availabilities'));
    }

    public function create()
    {
        $monitores = User::where('role', 'monitor')->get();
        return view('availabilities.create', compact('monitores'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'monitor_id'  => 'required|exists:users,id',
            'dia_semana'  => 'required|in:segunda,terca,quarta,quinta,sexta,sabado,domingo',
            'hora_inicio' => 'required',
            'hora_fim'    => 'required',
        ]);

        Availability::create($data);

        return redirect()->route('availabilities.index')
                         ->with('success', 'Disponibilidade cadastrada com sucesso!');
    }

    public function show(Availability $availability)
    {
        return view('availabilities.show', compact('availability'));
    }

    public function edit(Availability $availability)
    {
        $monitores = User::where('role', 'monitor')->get();
        return view('availabilities.edit', compact('availability', 'monitores'));
    }

    public function update(Request $request, Availability $availability)
    {
        $data = $request->validate([
            'monitor_id'  => 'required|exists:users,id',
            'dia_semana'  => 'required|in:segunda,terca,quarta,quinta,sexta,sabado,domingo',
            'hora_inicio' => 'required',
            'hora_fim'    => 'required',
        ]);

        $availability->update($data);

        return redirect()->route('availabilities.index')
                         ->with('success', 'Disponibilidade atualizada com sucesso!');
    }

    public function destroy(Availability $availability)
    {
        $availability->delete();

        return redirect()->route('availabilities.index')
                         ->with('success', 'Disponibilidade excluída com sucesso!');
    }
}
