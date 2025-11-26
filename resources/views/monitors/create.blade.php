@extends('layouts.app')

@section('content')
<style>
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
        font-family: inherit;
    }

    .form-control-custom:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        outline: none;
    }

    .form-control-custom.is-invalid {
        border-color: #ef4444;
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

    .error-message {
        color: #dc2626;
        font-size: 13px;
        margin-top: 6px;
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
                <label for="name" class="form-label-custom">Nome</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control-custom @error('name') is-invalid @enderror"
                    placeholder="Digite o nome completo"
                    value="{{ old('name') }}"
                    required>
                @error('name')<span class="error-message">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label-custom">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control-custom @error('email') is-invalid @enderror"
                    placeholder="email@exemplo.com"
                    value="{{ old('email') }}"
                    required>
                @error('email')<span class="error-message">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label-custom">Senha</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control-custom @error('password') is-invalid @enderror"
                    placeholder="••••••••"
                    required>
                @error('password')<span class="error-message">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label-custom">Confirme a Senha</label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    class="form-control-custom"
                    placeholder="••••••••"
                    required>
            </div>

            <div class="form-group">
                <label for="subject_id" class="form-label-custom">Matéria</label>
                <select
                    name="subject_id"
                    id="subject_id"
                    class="form-control-custom @error('subject_id') is-invalid @enderror"
                    required>
                    <option value="">Selecione a matéria</option>
                    @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" @selected(old('subject_id')==$subject->id)>{{ $subject->name }}</option>
                    @endforeach
                </select>
                @error('subject_id')<span class="error-message">{{ $message }}</span>@enderror
            </div>

            <div class="btn-container">
                <button type="submit" class="btn-primary-custom">Salvar</button>
                <a href="{{ route('monitors.index') }}" class="btn-secondary-custom">Voltar</a>
            </div>
        </form>
    </div>
</div>
@endsection