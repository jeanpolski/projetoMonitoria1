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
    
    .btn-container {
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
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
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
    
    .alert-error {
        background: #fef2f2;
        border-left: 4px solid #ef4444;
        padding: 16px;
        border-radius: 12px;
        margin-bottom: 24px;
    }
    
    .alert-error ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .alert-error li {
        color: #b91c1c;
        font-size: 14px;
        margin-bottom: 4px;
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
        <h1 class="page-title">Cadastrar Monitor</h1>
        <p class="page-subtitle">Preencha as informações para adicionar um novo monitor</p>

        @if ($errors->any())
        <div class="alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('monitors.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label-custom">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    Nome
                </label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="form-control form-control-custom" 
                    placeholder="Digite o nome completo"
                    required
                >
            </div>

            <div class="form-group">
                <label for="email" class="form-label-custom">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    Email
                </label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    class="form-control form-control-custom" 
                    placeholder="email@exemplo.com"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password" class="form-label-custom">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    Senha
                </label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    class="form-control form-control-custom" 
                    placeholder="••••••••"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label-custom">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    Confirme a Senha
                </label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    id="password_confirmation" 
                    class="form-control form-control-custom" 
                    placeholder="••••••••"
                    required
                >
            </div>

            <div class="form-group">
                <label for="subject_id" class="form-label-custom">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                    </svg>
                    Matéria
                </label>
                <select 
                    name="subject_id" 
                    id="subject_id" 
                    class="form-control form-control-custom" 
                    required
                >
                    <option value="">Selecione a matéria</option>
                    @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn btn-primary-custom">Salvar</button>
                <a href="{{ route('monitors.index') }}" class="btn btn-secondary-custom">Voltar</a>
            </div>
        </form>
    </div>
</div>
@endsection
