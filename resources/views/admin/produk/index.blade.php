@extends('layouts.admin')

@section('title', 'Produk Saya')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Produk Saya</h2>
        <a href="{{ route('admin.produk.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Produk
        </a>
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
                                <td>
                                    <strong>{{ $p->nama_produk }}</strong>
                                </td>
                                <td>{{ $p->kategori->nama_kategori ?? '-' }}</td>
                                <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                                <td class="text-center" style="width: 150px;">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('admin.produk.edit', $p->id) }}" class="btn btn-sm btn-warning text-dark">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.produk.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    <i class="bi bi-box-seam d-block fs-3 mb-2"></i>
                                    Anda belum menambahkan produk apa pun.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="mt-3 d-flex justify-content-end">
                {{ $produk->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
