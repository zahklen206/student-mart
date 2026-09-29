@extends('layouts.superadmin')

@section('title', 'Edit Kategori')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit Kategori</h2>
        <a href="{{ route('superadmin.kategori.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow card-custom">
        <div class="card-body p-4">
            <form action="{{ route('superadmin.kategori.update', $kategori->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_kategori" class="form-label">Nama Kategori <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required autofocus>
                    @error('nama_kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-2"><i class="bi bi-save me-1"></i> Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endsection
