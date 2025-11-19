@extends('layouts.app')

@section('title', 'Home')

@section('styles')
<style>
    .home-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 60px 24px;
    }
    
    .header-section {
        margin-bottom: 48px;
        animation: fadeInUp 0.6s ease-out;
    }
    
    .logo-container {
        background: white;
        border-radius: 16px;
        padding: 32px;
        margin-bottom: 40px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.06);
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid #e2e8f0;
    }
    
    .logo-img {
        height: 80px;
        max-width: 100%;
        object-fit: contain;
    }
    
    .title-section {
        text-align: center;
        margin-bottom: 12px;
    }
    
    .title-section h1 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 12px;
        letter-spacing: -0.025em;
    }
    
    .title-section p {
        font-size: 1.125rem;
        color: #64748b;
        font-weight: 400;
    }
    
    .menu-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
        animation: fadeIn 0.8s ease-out;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    
    .menu-card {
        background: white;
        border-radius: 12px;
        padding: 32px;
        text-decoration: none;
        color: #0f172a;
        transition: all 0.2s ease;
        box-shadow: 0 1px 3px rgba(0,0,0,0.06);
        border: 1px solid #e2e8f0;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    
    .menu-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.1);
        border-color: #cbd5e1;
    }
    
    .menu-icon-wrapper {
        width: 56px;
        height: 56px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
    }
    
    .menu-card:hover .menu-icon-wrapper {
        transform: scale(1.05);
    }
    
    .menu-card.sessions .menu-icon-wrapper {
        background: #dbeafe;
    }
    
    .menu-card.availabilities .menu-icon-wrapper {
        background: #fce7f3;
    }
    
    .menu-card.monitors .menu-icon-wrapper {
        background: #ddd6fe;
    }
    
    .menu-card.subjects .menu-icon-wrapper {
        background: #d1fae5;
    }
    
    .menu-icon {
        width: 28px;
        height: 28px;
    }
    
    .menu-card.sessions .menu-icon {
        color: #1e40af;
    }
    
    .menu-card.availabilities .menu-icon {
        color: #be185d;
    }
    
    .menu-card.monitors .menu-icon {
        color: #6d28d9;
    }
    
    .menu-card.subjects .menu-icon {
        color: #047857;
    }
    
    .menu-content {
        flex: 1;
    }
    
    .menu-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 8px;
        color: #0f172a;
    }
    
    .menu-description {
        font-size: 0.9375rem;
        color: #64748b;
        line-height: 1.6;
    }
    
    .menu-arrow {
        width: 20px;
        height: 20px;
        color: #cbd5e1;
        transition: all 0.2s ease;
        align-self: flex-end;
    }
    
    .menu-card:hover .menu-arrow {
        color: #64748b;
        transform: translateX(4px);
    }
    
    @media (max-width: 768px) {
        .home-container {
            padding: 40px 16px;
        }
        
        .title-section h1 {
            font-size: 2rem;
        }
        
        .title-section p {
            font-size: 1rem;
        }
        
        .menu-grid {
            grid-template-columns: 1fr;
            gap: 16px;
        }
        
        .logo-container {
            padding: 24px;
        }
        
        .logo-img {
            height: 60px;
        }
        
        .menu-card {
            padding: 24px;
        }
        
        .menu-icon-wrapper {
            width: 48px;
            height: 48px;
        }
        
        .menu-icon {
            width: 24px;
            height: 24px;
        }
    }
</style>
@endsection

@section('content')
<div class="home-container">
    <div class="header-section">
        <div class="logo-container">
            <img src="https://bkpsitecpsnew.blob.core.windows.net/uploadsitecps/sites/151/2024/04/fatec_praia_grande.png" alt="FATEC Praia Grande - CPS" class="logo-img">
        </div>
        
        <div class="title-section">
            <h1>Sistema de Monitoria</h1>
            <p>Gerencie sessões, monitores e horários de forma eficiente</p>
        </div>
    </div>
    
    <div class="menu-grid">
        <a href="{{ url('/sessions') }}" class="menu-card sessions">
            <div class="menu-icon-wrapper">
                <svg class="menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <div class="menu-content">
                <div class="menu-title">Sessões</div>
                <div class="menu-description">
                    Gerencie todas as sessões de monitoria e acompanhe o progresso dos atendimentos
                </div>
            </div>
            <svg class="menu-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>
        
        <a href="{{ url('/availabilities') }}" class="menu-card availabilities">
            <div class="menu-icon-wrapper">
                <svg class="menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <div class="menu-content">
                <div class="menu-title">Disponibilidades</div>
                <div class="menu-description">
                    Configure e visualize os horários disponíveis dos monitores para atendimento
                </div>
            </div>
            <svg class="menu-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>
        
        <a href="{{ url('/monitors') }}" class="menu-card monitors">
            <div class="menu-icon-wrapper">
                <svg class="menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <div class="menu-content">
                <div class="menu-title">Monitores</div>
                <div class="menu-description">
                    Cadastre e gerencie os monitores, suas matérias e informações de contato
                </div>
            </div>
            <svg class="menu-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>
        
        <a href="{{ url('/subjects') }}" class="menu-card subjects">
            <div class="menu-icon-wrapper">
                <svg class="menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
            </div>
            <div class="menu-content">
                <div class="menu-title">Matérias</div>
                <div class="menu-description">
                    Organize e gerencie todas as disciplinas disponíveis para monitoria
                </div>
            </div>
            <svg class="menu-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>
    </div>
</div>
@endsection
