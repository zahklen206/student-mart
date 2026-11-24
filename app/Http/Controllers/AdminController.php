<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class AdminController extends Controller
{
    public function dashboard()
    {
        $userId = auth()->id();

        $produk = Produk::with('kategori')
                    ->where('id_user', $userId)
                    ->latest()
                    ->take(5)
                    ->get();

        $jumlahProduk = Produk::where('id_user', $userId)->count();
        $jumlahKategori = Produk::where('id_user', $userId)->distinct('kategori_id')->count('kategori_id');

        return view('admin.dashboard', compact(
            'produk',
            'jumlahProduk',
            'jumlahKategori'
        ));
    }
}

