@extends('layouts.superadmin')

@section('title', 'Dashboard Super Admin')

@section('content')
    <h2>Dashboard Super Admin</h2>

    <p class="text-muted">
        Selamat datang di StudentMart, {{ Auth::user()->name }}
    </p>

    <div class="row mt-4 g-3">
        <div class="col-md-3">
            <div class="card shadow card-custom">
                <div class="card-body">
                    <h5>Total User</h5>
                    <h1>{{ $totalUser ?? 0 }}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow card-custom">
                <div class="card-body">
                    <h5>Total Produk</h5>
                    <h1>{{ $totalProduk ?? 0 }}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow card-custom">
                <div class="card-body">
                    <h5>Total Kategori</h5>
                    <h1>{{ $totalKategori ?? 0 }}</h1>
                </div>
            </div>
        </div>
    </div>

    <h4 class="mt-5">Produk Terbaru</h4>

    <div class="table-responsive">
        <table class="table table-bordered mt-3">
            <thead class="table-light">
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Penjual</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produk ?? [] as $p)
                <tr>
                    <td>{{ $p->nama_produk }}</td>
                    <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                    <td>{{ $p->kategori->nama_kategori ?? '-' }}</td>
                    <td>{{ $p->user->name ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Belum ada produk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
