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
        --color-hover: #f1f5f9;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: var(--color-background);
        font-family: system-ui, sans-serif;
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
    }

    .form-input {
        width: 100%;
        padding: 12px 14px;
        font-size: 14px;
        border: 1px solid var(--color-border);
        border-radius: 8px;
        color: var(--color-primary);
        transition: all 0.15s ease;
    }

    .form-input:focus {
        outline: none;
        border-color: var(--color-primary);
        box-shadow: 0 0 0 3px rgba(15, 23, 42, 0.08);
    }

    .form-error {
        font-size: 12px;
        color: var(--color-error);
        margin-top: 6px;
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
        text-align: center;
    }


    .btn-primary {
        background: var(--color-primary);
        color: white;
    }

    .btn-primary:hover {
        background: #1e293b;
    }

    .btn-secondary {
        background: var(--color-border);
        color: var(--color-secondary);
    }

    .btn-secondary:hover {
        background: var(--color-hover);
    }

    @media (max-width: 640px) {
        .login-card {
            padding: 24px;
        }

        .login-title {
            font-size: 24px;
        }
    }
</style>

<div class="login-container">
    <div class="login-card">
        <div class="login-header">
            <h1 class="login-title">Confirmar Senha</h1>
            <p class="login-subtitle">Esta é uma área segura da aplicação</p>
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <div class="form-group">
                <label for="password" class="form-label">Senha</label>
                <input id="password" type="password" name="password" class="form-input" placeholder="••••••••" required autofocus />
                @error('password') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <div class="form-actions">
                <a href="{{ url('/') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
        </form>
    </div>
</div>
@endsection