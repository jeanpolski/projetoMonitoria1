@extends('layouts.app')

@section('content')
<style>
    :root {
        --color-primary: #0f172a;
        --color-secondary: #475569;
        --color-tertiary: #94a3b8;
        --color-surface: #ffffff;
        --color-background: #f8fafc;
        --color-border: #e2e8f0;
        --color-error: #ef4444;
        --color-success: #10b981;
        --color-hover: #f1f5f9;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: var(--color-background);
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen',
            'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue',
            sans-serif;
        color: var(--color-primary);
    }

    .login-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 16px;
    }

    .login-card {
        width: 100%;
        max-width: 420px;
        background: var(--color-surface);
        border-radius: 12px;
        border: 1px solid var(--color-border);
        padding: 32px;
        box-shadow: 0 1px 3px rgba(15, 23, 42, 0.08);
    }

    .login-header {
        margin-bottom: 32px;
        text-align: center;
    }

    .login-title {
        font-size: 28px;
        font-weight: 700;
        color: var(--color-primary);
        margin-bottom: 8px;
        letter-spacing: -0.5px;
    }

    .login-subtitle {
        font-size: 14px;
        color: var(--color-tertiary);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: var(--color-primary);
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-input {
        width: 100%;
        padding: 12px 14px;
        font-size: 14px;
        border: 1px solid var(--color-border);
        border-radius: 8px;
        background: var(--color-surface);
        color: var(--color-primary);
        transition: all 0.15s ease;
        font-family: inherit;
    }

    .form-input:focus {
        outline: none;
        border-color: var(--color-primary);
        box-shadow: 0 0 0 3px rgba(15, 23, 42, 0.08);
    }

    .form-input::placeholder {
        color: var(--color-tertiary);
    }

    .form-error {
        font-size: 12px;
        color: var(--color-error);
        margin-top: 6px;
        display: block;
    }

    .form-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
        gap: 16px;
    }

    .checkbox-wrapper {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .checkbox-input {
        width: 18px;
        height: 18px;
        cursor: pointer;
        accent-color: var(--color-primary);
    }

    .checkbox-label {
        font-size: 13px;
        color: var(--color-secondary);
        cursor: pointer;
        user-select: none;
    }

    .forgot-link {
        font-size: 13px;
        color: var(--color-primary);
        text-decoration: none;
        font-weight: 500;
        transition: all 0.15s ease;
    }

    .forgot-link:hover {
        color: var(--color-secondary);
        text-decoration: underline;
    }

    .form-actions {
        display: flex;
        gap: 12px;
        margin-top: 24px;
    }

    .btn {
        flex: 1;
        padding: 12px 16px;
        font-size: 14px;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.15s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .btn-primary {
        background: var(--color-primary);
        color: var(--color-surface);
    }

    .btn-primary:hover {
        background: #1e293b;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(15, 23, 42, 0.15);
    }

    .btn-secondary {
        background: var(--color-border);
        color: var(--color-secondary);
    }

    .btn-secondary:hover {
        background: var(--color-hover);
    }

    .status-message {
        padding: 12px 14px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 13px;
        background: #d1fae5;
        color: #047857;
        border: 1px solid #a7f3d0;
    }

    .signup-link {
        text-align: center;
        margin-top: 24px;
        font-size: 13px;
        color: var(--color-secondary);
    }

    .signup-link a {
        color: var(--color-primary);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.15s ease;
    }

    .signup-link a:hover {
        color: #1e293b;
        text-decoration: underline;
    }

    @media (max-width: 640px) {
        .login-card {
            padding: 24px;
        }

        .login-title {
            font-size: 24px;
        }

        .form-row {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<div class="login-container">
    <div class="login-card">
        <div class="login-header">
            <h1 class="login-title">Bem-vindo</h1>
            <p class="login-subtitle">Faça login na sua conta</p>
        </div>

        @if ($errors->any())
        <div class="status-message" style="background: #fee2e2; color: #991b1b; border-color: #fecaca;">
            Verifique os erros abaixo
        </div>
        @endif

        @if (session('status'))
        <div class="status-message">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="form-input"
                    placeholder="seu@email.com"
                    required
                    autofocus
                    autocomplete="username" />
                @error('email')
                <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Senha</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    class="form-input"
                    placeholder="••••••••"
                    required
                    autocomplete="current-password" />
                @error('password')
                <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-row">
                <div class="checkbox-wrapper">
                    <input
                        id="remember_me"
                        type="checkbox"
                        name="remember"
                        class="checkbox-input" />
                    <label for="remember_me" class="checkbox-label">Lembrar-me</label>
                </div>

                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-link">
                    Esqueceu a senha?
                </a>
                @endif
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    Entrar
                </button>
            </div>
        </form>

        @if (Route::has('register'))
        <div class="signup-link">
            Não tem conta? <a href="{{ route('register') }}">Criar agora</a>
        </div>
        @endif
    </div>
</div>
@endsection