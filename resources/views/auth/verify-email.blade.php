@extends('layouts.app')

@section('content')
<div style="display: flex; align-items: center; justify-content: center; min-height: 100vh; padding: 24px;">
    <div style="width: 100%; max-width: 400px; background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 12px; padding: 32px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);">

        <h1 style="font-size: 24px; font-weight: 600; color: var(--color-primary); margin: 0 0 8px 0;">Verifique seu Email</h1>
        <p style="font-size: 14px; color: var(--color-secondary); margin: 0 0 24px 0;">Obrigado pelo cadastro! Para prosseguir, verifique seu email.</p>

        @if (session('status') == 'verification-link-sent')
        <div style="background: #ecfdf5; border: 1px solid #d1fae5; border-radius: 8px; padding: 12px 16px; margin-bottom: 24px; color: #065f46; font-size: 14px;">
            Um novo link de verificação foi enviado para seu email.
        </div>
        @endif

        <p style="font-size: 14px; color: var(--color-secondary); margin-bottom: 24px; line-height: 1.6;">
            Não recebeu o email? Clique no botão abaixo para enviar um novo link de verificação.
        </p>

        <div style="display: flex; gap: 12px; flex-direction: column;">
            <form method="POST" action="{{ route('verification.send') }}" style="margin: 0;">
                @csrf
                <button type="submit" style="width: 100%; padding: 10px 16px; background: var(--color-primary); color: var(--color-surface); border: none; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.15s ease;">
                    Reenviar Email de Verificação
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" style="width: 100%; padding: 10px 16px; background: none; color: var(--color-secondary); border: 1px solid var(--color-border); border-radius: 8px; font-size: 14px; font-weight: 500; cursor: pointer; transition: all 0.15s ease;">
                    Sair da Conta
                </button>
            </form>
        </div>
    </div>
</div>

<style>
    button:hover {
        opacity: 0.9;
    }

    form button:hover {
        background-color: #1e293b;
    }

    form button[type="submit"][style*="border: 1px"]:hover {
        background: var(--color-hover);
    }
</style>
@endsection