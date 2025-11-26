@extends('layouts.app')

@section('title', 'Sobre')

@section('content')
<style>
    .about-container {
        min-height: 100vh;
        background: #f8fafc;
        padding: 3rem 1rem;
    }
    .about-content {
        max-width: 900px;
        margin: 0 auto;
    }
    .about-header {
        text-align: center;
        margin-bottom: 3rem;
    }
    .about-header h1 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.5rem;
    }
    .about-header p {
        color: #64748b;
        font-size: 1.1rem;
    }
    .about-card {
        background: white;
        border-radius: 0.75rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
        padding: 2rem;
        margin-bottom: 1.5rem;
        transition: all 0.3s ease;
        border: 1px solid #e2e8f0;
    }
    .about-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-color: #cbd5e1;
    }
    .card-header {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
    }
    .card-header h2 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
    }
    .card-icon {
        width: 28px;
        height: 28px;
        margin-right: 1rem;
        flex-shrink: 0;
    }
    .card-text {
        color: #475569;
        line-height: 1.6;
        margin-bottom: 1rem;
    }
    .highlight-box {
        background: #f0f9ff;
        border-left: 3px solid #0284c7;
        border-radius: 0.5rem;
        padding: 1.25rem;
        margin-top: 1rem;
    }
    .highlight-box h3 {
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 1rem;
        font-size: 0.95rem;
    }
    .feature-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .feature-list li {
        display: flex;
        align-items: flex-start;
        color: #475569;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }
    .feature-list svg {
        width: 18px;
        height: 18px;
        color: #0284c7;
        margin-right: 0.75rem;
        margin-top: 2px;
        flex-shrink: 0;
    }
    /* Simplified tech badge styling */
    .tech-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
        gap: 0.75rem;
        margin-top: 1rem;
    }
    .tech-badge {
        background: #e2e8f0;
        color: #1e293b;
        padding: 0.75rem;
        border-radius: 0.5rem;
        text-align: center;
        font-weight: 500;
        font-size: 0.9rem;
        transition: all 0.2s ease;
        border: 1px solid #cbd5e1;
    }
    .tech-badge:hover {
        background: #cbd5e1;
        border-color: #94a3b8;
    }
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 1rem;
        margin-top: 1rem;
    }
    .info-box {
        background: #f0fdf4;
        border-radius: 0.5rem;
        padding: 1rem;
        border: 1px solid #dbeafe;
    }
    .info-box h3 {
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }
    .info-box p {
        color: #475569;
        margin: 0;
        font-size: 0.9rem;
    }
    .github-btn {
        display: inline-flex;
        align-items: center;
        padding: 0.75rem 1.5rem;
        background: #1e293b;
        color: white;
        font-weight: 600;
        border-radius: 0.5rem;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }
    .github-btn:hover {
        background: #334155;
        color: white;
    }
    .github-btn svg {
        width: 18px;
        height: 18px;
        margin-right: 0.5rem;
    }
    .back-btn {
        display: inline-flex;
        align-items: center;
        padding: 0.75rem 1.5rem;
        background: #0284c7;
        color: white;
        font-weight: 600;
        border-radius: 0.5rem;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }
    .back-btn:hover {
        background: #0369a1;
        color: white;
    }
    .back-btn svg {
        width: 18px;
        height: 18px;
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
                <svg class="card-icon" style="color: #0284c7;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                        <span>Login de monitor e aluno com suas respectivas funcionalidades</span>
                    </li>
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

        <!-- Novo card com as tecnologias utilizadas -->
        <div class="about-card">
            <div class="card-header">
                <svg class="card-icon" style="color: #475569;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4m0 0l-4 4m4-4H3"/>
                </svg>
                <h2>Tecnologias Utilizadas</h2>
            </div>
            <p class="card-text">
                O projeto foi desenvolvido com um stack moderno e robusto, combinando frameworks e ferramentas de qualidade para garantir performance, manutenibilidade e escalabilidade.
            </p>
            <div class="tech-grid">
                <div class="tech-badge">Laravel</div>
                <div class="tech-badge">PHP</div>
                <div class="tech-badge">Blade</div>
                <div class="tech-badge">Breeze</div>
                <div class="tech-badge">MySQL</div>
                <div class="tech-badge">JavaScript</div>
                <div class="tech-badge">AJAX</div>
                <div class="tech-badge">HTML5</div>
                <div class="tech-badge">CSS3</div>
                <div class="tech-badge">Bootstrap</div>
                <div class="tech-badge">Middleware</div>
                <div class="tech-badge">Composer</div>
                <div class="tech-badge">Git</div>
            </div>
        </div>

        <!-- Card de Faculdade com informações expandidas -->
        <div class="about-card">
            <div class="card-header">
                <svg class="card-icon" style="color: #16a34a;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                <h2>Sobre a Faculdade</h2>
            </div>
            <p class="card-text">
                Este projeto foi desenvolvido como parte do programa acadêmico da 
                <strong style="color: #16a34a;">Faculdade de Tecnologia de Praia Grande (FATEC)</strong>, 
                vinculada ao Centro Paula Souza (CPS), com o objetivo de modernizar e facilitar o processo de monitoria acadêmica.
            </p>
            <div class="info-grid">
                <div class="info-box">
                    <h3>Instituição</h3>
                    <p>FATEC Praia Grande</p>
                </div>
                <div class="info-box">
                    <h3>Rede</h3>
                    <p>Centro Paula Souza (CPS)</p>
                </div>
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
            <a href="{{ url('/') }}" class="back-btn">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Voltar para Início
            </a>
        </div>
    </div>
</div>
@endsection
