<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class AdminController extends Controller
{
    public function dashboard()
    {
        $produk = Produk::where('id_user', auth()->id())
                    ->latest()
                    ->take(5)
                    ->get();

        $jumlahProduk = Produk::where('id_user', auth()->id())
                            ->count();

        return view('admin.dashboard', compact(
            'produk',
            'jumlahProduk'
        ));
    }
}

