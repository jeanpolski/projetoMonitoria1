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

  .register-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 16px;
  }

  .register-card {
    width: 100%;
    max-width: 420px;
    background: var(--color-surface);
    border-radius: 12px;
    border: 1px solid var(--color-border);
    padding: 32px;
    box-shadow: 0 1px 3px rgba(15, 23, 42, 0.08);
  }

  .register-header {
    margin-bottom: 32px;
    text-align: center;
  }

  .register-title {
    font-size: 28px;
    font-weight: 700;
    color: var(--color-primary);
    margin-bottom: 8px;
    letter-spacing: -0.5px;
  }

  .register-subtitle {
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

  .status-message {
    padding: 12px 14px;
    border-radius: 8px;
    margin-bottom: 20px;
    font-size: 13px;
    background: #d1fae5;
    color: #047857;
    border: 1px solid #a7f3d0;
  }

  .login-link {
    text-align: center;
    margin-top: 24px;
    font-size: 13px;
    color: var(--color-secondary);
  }

  .login-link a {
    color: var(--color-primary);
    text-decoration: none;
    font-weight: 600;
    transition: all 0.15s ease;
  }

  .login-link a:hover {
    color: #1e293b;
    text-decoration: underline;
  }

  @media (max-width: 640px) {
    .register-card {
      padding: 24px;
    }

    .register-title {
      font-size: 24px;
    }
  }
</style>

<div class="register-container">
  <div class="register-card">
    <div class="register-header">
      <h1 class="register-title">Criar Conta</h1>
      <p class="register-subtitle">Preencha os dados abaixo para se registrar</p>
    </div>

    @if ($errors->any())
    <div class="status-message" style="background: #fee2e2; color: #991b1b; border-color: #fecaca;">
      Verifique os erros abaixo
    </div>
    @endif

    <form method="POST" action="{{ route('register') }}" novalidate>
      @csrf

      <div class="form-group">
        <label for="name" class="form-label">Nome Completo</label>
        <input
          id="name"
          type="text"
          name="name"
          value="{{ old('name') }}"
          class="form-input"
          placeholder="Seu nome completo"
          required
          autofocus
          autocomplete="name" />
        @error('name')
        <span class="form-error">{{ $message }}</span>
        @enderror
      </div>

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
          autocomplete="new-password" />
        @error('password')
        <span class="form-error">{{ $message }}</span>
        @enderror
      </div>

      <div class="form-group">
        <label for="password_confirmation" class="form-label">Confirmar Senha</label>
        <input
          id="password_confirmation"
          type="password"
          name="password_confirmation"
          class="form-input"
          placeholder="••••••••"
          required
          autocomplete="new-password" />
        @error('password_confirmation')
        <span class="form-error">{{ $message }}</span>
        @enderror
      </div>

      <div class="form-actions">
        <button type="submit" class="btn btn-primary">
          Cadastrar
        </button>
      </div>
    </form>

    <div class="login-link">
      Já tem conta? <a href="{{ route('login') }}">Fazer login</a>
    </div>
  </div>
</div>
@endsection