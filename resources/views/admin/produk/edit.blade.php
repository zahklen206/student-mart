@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit Produk</h2>
        <a href="{{ route('admin.produk.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow card-custom">
        <div class="card-body p-4">
            <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-8">
                        <label for="nama_produk" class="form-label">Nama Produk <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" required>
                        @error('nama_produk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="kategori_id" class="form-label">Kategori <span class="text-danger">*</span></label>
                        <select class="form-select @error('kategori_id') is-invalid @enderror" id="kategori_id" name="kategori_id" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategori as $k)
                                <option value="{{ $k->id }}" {{ old('kategori_id', $produk->kategori_id) == $k->id ? 'selected' : '' }}>{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="harga" class="form-label">Harga (Rp) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga', $produk->harga) }}" min="0" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="no_whatsapp" class="form-label">No. WhatsApp <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('no_whatsapp') is-invalid @enderror" id="no_whatsapp" name="no_whatsapp" value="{{ old('no_whatsapp', $produk->no_whatsapp) }}" required>
                        @error('no_whatsapp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Produk</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-4">
                    <div class="col-md-8">
                        <label for="foto" class="form-label">Foto Produk Baru (Opsional)</label>
                        <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto" accept="image/*">
                        <div class="form-text">Biarkan kosong jika tidak ingin mengubah gambar. Maksimal 2MB.</div>
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        @if($produk->foto)
                            <p class="form-label mb-1">Foto Saat Ini:</p>
                            <img src="{{ asset('storage/' . $produk->foto) }}" alt="Foto" class="img-thumbnail" style="max-height: 120px; width: auto;">
                        @endif
                    </div>
                </div>

                <hr class="my-4">
                <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-1"></i> Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endsection
