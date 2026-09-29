<x-guest-layout>
    <div class="mb-4 text-center">
        <h5 class="fw-bold mb-1" style="color: #1e293b;">Konfirmasi Password</h5>
        <p class="text-muted small mb-0">
            Ini adalah area keamanan aplikasi. Harap masukkan password Anda sebelum melanjutkan.
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input id="password" 
                       type="password" 
                       name="password" 
                       class="form-control @error('password') is-invalid @enderror" 
                       placeholder="Masukkan password Anda" 
                       required 
                       autocomplete="current-password">
                <button type="button" 
                        class="btn btn-toggle-pw" 
                        onclick="togglePasswordVisibility('password', this)" 
                        title="Lihat / Sembunyikan Password">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
            @error('password')
                <div class="text-danger small mt-1">
                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary-custom w-100 mb-3">
            <i class="bi bi-shield-check me-2"></i>Konfirmasi Password
        </button>
    </form>
</x-guest-layout>
