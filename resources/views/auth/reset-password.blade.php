<x-guest-layout>
    <div class="mb-4 text-center">
        <h4 class="fw-bold text-dark mb-1">Reset Password</h4>
        <p class="text-muted small">Masukkan password baru Anda di bawah ini.</p>
    </div>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label fw-semibold small text-secondary">Alamat Email</label>
            <div class="input-group">
                <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-envelope"></i></span>
                <input id="email" class="form-control border-start-0 @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
            </div>
            @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label fw-semibold small text-secondary">Password Baru</label>
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
            <label for="password_confirmation" class="form-label fw-semibold small text-secondary">Konfirmasi Password Baru</label>
            <div class="input-group">
                <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-shield-check"></i></span>
                <input id="password_confirmation" class="form-control border-start-0 @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" placeholder="Ulangi password baru" required autocomplete="new-password">
            </div>
            @error('password_confirmation')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-auth w-100 mb-3">
            <i class="bi bi-check-circle me-1"></i> Simpan Password Baru
        </button>

        <div class="text-center pt-2 border-top">
            <a href="{{ route('login') }}" class="text-decoration-none fw-semibold small" style="color: #2E5B88;">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Login
            </a>
        </div>
    </form>
</x-guest-layout>
