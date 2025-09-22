@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Disponibilidade Semanal</h1>

    <form action="{{ route('availabilities.update', $availability->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="monitor_id" class="form-label">Monitor</label>
            <select name="monitor_id" id="monitor_id" class="form-control" required>
                <option value="">Selecione o monitor</option>
                @foreach($monitores as $monitor)
                    <option value="{{ $monitor->id }}" {{ $monitor->id == $availability->monitor_id ? 'selected' : '' }}>
                        {{ $monitor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="dia_semana" class="form-label">Dia da Semana</label>
            <select name="dia_semana" id="dia_semana" class="form-control" required>
                <option value="">Selecione o dia</option>
                @foreach(\App\Models\Availability::diasSemana() as $key => $label)
                    <option value="{{ $key }}" {{ $key == $availability->dia_semana ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="hora_inicio" class="form-label">Hora Início</label>
            <input type="text" name="hora_inicio" id="hora_inicio" class="form-control" value="{{ $availability->hora_inicio }}" required autocomplete="off">
        </div>

        <div class="mb-3">
            <label for="hora_fim" class="form-label">Hora Fim</label>
            <input type="text" name="hora_fim" id="hora_fim" class="form-control" value="{{ $availability->hora_fim }}" required autocomplete="off">
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('availabilities.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>

<!-- Flatpickr -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#hora_inicio", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        defaultDate: "{{ $availability->hora_inicio }}"
    });

    flatpickr("#hora_fim", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        defaultDate: "{{ $availability->hora_fim }}"
    });
</script>
@endsection
