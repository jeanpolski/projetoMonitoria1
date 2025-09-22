@extends('layouts.app')

@section('title', 'Nova Sessão')

@section('content')
<form action="{{ route('sessions.store') }}" method="POST">
    @csrf

    <!-- Monitor -->
    <div class="mb-3">
        <label>Monitor</label>
        <select name="monitor_id" class="form-control" required>
            <option value="" disabled selected>Selecione um monitor</option>
            @foreach($monitores as $monitor)
                <option value="{{ $monitor->id }}">{{ $monitor->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Aluno -->
    <div class="mb-3">
        <label>Aluno</label>
        <select name="aluno_id" class="form-control" required>
            <option value="" disabled selected>Selecione um aluno</option>
            @foreach($alunos as $aluno)
                <option value="{{ $aluno->id }}">{{ $aluno->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Data -->
    <div class="mb-3">
        <label>Data</label>
        <input type="date" name="data" class="form-control" required>
    </div>

    <!-- Hora Início -->
    <div class="mb-3">
        <label>Hora Início</label>
        <input type="text" id="hora_inicio" name="hora_inicio" class="form-control" required>
    </div>

    <!-- Hora Fim -->
    <div class="mb-3">
        <label>Hora Fim</label>
        <input type="text" id="hora_fim" name="hora_fim" class="form-control" required>
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
