<x-guest-layout>
    <div class="mb-4 text-center">
        <h4 class="fw-bold text-dark mb-1">Daftar Akun Penjual</h4>
        <p class="text-muted small">Mulai jual produk dan kebutuhan kuliah Anda di StudentMart.</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label fw-semibold small text-secondary">Nama Lengkap</label>
            <div class="input-group">
                <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-person"></i></span>
                <input id="name" class="form-control border-start-0 @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Nama Anda" required autofocus autocomplete="name">
            </div>
            @error('name')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label fw-semibold small text-secondary">Alamat Email</label>
            <div class="input-group">
                <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-envelope"></i></span>
                <input id="email" class="form-control border-start-0 @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required autocomplete="username">
            </div>
            @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label fw-semibold small text-secondary">Password</label>
            <div class="input-group">
                <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-lock"></i></span>
                <input id="password" class="form-control border-start-0 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Minimal 8 karakter" required autocomplete="new-password">
            </div>
            @error('password')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="form-label fw-semibold small text-secondary">Konfirmasi Password</label>
            <div class="input-group">
                <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-shield-check"></i></span>
                <input id="password_confirmation" class="form-control border-start-0 @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" placeholder="Ulangi password" required autocomplete="new-password">
            </div>
            @error('password_confirmation')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-auth w-100 mb-3">
            <i class="bi bi-person-plus me-1"></i> Daftar Sebagai Penjual
        </button>

        <div class="text-center pt-2 border-top">
            <span class="text-muted small">Sudah memiliki akun?</span>
            <a href="{{ route('login') }}" class="text-decoration-none fw-semibold small ms-1" style="color: #2E5B88;">
                Masuk di sini
            </a>
        </div>

        <div class="text-center mt-3">
            <a href="/" class="text-muted small text-decoration-none">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
            </a>
        </div>
    </form>
</x-guest-layout>
