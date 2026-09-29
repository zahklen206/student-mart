<x-guest-layout>
    <div class="mb-4 text-center">
        <h5 class="fw-bold mb-1" style="color: #1e293b;">Lupa Password?</h5>
        <p class="text-muted small mb-0">
            Masukkan alamat email Anda yang terdaftar. Kami akan mengirimkan tautan untuk mengatur ulang password.
        </p>
    </div>

    <!-- Status Sesi -->
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show small py-2 px-3 mb-3" role="alert">
            <i class="bi bi-check-circle me-1"></i> {{ session('status') }}
            <button type="button" class="btn-close small" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <label for="email" class="form-label">Alamat Email Terdaftar</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input id="email" 
                       type="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       class="form-control @error('email') is-invalid @enderror" 
                       placeholder="nama@email.com" 
                       required 
                       autofocus>
            </div>
            @error('email')
                <div class="text-danger small mt-1">
                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary-custom w-100 mb-3">
            <i class="bi bi-send me-2"></i>Kirim Tautan Reset Password
        </button>

        <div class="text-center mt-3">
            <a href="{{ route('login') }}" class="small text-decoration-none" style="color: var(--sm-primary); font-weight: 500;">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Halaman Login
            </a>
        </div>
    </form>
</x-guest-layout>
