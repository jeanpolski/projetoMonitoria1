@extends('layouts.app')

@section('title', 'Sistema de Monitoria')

@section('content')
<style>
    .hero-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 80px 0;
        margin: -20px -15px 40px -15px;
        position: relative;
        overflow: hidden;
    }
    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="white" opacity="0.1"/></svg>');
        opacity: 0.3;
    }
    .hero-content {
        position: relative;
        z-index: 1;
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
    }
    .hero-title {
        font-size: 3em;
        font-weight: 700;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
    }
    .hero-subtitle {
        font-size: 1.3em;
        margin-bottom: 30px;
        opacity: 0.95;
    }
    .hero-buttons {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }
    .hero-btn {
        padding: 15px 35px;
        font-size: 1.1em;
        font-weight: 600;
        border-radius: 50px;
        border: none;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }
    .hero-btn-primary {
        background: white;
        color: #667eea;
    }
    .hero-btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        color: #667eea;
    }
    .hero-btn-secondary {
        background: transparent;
        color: white;
        border: 2px solid white;
    }
    .hero-btn-secondary:hover {
        background: white;
        color: #667eea;
    }

    .feature-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transition: all 0.3s;
        height: 100%;
        border: 2px solid transparent;
    }
    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        border-color: #667eea;
    }
    .feature-icon {
        font-size: 3.5em;
        margin-bottom: 20px;
    }
    .feature-title {
        font-size: 1.4em;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 15px;
    }
    .feature-description {
        color: #718096;
        line-height: 1.6;
    }

    .stats-section {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
        padding: 60px 0;
        margin: 60px -15px;
    }
    .stat-card {
        text-align: center;
        padding: 20px;
    }
    .stat-number {
        font-size: 3.5em;
        font-weight: 700;
        margin-bottom: 10px;
    }
    .stat-label {
        font-size: 1.1em;
        opacity: 0.9;
    }

    .gallery-section {
        margin: 60px 0;
    }
    .section-title {
        text-align: center;
        font-size: 2.5em;
        font-weight: 700;
        margin-bottom: 50px;
        color: #2d3748;
    }
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-bottom: 40px;
    }
    .gallery-item {
        position: relative;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: all 0.3s;
        height: 300px;
        background: #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    .gallery-item:hover {
        transform: scale(1.05);
        box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    }
    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .gallery-placeholder {
        text-align: center;
        color: #a0aec0;
    }
    .gallery-placeholder-icon {
        font-size: 4em;
        margin-bottom: 15px;
    }
    .gallery-placeholder-text {
        font-size: 1.2em;
        font-weight: 500;
    }

    .cta-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 60px;
        border-radius: 20px;
        text-align: center;
        margin: 60px 0;
    }
    .cta-title {
        font-size: 2.5em;
        font-weight: 700;
        margin-bottom: 20px;
    }
    .cta-text {
        font-size: 1.2em;
        margin-bottom: 30px;
        opacity: 0.95;
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 2em;
        }
        .hero-subtitle {
            font-size: 1.1em;
        }
        .stat-number {
            font-size: 2.5em;
        }
        .section-title {
            font-size: 2em;
        }
    }
</style>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">📚 Sistema de Monitoria</h1>
            <p class="hero-subtitle">
                Conectando alunos e monitores para um aprendizado mais eficiente e colaborativo
            </p>
            <div class="hero-buttons">
                <a href="{{ route('sessions.index') }}" class="hero-btn hero-btn-primary">
                    Ver Sessões
                </a>
                <a href="{{ route('sessions.create') }}" class="hero-btn hero-btn-secondary">
                    Agendar Monitoria
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!-- Features Section -->
    <div class="row mb-5">
        <div class="col-md-4 mb-4">
            <div class="feature-card">
                <div class="feature-icon">🎓</div>
                <h3 class="feature-title">Agendamento Fácil</h3>
                <p class="feature-description">
                    Agende sessões de monitoria de forma rápida e intuitiva. Visualize horários disponíveis em tempo real.
                </p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="feature-card">
                <div class="feature-icon">👥</div>
                <h3 class="feature-title">Monitores Qualificados</h3>
                <p class="feature-description">
                    Acesso a monitores capacitados e aprovados pela instituição, prontos para ajudar no seu aprendizado.
                </p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="feature-card">
                <div class="feature-icon">⏰</div>
                <h3 class="feature-title">Horários Flexíveis</h3>
                <p class="feature-description">
                    Encontre horários que se encaixam na sua rotina. Diversos monitores com disponibilidades variadas.
                </p>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-number">150+</div>
                        <div class="stat-label">Sessões Realizadas</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-number">25+</div>
                        <div class="stat-label">Monitores Ativos</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Satisfação dos Alunos</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Section -->
    <div class="gallery-section">
        <h2 class="section-title">🏫 Nossa Instituição</h2>
        <div class="gallery-grid">
            <div class="gallery-item" id="gallery1">
                <div class="gallery-placeholder">
                    <div class="gallery-placeholder-icon">🖼️</div>
                    <div class="gallery-placeholder-text">Imagem 1 da Faculdade</div>
                    <small style="color: #cbd5e0; margin-top: 10px; display: block;">
                        Substitua essa div por: &lt;img src="caminho-da-imagem.jpg" alt="Fatec"&gt;
                    </small>
                </div>
            </div>
            <div class="gallery-item" id="gallery2">
                <div class="gallery-placeholder">
                    <div class="gallery-placeholder-icon">🖼️</div>
                    <div class="gallery-placeholder-text">Imagem 2 da Faculdade</div>
                    <small style="color: #cbd5e0; margin-top: 10px; display: block;">
                        Substitua essa div por: &lt;img src="caminho-da-imagem.jpg" alt="Fatec"&gt;
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section">
        <h2 class="cta-title">Pronto para começar?</h2>
        <p class="cta-text">
            Junte-se a centenas de alunos que já estão aproveitando o sistema de monitoria
        </p>
        <a href="{{ route('sessions.create') }}" class="hero-btn hero-btn-primary">
            Agendar Nova Sessão
        </a>
    </div>
</div>

<script>
    // Adicione interatividade se necessário
    document.addEventListener('DOMContentLoaded', function() {
        // Animação suave ao scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.feature-card, .gallery-item').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'all 0.6s ease-out';
            observer.observe(el);
        });
    });
</script>
@endsection