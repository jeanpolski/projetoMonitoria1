@extends('layouts.app')

@section('title', 'Lista de Sessões')

@section('content')
<a href="{{ route('sessions.create') }}" class="btn btn-primary mb-3">Nova Sessão</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Monitor</th>
            <th>Aluno</th>
            <th>Data</th>
            <th>Hora Início</th>
            <th>Hora Fim</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sessions as $session)
        <tr>
            <td>{{ $session->id }}</td>
            <td>{{ $session->monitor->name ?? 'N/A' }}</td>
            <td>{{ $session->aluno->name ?? 'N/A' }}</td>
            <td>{{ $session->data }}</td>
            <td>{{ $session->hora_inicio }}</td>
            <td>{{ $session->hora_fim }}</td>
            <td>{{ $session->status }}</td>
            <td>
                <a href="{{ route('sessions.show', $session->id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('sessions.edit', $session->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('sessions.destroy', $session->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Confirma exclusão?')">Excluir</button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection