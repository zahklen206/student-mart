<x-guest-layout>
    <div class="mb-4 text-center">
        <div class="mb-3">
            <span class="d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background-color: #e0f2fe; color: #0284c7; border-radius: 50%; font-size: 1.75rem;">
                <i class="bi bi-envelope-check"></i>
            </span>
        </div>
        <h5 class="fw-bold mb-1 text-dark">Verifikasi Email Anda</h5>
        <p class="text-muted small mb-0">
            Terima kasih telah mendaftar! Sebelum memulai, silakan klik tautan verifikasi yang telah kami kirimkan ke alamat email Anda.
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success alert-dismissible fade show small py-2 px-3 mb-3" role="alert">
            <i class="bi bi-check-circle me-1"></i> Tautan verifikasi baru telah dikirimkan ke alamat email Anda.
            <button type="button" class="btn-close small" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex flex-column gap-2 mt-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary-custom w-100">
                <i class="bi bi-arrow-repeat me-2"></i>Kirim Ulang Email Verifikasi
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="text-center mt-2">
            @csrf
            <button type="submit" class="btn btn-link text-muted small text-decoration-none">
                <i class="bi bi-box-arrow-right me-1"></i> Keluar (Log Out)
            </button>
        </form>
    </div>
</x-guest-layout>
