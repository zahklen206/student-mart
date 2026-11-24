<x-guest-layout>
    <div class="mb-4 text-center">
        <h4 class="fw-bold text-dark mb-1">Masuk ke Akun Anda</h4>
        <p class="text-muted small">Silakan masukkan email dan password untuk melanjutkan.</p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show small" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label fw-semibold small text-secondary">Email</label>
            <div class="input-group">
                <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-envelope"></i></span>
                <input id="email" class="form-control border-start-0 @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required autofocus autocomplete="username">
            </div>
            @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <label for="password" class="form-label fw-semibold small text-secondary mb-0">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-decoration-none small text-muted" href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                @endif
            </div>
            <div class="input-group mt-1">
                <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-lock"></i></span>
                <input id="password" class="form-control border-start-0 @error('password') is-invalid @enderror" type="password" name="password" placeholder="••••••••" required autocomplete="current-password">
            </div>
            @error('password')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="mb-4 form-check">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label small text-muted">Ingat saya di perangkat ini</label>
        </div>

        <button type="submit" class="btn btn-auth w-100 mb-3">
            <i class="bi bi-box-arrow-in-right me-1"></i> Masuk Sekarang
        </button>

        <div class="text-center pt-2 border-top">
            <span class="text-muted small">Belum punya akun penjual?</span>
            <a href="{{ route('register') }}" class="text-decoration-none fw-semibold small ms-1" style="color: #2E5B88;">
                Daftar Sekarang
            </a>
        </div>

        <div class="text-center mt-3">
            <a href="/" class="text-muted small text-decoration-none">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
            </a>
        </div>
    </form>
</x-guest-layout>
