@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Disponibilidades dos Monitores</h1>

    <a href="{{ route('availabilities.create') }}" class="btn btn-primary mb-3">Adicionar Disponibilidade</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Monitor</th>
                <th>Matéria</th>
                <th>Dia da Semana</th>
                <th>Hora Início</th>
                <th>Hora Fim</th>
                <th>Duração (h)</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($availabilities as $availability)
                <tr>
                    <td>{{ $availability->monitor->name ?? 'N/A' }}</td>
                    <td>{{ $availability->monitor->subject->name ?? '-' }}</td>
                    <td>{{ \App\Models\Availability::diasSemana()[$availability->dia_semana] }}</td>
                    <td>{{ \Carbon\Carbon::parse($availability->hora_inicio)->format('H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($availability->hora_fim)->format('H:i') }}</td>
                    <td>
                        {{ \Carbon\Carbon::parse($availability->hora_inicio)->diffInHours(\Carbon\Carbon::parse($availability->hora_fim)) }}
                    </td>
                    <td>
                        <a href="{{ route('availabilities.show', $availability->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('availabilities.edit', $availability->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('availabilities.destroy', $availability->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">Nenhuma disponibilidade cadastrada</td></tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ url('/') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
