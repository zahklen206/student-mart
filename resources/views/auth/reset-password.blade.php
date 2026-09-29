<x-guest-layout>
    <div class="mb-4 text-center">
        <h5 class="fw-bold mb-1" style="color: #1e293b;">Atur Ulang Password</h5>
        <p class="text-muted small mb-0">Silakan masukkan email dan buat password baru Anda</p>
    </div>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input id="email" 
                       type="email" 
                       name="email" 
                       value="{{ old('email', $request->email) }}" 
                       class="form-control @error('email') is-invalid @enderror" 
                       required 
                       autofocus 
                       autocomplete="username">
            </div>
            @error('email')
                <div class="text-danger small mt-1">
                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                </div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password Baru</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input id="password" 
                       type="password" 
                       name="password" 
                       class="form-control @error('password') is-invalid @enderror" 
                       placeholder="Minimal 8 karakter" 
                       required 
                       autocomplete="new-password">
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

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                <input id="password_confirmation" 
                       type="password" 
                       name="password_confirmation" 
                       class="form-control @error('password_confirmation') is-invalid @enderror" 
                       placeholder="Ulangi password baru" 
                       required 
                       autocomplete="new-password">
                <button type="button" 
                        class="btn btn-toggle-pw" 
                        onclick="togglePasswordVisibility('password_confirmation', this)" 
                        title="Lihat / Sembunyikan Password">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
            @error('password_confirmation')
                <div class="text-danger small mt-1">
                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary-custom w-100 mb-3">
            <i class="bi bi-check2-circle me-2"></i>Reset Password
        </button>

        <div class="text-center">
            <a href="{{ route('login') }}" class="small text-decoration-none" style="color: var(--sm-primary); font-weight: 500;">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Halaman Login
            </a>
        </div>
    </form>
</x-guest-layout>
