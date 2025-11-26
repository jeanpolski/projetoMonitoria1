<section>
    <form method="post" action="{{ route('password.update') }}" style="display: flex; flex-direction: column; gap: 1.5rem;">
        @csrf
        @method('put')

        <div>
            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #0f172a; margin-bottom: 0.5rem;">Senha Atual</label>
            <input type="password" name="current_password" autocomplete="current-password" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; color: #0f172a;" />
            @error('updatePassword.current_password') <span style="font-size: 0.875rem; color: #ef4444; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
        </div>

        <div>
            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #0f172a; margin-bottom: 0.5rem;">Nova Senha</label>
            <input type="password" name="password" autocomplete="new-password" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; color: #0f172a;" />
            @error('updatePassword.password') <span style="font-size: 0.875rem; color: #ef4444; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
        </div>

        <div>
            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #0f172a; margin-bottom: 0.5rem;">Confirmar Senha</label>
            <input type="password" name="password_confirmation" autocomplete="new-password" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; color: #0f172a;" />
            @error('updatePassword.password_confirmation') <span style="font-size: 0.875rem; color: #ef4444; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
        </div>

        <div>
            <button type="submit" style="padding: 0.75rem 1.5rem; background: #0f172a; color: white; border: none; border-radius: 8px; font-size: 0.95rem; font-weight: 500; cursor: pointer;">Salvar</button>
            @if (session('status') === 'password-updated') <span style="font-size: 0.875rem; color: #10b981; margin-left: 1rem;">Salvo!</span> @endif
        </div>
    </form>
</section>