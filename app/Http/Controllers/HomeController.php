<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $produkTerbaru = Produk::with('kategori', 'user')->latest()->take(8)->get();
        $kategori      = Kategori::all();

        return view('home', compact('produkTerbaru', 'kategori'));
    }
}
