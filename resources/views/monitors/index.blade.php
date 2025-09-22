@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Monitores</h1>
    <a href="{{ route('monitors.create') }}" class="btn btn-success mb-3">Adicionar Monitor</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Matéria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($monitors as $monitor)
                <tr>
                    <td>{{ $monitor->name }}</td>
                    <td>{{ $monitor->email }}</td>
                    <td>{{ $monitor->subject->name ?? '-' }}</td>
                    <td>
                        <a href="{{ route('monitors.edit', $monitor->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('monitors.destroy', $monitor->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
