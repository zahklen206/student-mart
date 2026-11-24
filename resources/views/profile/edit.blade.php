<!DOCTYPE html>
<html>
<head>
    <title>Profil Saya - StudentMart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f5f7fb; }
        .card-custom { border: none; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Profil Saya</h2>
                @if(Auth::user()->role === 'superadmin')
                    <a href="/superadmin/dashboard" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Kembali ke Dashboard</a>
                @elseif(Auth::user()->role === 'admin')
                    <a href="/admin/dashboard" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Kembali ke Dashboard</a>
                @else
                    <a href="/" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Kembali ke Beranda</a>
                @endif
            </div>

            @if(session('status') === 'profile-updated')
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Profil berhasil diperbarui.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card card-custom mb-4">
                <div class="card-body p-4">
                    <h5 class="card-title fw-bold mb-4">Informasi Profil</h5>
                    <form method="post" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')

                        <div class="mb-3">
                            <label class="form-label text-muted">Role</label>
                            <input type="text" class="form-control bg-light" value="{{ strtoupper(Auth::user()->role) }}" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                            @error('name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Simpan Perubahan</button>
                    </form>
                </div>
            </div>

            <div class="card card-custom">
                <div class="card-body p-4">
                    <h5 class="card-title fw-bold mb-4">Ubah Password</h5>
                    <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label for="current_password" class="form-label">Password Saat Ini</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" required>
                            @error('current_password', 'updatePassword')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            @error('password', 'updatePassword')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-warning mt-2">Perbarui Password</button>

                        @if(session('status') === 'password-updated')
                            <span class="text-success ms-3 small">Password berhasil diubah.</span>
                        @endif
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
