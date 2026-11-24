@extends('layouts.superadmin')

@section('title', 'Edit Admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit Akun Admin</h2>
        <a href="{{ route('superadmin.admin.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow card-custom">
        <div class="card-body p-4">
            <form action="{{ route('superadmin.admin.update', $admin->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $admin->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $admin->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="alert alert-info py-2 mt-4 mb-3">
                    <small>Biarkan kolom password kosong jika Anda tidak ingin mengubah password akun ini.</small>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password Baru (Opsional)</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-2"><i class="bi bi-save me-1"></i> Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endsection
