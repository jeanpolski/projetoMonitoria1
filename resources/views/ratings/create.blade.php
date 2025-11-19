@extends('layouts.app')

@section('content')

<style>
    body {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        min-height: 100vh;
    }
    
    .main-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
    }
    
    .form-card {
        background: white;
        border-radius: 24px;
        padding: 48px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        max-width: 700px;
        width: 100%;
    }
    
    .page-title {
        color: #1e293b;
        font-weight: 700;
        font-size: 32px;
        margin-bottom: 8px;
        text-align: center;
    }
    
    .page-subtitle {
        color: #64748b;
        font-size: 16px;
        text-align: center;
        margin-bottom: 40px;
    }
    
    .session-info-box {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        border-radius: 16px;
        padding: 24px;
        margin-bottom: 32px;
        color: white;
    }
    
    .session-info-title {
        font-weight: 600;
        font-size: 18px;
        margin-bottom: 16px;
    }
    
    .session-info-item {
        display: flex;
        align-items: start;
        gap: 10px;
        margin-bottom: 12px;
        color: rgba(255, 255, 255, 0.95);
    }
    
    .session-info-item:last-child {
        margin-bottom: 0;
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
    
    textarea.form-control-custom {
        resize: none;
    }
    
    .btn-container {
        display: flex;
        gap: 12px;
        margin-top: 32px;
        padding-top: 32px;
        border-top: 2px solid #f1f5f9;
    }
    
    .btn-primary-custom {
        flex: 1;
        background: #10b981;
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
        background: #059669;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
        color: white;
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
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .btn-secondary-custom:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
        color: #334155;
        text-decoration: none;
    }
    
    .form-group {
        margin-bottom: 24px;
    }
    
    @media (max-width: 768px) {
        .form-card {
            padding: 32px 24px;
        }
        
        .btn-container {
            flex-direction: column;
        }
    }
</style>

<div class="main-container">
    <div class="form-card">
        <h1 class="page-title">Avaliar Sessão</h1>
        <p class="page-subtitle">Compartilhe sua experiência com o monitor</p>

        <div class="session-info-box">
            <div class="session-info-title">Informações da Sessão</div>
            <div class="session-info-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <div><strong>Monitor:</strong> {{ $session->monitor->name }}</div>
            </div>
            <div class="session-info-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                </svg>
                <div><strong>Matéria:</strong> {{ $session->monitor->subject->name ?? 'N/A' }}</div>
            </div>
            <div class="session-info-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                <div><strong>Data:</strong> {{ $session->data }}</div>
            </div>
            <div class="session-info-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
                <div><strong>Horário:</strong> {{ $session->hora_inicio }} - {{ $session->hora_fim }}</div>
            </div>
        </div>

        <form action="{{ route('ratings.store') }}" method="POST">
            @csrf
            <input type="hidden" name="session_id" value="{{ $session->id }}">

            <div class="form-group">
                <label for="rate" class="form-label-custom">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    Nota da Sessão (1 a 5)
                </label>
                <select name="rate" id="rate" class="form-control form-control-custom" required>
                    <option value="">Selecione uma nota...</option>
                    <option value="1">1 - Muito Ruim</option>
                    <option value="2">2 - Ruim</option>
                    <option value="3">3 - Regular</option>
                    <option value="4">4 - Bom</option>
                    <option value="5">5 - Excelente</option>
                </select>
            </div>

            <div class="form-group">
                <label for="note" class="form-label-custom">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                    Comentário (opcional)
                </label>
                <textarea name="note" id="note" rows="4" class="form-control form-control-custom" placeholder="Deixe seu feedback sobre a sessão..."></textarea>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn btn-primary-custom">Enviar Avaliação</button>
                <a href="{{ route('sessions.index') }}" class="btn btn-secondary-custom">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
