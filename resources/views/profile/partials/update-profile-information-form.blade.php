<section>
    <form method="post" action="{{ route('profile.update') }}" style="display: flex; flex-direction: column; gap: 1.5rem;">
        @csrf
        @method('patch')

        <div>
            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #0f172a; margin-bottom: 0.5rem;">Nome</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; color: #0f172a;" />
            @error('name') <span style="font-size: 0.875rem; color: #ef4444; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror
        </div>

        <div>
            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #0f172a; margin-bottom: 0.5rem;">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; color: #0f172a;" />
            @error('email') <span style="font-size: 0.875rem; color: #ef4444; display: block; margin-top: 0.25rem;">{{ $message }}</span> @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <p style="font-size: 0.875rem; color: #f59e0b; margin-top: 1rem;">Email não verificado. <button form="send-verification" style="text-decoration: underline; color: #0f172a; cursor: pointer; border: none; background: none; font-weight: 500;">Reenviar.</button></p>
            @if (session('status') === 'verification-link-sent') <p style="font-size: 0.875rem; color: #10b981; margin-top: 0.5rem;">Link enviado!</p> @endif
            @endif
        </div>

        <div>
            <button type="submit" style="padding: 0.75rem 1.5rem; background: #0f172a; color: white; border: none; border-radius: 8px; font-size: 0.95rem; font-weight: 500; cursor: pointer;">Salvar</button>
            @if (session('status') === 'profile-updated') <span style="font-size: 0.875rem; color: #10b981; margin-left: 1rem;">Salvo!</span> @endif
        </div>
    </form>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}" style="display: none;">@csrf</form>
</section>