@extends('layouts.app')

@section('content')
<style>
    .form-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 32px 16px;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    }
    
    .form-card {
        background: white;
        border-radius: 20px;
        padding: 48px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
        max-width: 580px;
        width: 100%;
    }
    
    .form-header {
        text-align: center;
        margin-bottom: 40px;
    }
    
    .page-title {
        color: #0f172a;
        font-weight: 700;
        font-size: 28px;
        margin-bottom: 8px;
    }
    
    .page-subtitle {
        color: #64748b;
        font-size: 15px;
    }
    
    .form-group {
        margin-bottom: 24px;
    }
    
    .form-label-custom {
        font-weight: 600;
        color: #334155;
        font-size: 14px;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .form-control-custom {
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        padding: 14px 16px;
        font-size: 15px;
        transition: all 0.2s;
        width: 100%;
    }
    
    .form-control-custom:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        outline: none;
    }
    
    .time-inputs {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }
    
    .form-actions {
        display: flex;
        gap: 12px;
        margin-top: 32px;
        padding-top: 32px;
        border-top: 2px solid #f1f5f9;
    }
    
    .btn-primary-custom {
        flex: 1;
        background: #3b82f6;
        color: white;
        border: none;
        padding: 14px 24px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 15px;
        transition: all 0.2s;
        cursor: pointer;
    }
    
    .btn-primary-custom:hover {
        background: #2563eb;
        transform: translateY(-1px);
        box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
    }
    
    .btn-secondary-custom {
        flex: 1;
        background: white;
        color: #64748b;
        border: 2px solid #e2e8f0;
        padding: 14px 24px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 15px;
        transition: all 0.2s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    
    .btn-secondary-custom:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
        color: #334155;
        transform: translateY(-1px);
    }
    
    .icon-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background: #f1f5f9;
        border-radius: 10px;
        margin-bottom: 16px;
    }
    
    @media (max-width: 768px) {
        .form-card {
            padding: 32px 24px;
        }
        
        .time-inputs {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="form-container">
    <div class="form-card">
        <div class="form-header">
            <h1 class="page-title">Nova Disponibilidade</h1>
            <p class="page-subtitle">Defina os horários disponíveis para monitoria</p>
        </div>

        <form action="{{ route('availabilities.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="monitor_id" class="form-label-custom">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    Monitor
                </label>
                <select name="monitor_id" id="monitor_id" class="form-control form-control-custom" required>
                    <option value="">Selecione o monitor</option>
                    @foreach($monitores as $monitor)
                        <option value="{{ $monitor->id }}">{{ $monitor->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="dia_semana" class="form-label-custom">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    Dia da Semana
                </label>
                <select name="dia_semana" id="dia_semana" class="form-control form-control-custom" required>
                    <option value="">Selecione o dia</option>
                    @foreach(\App\Models\Availability::diasSemana() as $key => $label)
                        <option value="{{ $key }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="time-inputs">
                <div class="form-group">
                    <label for="hora_inicio" class="form-label-custom">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        Hora Início
                    </label>
                    <input type="text" name="hora_inicio" id="hora_inicio" class="form-control form-control-custom" placeholder="08:00" required>
                </div>

                <div class="form-group">
                    <label for="hora_fim" class="form-label-custom">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        Hora Fim
                    </label>
                    <input type="text" name="hora_fim" id="hora_fim" class="form-control form-control-custom" placeholder="12:00" required>
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('availabilities.index') }}" class="btn-secondary-custom">Voltar</a>
                <button type="submit" class="btn-primary-custom">Salvar Disponibilidade</button>
            </div>
        </form>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#hora_inicio", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true
    });

    flatpickr("#hora_fim", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true
    });
</script>
@endsection
