@extends('layouts.superadmin')

@section('title', 'Semua Produk')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Semua Produk</h2>
    </div>

    <div class="card shadow card-custom mb-4">
        <div class="card-body">
            <form action="{{ route('superadmin.produk.index') }}" method="GET" class="d-flex w-50">
                <input type="text" name="q" class="form-control me-2" placeholder="Cari nama produk..." value="{{ request('q') }}">
                <button type="submit" class="btn btn-outline-primary"><i class="bi bi-search"></i></button>
                @if(request('q'))
                    <a href="{{ route('superadmin.produk.index') }}" class="btn btn-outline-secondary ms-2">Reset</a>
                @endif
            </form>
        </div>
    </div>

    <div class="card shadow card-custom">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Foto</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Penjual (Admin)</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produk as $p)
                            <tr>
                                <td style="width: 80px;">
                                    @if($p->foto)
                                        <img src="{{ asset('storage/' . $p->foto) }}" alt="Foto" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="bg-light text-muted d-flex justify-content-center align-items-center img-thumbnail" style="width: 60px; height: 60px;">
                                            <i class="bi bi-image"></i>
                                        </div>
                                    @endif
                                </td>
                                <td><strong>{{ $p->nama_produk }}</strong></td>
                                <td>{{ $p->kategori->nama_kategori ?? '-' }}</td>
                                <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge bg-info text-dark">
                                        <i class="bi bi-person me-1"></i>{{ $p->user->name ?? 'Unknown' }}
                                    </span>
                                </td>
                                <td class="text-center" style="width: 100px;">
                                    <form action="{{ route('superadmin.produk.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini dari sistem?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus Produk">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    <i class="bi bi-box-seam d-block fs-3 mb-2"></i>
                                    Belum ada produk di sistem.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="mt-3 d-flex justify-content-end">
                {{ $produk->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
