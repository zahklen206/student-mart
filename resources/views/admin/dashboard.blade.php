@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <h2>Dashboard Admin</h2>

    <p class="text-muted">
        Selamat datang di StudentMart, {{ Auth::user()->name }}
    </p>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card shadow card-custom">
                <div class="card-body">
                    <h5>Jumlah Produk Saya</h5>
                    <h1>{{ $jumlahProduk ?? 0 }}</h1>
                </div>
            </div>
        </div>
    </div>

    <h4 class="mt-5">Produk Terbaru Saya</h4>

    <div class="table-responsive">
        <table class="table table-bordered mt-3">
            <thead class="table-light">
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produk ?? [] as $p)
                <tr>
                    <td>{{ $p->nama_produk }}</td>
                    <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                    <td>{{ $p->kategori->nama_kategori ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">Belum ada produk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
