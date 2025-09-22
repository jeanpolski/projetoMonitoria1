@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Disponibilidade Semanal</h1>

    <form action="{{ route('availabilities.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="monitor_id" class="form-label">Monitor</label>
            <select name="monitor_id" id="monitor_id" class="form-control" required>
                <option value="">Selecione o monitor</option>
                @foreach($monitores as $monitor)
                    <option value="{{ $monitor->id }}">{{ $monitor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="dia_semana" class="form-label">Dia da Semana</label>
            <select name="dia_semana" id="dia_semana" class="form-control" required>
                <option value="">Selecione o dia</option>
                @foreach(\App\Models\Availability::diasSemana() as $key => $label)
                    <option value="{{ $key }}">{{ $label }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="hora_inicio" class="form-label">Hora Início</label>
            <input type="text" name="hora_inicio" id="hora_inicio" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="hora_fim" class="form-label">Hora Fim</label>
            <input type="text" name="hora_fim" id="hora_fim" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('availabilities.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>

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
