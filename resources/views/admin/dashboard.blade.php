@extends('layouts.admin')

@section('title', 'Dashboard Penjual')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
            <h2 class="fw-bold mb-1" style="color: #1e293b;">Dashboard Penjual</h2>
            <p class="text-muted mb-0">
                Selamat datang kembali, <strong>{{ Auth::user()->name }}</strong>! Kelola produk jualan Anda di sini.
            </p>
        </div>
        <div class="d-flex gap-2">
            <a href="/" target="_blank" class="btn btn-outline-secondary">
                <i class="bi bi-box-arrow-up-right me-1"></i> Lihat Toko
            </a>
            <a href="{{ route('admin.produk.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Tambah Produk
            </a>
        </div>
    </div>

    <!-- Statistik Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm card-custom border-0" style="border-left: 4px solid #2E5B88 !important;">
                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted small text-uppercase fw-semibold">Total Produk Saya</span>
                        <h2 class="fw-bold mb-0 mt-2 text-dark">{{ $jumlahProduk ?? 0 }}</h2>
                        <small class="text-muted">Item aktif</small>
                    </div>
                    <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary">
                        <i class="bi bi-box-seam fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm card-custom border-0" style="border-left: 4px solid #059669 !important;">
                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted small text-uppercase fw-semibold">Kategori Digunakan</span>
                        <h2 class="fw-bold mb-0 mt-2 text-dark">{{ $jumlahKategori ?? 0 }}</h2>
                        <small class="text-muted">Kategori produk</small>
                    </div>
                    <div class="bg-success bg-opacity-10 p-3 rounded-circle text-success">
                        <i class="bi bi-tags fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm card-custom border-0" style="border-left: 4px solid #d97706 !important;">
                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted small text-uppercase fw-semibold">Status Akun</span>
                        <h4 class="fw-bold mb-0 mt-2 text-success">
                            <i class="bi bi-check-circle-fill me-1"></i> Aktif
                        </h4>
                        <small class="text-muted">Penjual Mahasiswa</small>
                    </div>
                    <div class="bg-warning bg-opacity-10 p-3 rounded-circle text-warning">
                        <i class="bi bi-person-check fs-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk Terbaru -->
    <div class="card shadow-sm card-custom border-0">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-0">
            <h5 class="fw-bold mb-0 text-dark">
                <i class="bi bi-clock-history me-2 text-primary"></i>Produk Terbaru Saya
            </h5>
            <a href="{{ route('admin.produk.index') }}" class="btn btn-sm btn-outline-primary">
                Lihat Semua Produk <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Foto</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>WhatsApp</th>
                            <th class="text-center pe-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produk ?? [] as $p)
                        <tr>
                            <td class="ps-4" style="width: 70px;">
                                @if($p->foto && $p->foto !== '')
                                    <img src="{{ asset('storage/' . $p->foto) }}" alt="Foto" class="rounded border" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="bg-light text-muted d-flex justify-content-center align-items-center rounded border" style="width: 50px; height: 50px;">
                                        <i class="bi bi-image"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <strong class="text-dark">{{ $p->nama_produk }}</strong>
                            </td>
                            <td>
                                <span class="fw-bold text-success">Rp {{ number_format($p->harga, 0, ',', '.') }}</span>
                            </td>
                            <td>
                                <span class="badge bg-light text-primary border">{{ $p->kategori->nama_kategori ?? '-' }}</span>
                            </td>
                            <td>
                                <small class="text-muted"><i class="bi bi-whatsapp text-success me-1"></i>{{ $p->no_whatsapp }}</small>
                            </td>
                            <td class="text-center pe-4" style="width: 140px;">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('produk.show', $p->id) }}" target="_blank" class="btn btn-sm btn-outline-secondary" title="Lihat di Toko">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.produk.edit', $p->id) }}" class="btn btn-sm btn-warning text-dark" title="Edit Produk">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.produk.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus Produk">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-5">
                                <i class="bi bi-box-seam d-block fs-1 mb-2 text-secondary opacity-50"></i>
                                <p class="mb-2">Anda belum menambahkan produk apa pun.</p>
                                <a href="{{ route('admin.produk.create') }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-plus-circle me-1"></i> Tambah Produk Pertama
                                </a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
