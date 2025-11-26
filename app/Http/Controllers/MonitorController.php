<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonitorController extends Controller
{
    public function index()
    {
        $monitors = User::where('role', 'monitor')->with('subject')->get();
        return view('monitors.index', compact('monitors'));
    }

    public function show(User $monitor)
    {
        return view('monitors.show', compact('monitor'));
    }


    public function create()
    {
        if (!Auth::check() || Auth::user()->role !== 'monitor') {
            abort(403);
        }

        $subjects = Subject::all();
        return view('monitors.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'monitor') {
            abort(403);
        }

        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|string|min:6|confirmed',
            'subject_id' => 'required|exists:subject,id',
        ]);

        $data['role'] = 'monitor';
        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('monitors.index')->with('success', 'Monitor cadastrado com sucesso!');
    }

    public function edit(User $monitor)
    {
        if (!Auth::check() || Auth::user()->role !== 'monitor') {
            abort(403);
        }

        $subjects = Subject::all();
        return view('monitors.edit', compact('monitor', 'subjects'));
    }

    public function update(Request $request, User $monitor)
    {
        if (!Auth::check() || Auth::user()->role !== 'monitor') {
            abort(403);
        }

        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => "required|email|unique:users,email,{$monitor->id}",
            'password'   => 'nullable|string|min:6|confirmed',
            'subject_id' => 'required|exists:subject,id',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $monitor->update($data);

        return redirect()->route('monitors.index')->with('success', 'Monitor atualizado com sucesso!');
    }

    public function destroy(User $monitor)
    {
        if (!Auth::check() || Auth::user()->role !== 'monitor') {
            abort(403);
        }

        $monitor->delete();

        return redirect()->route('monitors.index')->with('success', 'Monitor removido com sucesso!');
    }
}
