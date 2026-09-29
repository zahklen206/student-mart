<x-guest-layout>
    <div class="mb-4 text-center">
        <span class="badge rounded-pill px-3 py-1 mb-2" style="background-color: #e0f2fe; color: #0369a1; font-weight: 600; font-size: 0.78rem;">
            <i class="bi bi-shop me-1"></i> Khusus Penjual Mahasiswa Polbeng
        </span>
        <h5 class="fw-bold mb-1" style="color: #1e293b;">Daftar Akun Penjual</h5>
        <p class="text-muted small mb-0">Mulai pasarkan produk dan kebutuhan kuliah Anda</p>
    </div>

    @if (isset($errors) && $errors->any())
        <div class="alert alert-danger alert-dismissible fade show small py-2 px-3 mb-3" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i> Mohon periksa kembali data pendaftaran yang belum valid.
            <button type="button" class="btn-close small" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nama Lengkap -->
        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input id="name" 
                       type="text" 
                       name="name" 
                       value="{{ old('name') }}" 
                       class="form-control @error('name') is-invalid @enderror" 
                       placeholder="Contoh: Ahmad Fauzi" 
                       required 
                       autofocus 
                       autocomplete="name">
            </div>
            @error('name')
                <div class="text-danger small mt-1">
                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                </div>
            @enderror
        </div>

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
            <label for="password" class="form-label">Password</label>
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

        <!-- Konfirmasi Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                <input id="password_confirmation" 
                       type="password" 
                       name="password_confirmation" 
                       class="form-control @error('password_confirmation') is-invalid @enderror" 
                       placeholder="Ketik ulang password" 
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

        <!-- Tombol Daftar -->
        <button type="submit" class="btn btn-primary-custom w-100 mb-2">
            <i class="bi bi-person-check me-2"></i>Daftar Sekarang
        </button>
    </form>

    <div class="divider-text">
        <hr>
        <span>sudah punya akun?</span>
    </div>

    <div class="text-center">
        <p class="small text-muted mb-2">Sudah terdaftar sebagai penjual?</p>
        <a href="{{ route('login') }}" class="btn btn-outline-primary-custom w-100">
            <i class="bi bi-box-arrow-in-right me-2"></i>Masuk ke Akun
        </a>
    </div>
</x-guest-layout>
