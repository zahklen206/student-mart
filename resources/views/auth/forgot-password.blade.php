<x-guest-layout>
    <div class="mb-4 text-center">
        <h4 class="fw-bold text-dark mb-1">Lupa Password?</h4>
        <p class="text-muted small">Masukkan email Anda dan kami akan mengirimkan tautan untuk mengatur ulang password.</p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show small" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <label for="email" class="form-label fw-semibold small text-secondary">Alamat Email</label>
            <div class="input-group">
                <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-envelope"></i></span>
                <input id="email" class="form-control border-start-0 @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required autofocus>
            </div>
            @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-auth w-100 mb-3">
            <i class="bi bi-send me-1"></i> Kirim Tautan Reset Password
        </button>

        <div class="text-center pt-2 border-top">
            <a href="{{ route('login') }}" class="text-decoration-none fw-semibold small" style="color: #2E5B88;">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Login
            </a>
        </div>
    </form>
</x-guest-layout>
