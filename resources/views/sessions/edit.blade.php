@extends('layouts.app')

@section('title', 'Editar Sessão')

@section('content')
<h2>Editar Sessão</h2>

<form action="{{ route('sessions.update', $session->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Monitor -->
    <div class="mb-3">
        <label>Monitor</label>
        <select name="monitor_id" class="form-control" required>
            @foreach($monitores as $monitor)
            <option value="{{ $monitor->id }}" {{ $monitor->id == $session->monitor_id ? 'selected' : '' }}>
                {{ $monitor->name }}
            </option>
            @endforeach
        </select>
    </div>

    <!-- Aluno -->
    <div class="mb-3">
        <label>Aluno</label>
        <select name="aluno_id" class="form-control" required>
            @foreach($alunos as $aluno)
            <option value="{{ $aluno->id }}" {{ $aluno->id == $session->aluno_id ? 'selected' : '' }}>
                {{ $aluno->name }}
            </option>
            @endforeach
        </select>
    </div>

    <!-- Data -->
    <div class="mb-3">
        <label>Data</label>
        <input type="date" name="data" value="{{ $session->data }}" class="form-control" required>
    </div>

    <!-- Hora Início -->
    <div class="mb-3">
        <label>Hora Início</label>
        <input type="text" id="hora_inicio" name="hora_inicio" value="{{ $session->hora_inicio }}" class="form-control" required>
    </div>

    <!-- Hora Fim -->
    <div class="mb-3">
        <label>Hora Fim</label>
        <input type="text" id="hora_fim" name="hora_fim" value="{{ $session->hora_fim }}" class="form-control" required>
    </div>

    <!-- Status -->
    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control" required>
            @foreach(['PENDENTE','CONFIRMADA','CANCELADA','CONCLUIDA'] as $status)
            <option value="{{ $status }}" {{ $status == $session->status ? 'selected' : '' }}>
                {{ $status }}
            </option>
            @endforeach
        </select>

    </div>

    <!-- Botões -->
    <button type="submit" class="btn btn-success">Salvar</button>
</form>
<a href="{{ route('sessions.index') }}" class="btn btn-secondary mt-2">Voltar</a>

<!-- Flatpickr -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#hora_inicio", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i"
    });

    flatpickr("#hora_fim", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i"
    });
</script>
@endsection