@extends('layouts.app')

@section('title', 'Detalhes da Sessão')

@section('styles')
<style>
    body {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        min-height: 100vh;
    }

    .show-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
    }

    .show-card {
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

    .info-grid {
        display: grid;
        gap: 20px;
    }

    .info-item {
        padding: 20px;
        background: #f8fafc;
        border-radius: 16px;
        border: 2px solid #e2e8f0;
        transition: all 0.2s;
    }

    .info-item:hover {
        border-color: #cbd5e1;
        background: #f1f5f9;
    }

    .info-label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        color: #64748b;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
    }

    .info-value {
        color: #1e293b;
        font-size: 16px;
        font-weight: 500;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 8px 16px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .status-concluida {
        background: #dcfce7;
        color: #166534;
        border: 2px solid #bbf7d0;
    }

    .status-confirmada {
        background: #dbeafe;
        color: #1e40af;
        border: 2px solid #bfdbfe;
    }

    .status-pendente {
        background: #fef3c7;
        color: #92400e;
        border: 2px solid #fde68a;
    }

    .status-cancelada {
        background: #fee2e2;
        color: #991b1b;
        border: 2px solid #fecaca;
    }

    .btn-back {
        width: 100%;
        background: white;
        color: #64748b;
        border: 2px solid #e2e8f0;
        padding: 14px 24px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 15px;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: all 0.2s;
        margin-top: 32px;
    }

    .btn-back:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
        color: #334155;
        transform: translateY(-2px);
        text-decoration: none;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
        .show-card {
            padding: 32px 24px;
        }

        .page-title {
            font-size: 24px;
        }
    }
</style>
@endsection

@section('content')
<div class="show-container">
    <div class="show-card">
        <h1 class="page-title">Detalhes da Sessão</h1>
        <p class="page-subtitle">Informações completas da sessão de monitoria</p>

        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"></path>
                    </svg>
                    ID da Sessão
                </div>
                <div class="info-value">#{{ $session->id }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    Monitor
                </div>
                <div class="info-value">{{ $session->monitor->name ?? 'N/A' }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    Aluno
                </div>
                <div class="info-value">{{ $session->aluno->name ?? 'N/A' }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    Data
                </div>
                <div class="info-value">{{ \Carbon\Carbon::parse($session->data)->format('d/m/Y') }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    Hora Início
                </div>
                <div class="info-value">{{ substr($session->hora_inicio, 0, 5) }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    Hora Fim
                </div>
                <div class="info-value">{{ substr($session->hora_fim, 0, 5) }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    Status
                </div>
                <div class="info-value">
                    @if(strtolower($session->status) === 'concluida')
                    <span class="status-badge status-concluida">Concluída</span>
                    @elseif(strtolower($session->status) === 'confirmada')
                    <span class="status-badge status-confirmada">Confirmada</span>
                    @elseif(strtolower($session->status) === 'pendente')
                    <span class="status-badge status-pendente">Pendente</span>
                    @elseif(strtolower($session->status) === 'cancelada')
                    <span class="status-badge status-cancelada">Cancelada</span>
                    @else
                    <span class="status-badge">{{ $session->status }}</span>
                    @endif
                </div>
            </div>
        </div>

        <a href="{{ route('sessions.index') }}" class="btn-back">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            Voltar para Lista
        </a>
    </div>
</div>
@endsection