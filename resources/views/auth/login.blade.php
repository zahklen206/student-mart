<x-guest-layout>
    <div class="mb-4 text-center">
        <h5 class="fw-bold mb-1" style="color: #1e293b;">Masuk ke Akun</h5>
        <p class="text-muted small mb-0">Silakan masukkan email dan password untuk melanjutkan</p>
    </div>

    <!-- Status Sesi (contoh: notifikasi reset password berhasil) -->
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show small py-2 px-3 mb-3" role="alert">
            <i class="bi bi-check-circle me-1"></i> {{ session('status') }}
            <button type="button" class="btn-close small" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Alert error jika kredensial salah -->
    @if (isset($errors) && $errors->any())
        <div class="alert alert-danger alert-dismissible fade show small py-2 px-3 mb-3" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i> 
            @if ($errors->has('email'))
                {{ $errors->first('email') }}
            @elseif ($errors->has('password'))
                {{ $errors->first('password') }}
            @else
                Email atau password yang Anda masukkan salah.
            @endif
            <button type="button" class="btn-close small" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Alamat Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input id="email" 
                       type="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       class="form-control @error('email') is-invalid @enderror" 
                       placeholder="nama@email.com" 
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
            <div class="d-flex justify-content-between align-items-center mb-1">
                <label for="password" class="form-label mb-0">Password</label>
                @if (Route::has('password.request'))
                    <a class="small text-decoration-none" style="color: var(--sm-primary); font-weight: 500;" href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                @endif
            </div>

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

        <!-- Ingat Saya -->
        <div class="mb-4 form-check">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label small text-muted">
                Ingat saya di perangkat ini
            </label>
        </div>

        <!-- Tombol Masuk -->
        <button type="submit" class="btn btn-primary-custom w-100 mb-2">
            <i class="bi bi-box-arrow-in-right me-2"></i>Masuk Sekarang
        </button>
    </form>

    @if (Route::has('register'))
        <div class="divider-text">
            <hr>
            <span>atau</span>
        </div>

        <div class="text-center">
            <p class="small text-muted mb-2">Belum memiliki akun penjual?</p>
            <a href="{{ route('register') }}" class="btn btn-outline-primary-custom w-100">
                <i class="bi bi-person-plus me-2"></i>Daftar Sebagai Penjual
            </a>
        </div>
    @endif
</x-guest-layout>
