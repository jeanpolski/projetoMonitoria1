@extends('layouts.app')

@section('title', 'Home')

@section('content')

<style>
    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
    }
    
    .home-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 40px 20px;
    }
    
    .logo-section {
        background: white;
        border-radius: 24px;
        padding: 40px;
        margin-bottom: 50px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.2);
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 40px;
        flex-wrap: wrap;
        animation: fadeInDown 0.6s ease-out;
    }
    
    .logo-item {
        height: 100px;
        max-width: 500px;
        object-fit: contain;
        filter: grayscale(0);
        transition: all 0.3s;
    }
    
    .logo-item:hover {
        transform: scale(1.05);
        filter: drop-shadow(0 10px 20px rgba(102, 126, 234, 0.3));
    }
    
    .welcome-section {
        text-align: center;
        color: white;
        margin-bottom: 50px;
        padding: 20px;
        animation: fadeIn 0.8s ease-out;
    }
    
    .welcome-section h1 {
        font-size: 3.5em;
        font-weight: 800;
        margin-bottom: 15px;
        text-shadow: 0 4px 20px rgba(0,0,0,0.3);
        letter-spacing: -1px;
    }
    
    .welcome-section p {
        font-size: 1.3em;
        opacity: 0.95;
        font-weight: 300;
    }
    
    .menu-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
        margin-bottom: 40px;
        max-width: 1000px;
        margin-left: auto;
        margin-right: auto;
    }
    
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
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
        border-radius: 20px;
        padding: 30px;
        text-decoration: none;
        color: #333;
        transition: all 0.3s;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        position: relative;
        overflow: hidden;
    }
    
    .menu-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
    }
    
    .menu-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    }
    
    .menu-icon {
        font-size: 3.5em;
        margin-bottom: 15px;
        display: block;
    }
    
    .menu-title {
        font-size: 1.5em;
        font-weight: 700;
        margin-bottom: 10px;
        color: #333;
    }
    
    .menu-description {
        font-size: 0.95em;
        color: #666;
        line-height: 1.5;
    }
    
    .menu-card.sessions::before {
        background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
    }
    
    .menu-card.availabilities::before {
        background: linear-gradient(90deg, #f093fb 0%, #f5576c 100%);
    }
    
    .menu-card.monitors::before {
        background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%);
    }
    
    .menu-card.subjects::before {
        background: linear-gradient(90deg, #43e97b 0%, #38f9d7 100%);
    }
    
    @media (max-width: 768px) {
        .welcome-section h1 {
            font-size: 2em;
        }
        
        .welcome-section p {
            font-size: 1em;
        }
        
        .menu-grid {
            grid-template-columns: 1fr;
        }
        
        .logo-section {
            padding: 20px;
            gap: 20px;
        }
        
        .logo-item {
            height: 60px;
        }
    }
    
    @media (max-width: 576px) {
        .home-container {
            padding: 10px;
        }
        
        .welcome-section h1 {
            font-size: 1.8em;
        }
        
        .menu-card {
            padding: 25px;
        }
        
        .menu-icon {
            font-size: 2.5em;
        }
        
        .menu-title {
            font-size: 1.3em;
        }
    }
</style>

<div class="home-container">
    <div class="logo-section">
        <img src="https://bkpsitecpsnew.blob.core.windows.net/uploadsitecps/sites/151/2024/04/fatec_praia_grande.png" alt="FATEC Praia Grande - CPS" class="logo-item">
    </div>
    
    <div class="welcome-section">
        <h1>🎓 Sistema de Monitoria</h1>
        <p>Bem-vindo! Gerencie sessões, monitores e muito mais.</p>
    </div>
    
    <div class="menu-grid">
        <a href="{{ url('/sessions') }}" class="menu-card sessions">
            <span class="menu-icon">📚</span>
            <div class="menu-title">Sessões</div>
            <div class="menu-description">
                Gerencie todas as sessões de monitoria, acompanhe o progresso e visualize avaliações.
            </div>
        </a>
        
        <a href="{{ url('/availabilities') }}" class="menu-card availabilities">
            <span class="menu-icon">📅</span>
            <div class="menu-title">Disponibilidades</div>
            <div class="menu-description">
                Configure os horários disponíveis dos monitores para atendimento aos alunos.
            </div>
        </a>
        
        <a href="{{ url('/monitors') }}" class="menu-card monitors">
            <span class="menu-icon">👨‍🏫</span>
            <div class="menu-title">Monitores</div>
            <div class="menu-description">
                Cadastre e gerencie os monitores, suas matérias e informações de contato.
            </div>
        </a>
        
        <a href="{{ url('/subjects') }}" class="menu-card subjects">
            <span class="menu-icon">📖</span>
            <div class="menu-title">Matérias</div>
            <div class="menu-description">
                Organize as disciplinas disponíveis para monitoria no sistema.
            </div>
        </a>
    </div>
</div>

@endsection