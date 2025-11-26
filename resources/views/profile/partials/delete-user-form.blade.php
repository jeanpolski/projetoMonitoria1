<section>
    <button onclick="document.getElementById('confirm-deletion').style.display='flex'" style="padding: 0.75rem 1.5rem; background: #dc2626; color: white; border: none; border-radius: 8px; font-size: 0.95rem; font-weight: 500; cursor: pointer;">Deletar Conta</button>

    <div id="confirm-deletion" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
        <div style="background: white; border-radius: 12px; padding: 2rem; max-width: 400px; width: 90%; box-shadow: 0 4px 20px rgba(0,0,0,0.15);">
            <h3 style="font-size: 1.125rem; font-weight: 600; color: #0f172a; margin-bottom: 0.5rem;">Tem certeza?</h3>
            <p style="font-size: 0.875rem; color: #64748b; margin-bottom: 1.5rem;">Digite sua senha para confirmar a exclusão da conta.</p>

            <form method="post" action="{{ route('profile.destroy') }}" style="display: flex; flex-direction: column; gap: 1.5rem;">
                @csrf
                @method('delete')

                <input type="password" name="password" placeholder="Sua senha" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.95rem; color: #0f172a;" />
                @error('userDeletion.password') <span style="font-size: 0.875rem; color: #ef4444; display: block;">{{ $message }}</span> @enderror

                <div style="display: flex; gap: 1rem;">
                    <button type="button" onclick="document.getElementById('confirm-deletion').style.display='none'" style="flex: 1; padding: 0.75rem; background: #e2e8f0; color: #0f172a; border: none; border-radius: 8px; font-size: 0.95rem; cursor: pointer; font-weight: 500;">Cancelar</button>
                    <button type="submit" style="flex: 1; padding: 0.75rem; background: #dc2626; color: white; border: none; border-radius: 8px; font-size: 0.95rem; cursor: pointer; font-weight: 500;">Deletar</button>
                </div>
            </form>
        </div>
    </div>
</section>