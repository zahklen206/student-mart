<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use App\Models\Kategori;

class SuperAdminController extends Controller
{
    public function dashboard()
    {
        $produk = Produk::latest()
                    ->take(5)
                    ->get();

        return view('superadmin.dashboard', [
            'totalUser' => User::count(),
            'totalProduk' => Produk::count(),
            'totalKategori' => Kategori::count(),
            'produk' => $produk,
        ]);
    }
}

