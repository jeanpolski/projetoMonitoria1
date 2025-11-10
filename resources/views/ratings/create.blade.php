@extends('layouts.app')

@section('title', 'Avaliar Sessão')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Avaliar Sessão com {{ $session->monitor->name }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('rating.store') }}" method="POST">
                @csrf
                <input type="hidden" name="session_id" value="{{ $session->id }}">

                <div class="mb-3">
                    <label class="form-label"><strong>Informações da Sessão:</strong></label>
                    <ul>
                        <li><strong>Monitor:</strong> {{ $session->monitor->name }}</li>
                        <li><strong>Matéria:</strong> {{ $session->monitor->subject->name ?? 'N/A' }}</li>
                        <li><strong>Data:</strong> {{ $session->data }}</li>
                        <li><strong>Horário:</strong> {{ $session->hora_inicio }} - {{ $session->hora_fim }}</li>
                    </ul>
                </div>

                <div class="mb-3">
                    <label for="rate" class="form-label">Nota da Sessão (1 a 5) *</label>
                    <select name="rate" id="rate" class="form-select" required>
                        <option value="">Selecione uma nota...</option>
                        <option value="1">⭐ (1) - Muito Ruim</option>
                        <option value="2">⭐⭐ (2) - Ruim</option>
                        <option value="3">⭐⭐⭐ (3) - Regular</option>
                        <option value="4">⭐⭐⭐⭐ (4) - Bom</option>
                        <option value="5">⭐⭐⭐⭐⭐ (5) - Excelente</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="note" class="form-label">Comentário (opcional)</label>
                    <textarea name="note" id="note" class="form-control" rows="4" 
                              placeholder="Deixe seu feedback sobre a sessão..."></textarea>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('sessions.index') }}" class="btn btn-secondary">
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-success">
                        Enviar Avaliação
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection