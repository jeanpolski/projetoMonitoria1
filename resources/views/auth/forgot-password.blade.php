@extends('layouts.app')

@section('content')
<div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px;">
    <div style="width: 100%; max-width: 400px;">
        <div style="
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            padding: 40px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        ">
            <h1 style="
                font-size: 24px;
                font-weight: 600;
                color: #0f172a;
                margin: 0 0 12px 0;
                line-height: 1.4;
            ">
                Recuperar Senha
            </h1>

            <p style="
                font-size: 14px;
                color: #64748b;
                margin: 0 0 24px 0;
                line-height: 1.6;
            ">
                Esqueceu sua senha? Sem problemas. Apenas nos informe seu endereço de e-mail e enviaremos um link de redefinição de senha.
            </p>

            @if (session('status'))
            <div style="
                    background: #dbeafe;
                    border: 1px solid #93c5fd;
                    border-radius: 8px;
                    padding: 12px 16px;
                    margin-bottom: 24px;
                    font-size: 14px;
                    color: #1e40af;
                ">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div style="margin-bottom: 20px;">
                    <label for="email" style="
                        display: block;
                        font-size: 14px;
                        font-weight: 500;
                        color: #0f172a;
                        margin-bottom: 8px;
                    ">
                        E-mail
                    </label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        style="
                            width: 100%;
                            padding: 10px 12px;
                            border: 1px solid #e2e8f0;
                            border-radius: 8px;
                            font-size: 14px;
                            color: #0f172a;
                            background: #ffffff;
                            box-sizing: border-box;
                            transition: all 0.15s ease;
                        "
                        onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 3px rgba(59, 130, 246, 0.1)';"
                        onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none';" />
                    @error('email')
                    <p style="
                            font-size: 13px;
                            color: #dc2626;
                            margin: 6px 0 0 0;
                        ">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <button
                    type="submit"
                    style="
                        width: 100%;
                        padding: 10px 16px;
                        background: #0f172a;
                        color: #ffffff;
                        border: none;
                        border-radius: 8px;
                        font-size: 14px;
                        font-weight: 500;
                        cursor: pointer;
                        transition: all 0.15s ease;
                        margin-top: 4px;
                    "
                    onmouseover="this.style.opacity='0.9';"
                    onmouseout="this.style.opacity='1';">
                    Enviar Link de Recuperação
                </button>
            </form>

            <div style="
                text-align: center;
                margin-top: 24px;
                padding-top: 24px;
                border-top: 1px solid #e2e8f0;
            ">
                <a href="{{ route('login') }}" style="
                    font-size: 14px;
                    color: #0f172a;
                    text-decoration: none;
                    font-weight: 500;
                    transition: all 0.15s ease;
                "
                    onmouseover="this.style.color='#3b82f6';"
                    onmouseout="this.style.color='#0f172a';">
                    Voltar ao Login
                </a>
            </div>
        </div>
    </div>
</div>
@endsection