@extends('layouts.app')

@section('title', 'Sobre')

@section('content')
<style>
    .about-container {
        min-height: 100vh;
        background: linear-gradient(to bottom right, #f9fafb, #e5e7eb);
        padding: 3rem 1rem;
    }
    .about-content {
        max-width: 1000px;
        margin: 0 auto;
    }
    .about-header {
        text-align: center;
        margin-bottom: 3rem;
    }
    .about-header h1 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #1f2937;
        margin-bottom: 0.5rem;
    }
    .about-header p {
        color: #6b7280;
        font-size: 1.1rem;
    }
    .about-card {
        background: white;
        border-radius: 1rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        margin-bottom: 1.5rem;
        transition: all 0.3s ease;
    }
    .about-card:hover {
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.15);
        transform: translateY(-2px);
    }
    .card-header {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
    }
    .card-header h2 {
        font-size: 1.75rem;
        font-weight: bold;
        color: #1f2937;
        margin: 0;
    }
    .card-icon {
        width: 32px;
        height: 32px;
        margin-right: 1rem;
        flex-shrink: 0;
    }
    .card-text {
        color: #374151;
        line-height: 1.7;
        margin-bottom: 1rem;
    }
    .highlight-box {
        background: #eff6ff;
        border-left: 4px solid #3b82f6;
        border-radius: 0.5rem;
        padding: 1.5rem;
        margin-top: 1rem;
    }
    .highlight-box h3 {
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 1rem;
    }
    .feature-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .feature-list li {
        display: flex;
        align-items: flex-start;
        color: #374151;
        margin-bottom: 0.75rem;
    }
    .feature-list svg {
        width: 20px;
        height: 20px;
        color: #3b82f6;
        margin-right: 0.75rem;
        margin-top: 2px;
        flex-shrink: 0;
    }
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-top: 1rem;
    }
    .info-box {
        background: #f0fdf4;
        border-radius: 0.5rem;
        padding: 1rem;
    }
    .info-box h3 {
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }
    .info-box p {
        color: #374151;
        margin: 0;
    }
    .github-btn {
        display: inline-flex;
        align-items: center;
        padding: 0.75rem 1.5rem;
        background: #1f2937;
        color: white;
        font-weight: 600;
        border-radius: 0.5rem;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .github-btn:hover {
        background: #374151;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        transform: translateY(-1px);
        color: white;
    }
    .github-btn svg {
        width: 20px;
        height: 20px;
        margin-right: 0.5rem;
    }
    .back-btn {
        display: inline-flex;
        align-items: center;
        padding: 0.75rem 1.5rem;
        background: #3b82f6;
        color: white;
        font-weight: 600;
        border-radius: 0.5rem;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .back-btn:hover {
        background: #2563eb;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        transform: translateY(-1px);
        color: white;
    }
    .back-btn svg {
        width: 20px;
        height: 20px;
        margin-right: 0.5rem;
    }
    .btn-container {
        text-align: center;
        margin-top: 2rem;
    }
</style>

<div class="about-container">
    <div class="about-content">
        <div class="about-header">
            <h1>Sobre o Sistema</h1>
            <p>Sistema de Gerenciamento de Monitoria Acadêmica</p>
        </div>

        <div class="about-card">
            <div class="card-header">
                <svg class="card-icon" style="color: #3b82f6;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <h2>Sobre a Aplicação</h2>
            </div>
            <p class="card-text">
                Este sistema foi desenvolvido para facilitar o gerenciamento de sessões de monitoria acadêmica, 
                permitindo que monitores e alunos organizem seus horários de forma eficiente e prática.
            </p>
            <div class="highlight-box">
                <h3>Funcionalidades Principais:</h3>
                <ul class="feature-list">
                    <li>
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Cadastro e gerenciamento de monitores e suas disponibilidades</span>
                    </li>
                    <li>
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Agendamento de sessões de monitoria por matéria</span>
                    </li>
                    <li>
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Sistema de avaliação das sessões de monitoria</span>
                    </li>
                    <li>
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Controle de status das sessões (agendada, realizada, cancelada)</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="about-card">
            <div class="card-header">
                <svg class="card-icon" style="color: #10b981;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                <h2>Sobre a Faculdade</h2>
            </div>
            <p class="card-text">
                Este projeto foi desenvolvido como parte do programa acadêmico da 
                <strong style="color: #047857;">Faculdade de Tecnologia de Praia Grande (FATEC)</strong>, 
                com o objetivo de modernizar e facilitar o processo de monitoria acadêmica.
            </p>
            <div class="info-grid">
                <div class="info-box">
                    <h3>Curso</h3>
                    <p>Análise e Desenvolvimento de Sistemas</p>
                </div>
                <div class="info-box">
                    <h3>Disciplina</h3>
                    <p>Laboratório de Engenharia de Software</p>
                </div>
            </div>
        </div>

        <div class="about-card">
            <div class="card-header">
                <svg class="card-icon" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                </svg>
                <h2>Desenvolvedor</h2>
            </div>
            <p class="card-text">
                Este sistema foi desenvolvido por estudantes da FATEC Praia Grande como projeto prático da disciplina de Laboratório de Engenharia de Software.
            </p>
            <a href="https://github.com/jeanpolski" target="_blank" class="github-btn">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                </svg>
                Ver no GitHub
            </a>
        </div>

        <div class="btn-container">
            <a href="{{ url('/') }}" class="btn-back">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Voltar para Início
            </a>
        </div>
    </div>
</div>
@endsection
