<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::withCount('monitores')->orderBy('name')->get();
        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:subject,name',
            'description' => 'nullable|string|max:1000'
        ], [
            'name.required' => 'O nome da matéria é obrigatório',
            'name.unique' => 'Já existe uma matéria com este nome',
            'name.max' => 'O nome não pode ter mais de 255 caracteres',
            'description.max' => 'A descrição não pode ter mais de 1000 caracteres'
        ]);

        Subject::create($validated);

        return redirect()->route('subjects.index')
            ->with('success', 'Matéria criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        $subject->load('monitores');
        return view('subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:subject,name,' . $subject->id,
            'description' => 'nullable|string|max:1000'
        ], [
            'name.required' => 'O nome da matéria é obrigatório',
            'name.unique' => 'Já existe uma matéria com este nome',
            'name.max' => 'O nome não pode ter mais de 255 caracteres',
            'description.max' => 'A descrição não pode ter mais de 1000 caracteres'
        ]);

        $subject->update($validated);

        return redirect()->route('subjects.index')
            ->with('success', 'Matéria atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        // Verifica se há monitores vinculados
        if ($subject->monitores()->count() > 0) {
            return redirect()->route('subjects.index')
                ->with('error', 'Não é possível excluir esta matéria pois há monitores vinculados a ela.');
        }

        $subject->delete();

        return redirect()->route('subjects.index')
            ->with('success', 'Matéria excluída com sucesso!');
    }
}