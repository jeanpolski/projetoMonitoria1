@extends('layouts.app')

@section('title', 'Lista de Sessões')

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        ✅ {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        ❌ {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Lista de Sessões</h2>
    <a href="{{ route('sessions.create') }}" class="btn btn-primary">
        ➕ Nova Sessão
    </a>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Monitor</th>
                <th>Matéria</th>
                <th>Aluno</th>
                <th>Data</th>
                <th>Horário</th>
                <th>Status</th>
                <th>Avaliação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @forelse($sessions as $session)
            <tr>
                <td>{{ $session->id }}</td>
                <td>{{ $session->monitor->name ?? 'N/A' }}</td>
                <td>{{ $session->monitor->subject->name ?? '-' }}</td>
                <td>{{ $session->aluno->name ?? 'N/A' }}</td>
                <td>{{ \Carbon\Carbon::parse($session->data)->format('d/m/Y') }}</td>
                <td>{{ $session->hora_inicio }} - {{ $session->hora_fim }}</td>
                <td>
                    @if($session->status === 'concluida')
                        <span class="badge bg-success">Concluída</span>
                    @elseif($session->status === 'agendada')
                        <span class="badge bg-warning">Agendada</span>
                    @else
                        <span class="badge bg-secondary">{{ $session->status }}</span>
                    @endif
                </td>
                <td class="text-center">
                    @if($session->rating)
                        <span class="badge bg-info">⭐ {{ $session->rating->rate }}/5</span>
                    @elseif($session->status === 'concluida')
                        <a href="{{ route('rating.create', $session->id) }}" 
                           class="btn btn-sm btn-warning">
                            Avaliar
                        </a>
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td>
                <td>
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('sessions.show', $session->id) }}" 
                           class="btn btn-info" title="Visualizar">
                            👁️
                        </a>
                        <a href="{{ route('sessions.edit', $session->id) }}" 
                           class="btn btn-secondary" title="Editar">
                            ✏️
                        </a>
                        <form action="{{ route('sessions.destroy', $session->id) }}" 
                              method="POST" style="display:inline"
                              onsubmit="return confirm('Confirma a exclusão desta sessão?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" title="Excluir">
                                🗑️
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center text-muted">
                    Nenhuma sessão cadastrada ainda.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection