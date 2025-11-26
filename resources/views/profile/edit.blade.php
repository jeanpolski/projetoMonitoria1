@extends('layouts.app')

@section('content')
<div style="min-height: 100vh; background: #ffffff; padding: 2rem 1rem;">
    <div style="max-width: 600px; margin: 0 auto;">
        <!-- Header -->
        <div style="margin-bottom: 3rem; text-align: center;">
            <h1 style="font-size: 2rem; font-weight: 700; color: #0f172a; margin-bottom: 0.5rem;">Perfil</h1>
            <p style="font-size: 0.95rem; color: #64748b;">Gerencie suas informações pessoais e segurança</p>
        </div>

        <!-- Informações Pessoais -->
        <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 2rem; margin-bottom: 2rem;">
            <div style="margin-bottom: 2rem; border-bottom: 1px solid #e2e8f0; padding-bottom: 1.5rem;">
                <h2 style="font-size: 1.25rem; font-weight: 600; color: #0f172a; margin-bottom: 0.5rem;">Informações Pessoais</h2>
                <p style="font-size: 0.875rem; color: #64748b;">Atualize seu nome e endereço de email</p>
            </div>
            @include('profile.partials.update-profile-information-form')
        </div>

        <!-- Segurança -->
        <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 2rem; margin-bottom: 2rem;">
            <div style="margin-bottom: 2rem; border-bottom: 1px solid #e2e8f0; padding-bottom: 1.5rem;">
                <h2 style="font-size: 1.25rem; font-weight: 600; color: #0f172a; margin-bottom: 0.5rem;">Segurança</h2>
                <p style="font-size: 0.875rem; color: #64748b;">Altere sua senha para manter sua conta protegida</p>
            </div>
            @include('profile.partials.update-password-form')
        </div>

        <!-- Zona de Perigo -->
        <div style="background: #fef2f2; border: 1px solid #fecaca; border-radius: 12px; padding: 2rem;">
            <div style="margin-bottom: 2rem; border-bottom: 1px solid #fecaca; padding-bottom: 1.5rem;">
                <h2 style="font-size: 1.25rem; font-weight: 600; color: #991b1b; margin-bottom: 0.5rem;">Zona de Perigo</h2>
                <p style="font-size: 0.875rem; color: #dc2626;">Ações irreversíveis - tenha cuidado</p>
            </div>
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection