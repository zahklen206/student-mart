<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Daftar semua produk - PUBLIK (tanpa login)
     */
    public function index(Request $request)
    {
        $query = Produk::with('kategori', 'user')->latest();

        if ($request->has('q') && $request->q != '') {
            $query->where('nama_produk', 'like', '%' . $request->q . '%');
        }

        $produk = $query->paginate(12);

        return view('produk.index', compact('produk'));
    }

    /**
     * Detail produk - PUBLIK (tanpa login)
     */
    public function show(string $id)
    {
        $produk = Produk::with('kategori', 'user')->findOrFail($id);

        // Format nomor WA: hapus 0 di depan, ganti dengan 62
        $noWa = $produk->no_whatsapp;
        if (str_starts_with($noWa, '0')) {
            $noWa = '62' . substr($noWa, 1);
        }
        $noWa = preg_replace('/[^0-9]/', '', $noWa);

        $pesanWa = urlencode("Halo, saya tertarik dengan produk *{$produk->nama_produk}* yang dijual di StudentMart. Apakah masih tersedia?");
        $linkWa  = "https://wa.me/{$noWa}?text={$pesanWa}";

        return view('produk.show', compact('produk', 'linkWa'));
    }

    /**
     * Daftar produk Admin (Produk milik sendiri)
     */
    public function adminIndex()
    {
        $produk = Produk::with('kategori')
            ->where('id_user', Auth::id())
            ->latest()
            ->paginate(10);
            
        return view('admin.produk.index', compact('produk'));
    }

    /**
     * Form tambah produk Admin
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.produk.create', compact('kategori'));
    }

    /**
     * Simpan produk baru - Admin
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'harga'       => 'required|numeric|min:0',
            'deskripsi'   => 'nullable|string',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'no_whatsapp' => 'required|string|max:20',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('produk_images', 'public');
        }

        Produk::create([
            'id_user'     => Auth::id(),
            'kategori_id' => $request->kategori_id,
            'nama_produk' => $request->nama_produk,
            'harga'       => $request->harga,
            'deskripsi'   => $request->deskripsi,
            'foto'        => $fotoPath,
            'no_whatsapp' => $request->no_whatsapp,
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Form edit produk Admin
     */
    public function edit(string $id)
    {
        $produk = Produk::findOrFail($id);
        
        // Pastikan hanya pemilik yang bisa mengedit
        if ($produk->id_user !== Auth::id()) {
            abort(403, 'Akses tidak diizinkan.');
        }

        $kategori = Kategori::all();
        return view('admin.produk.edit', compact('produk', 'kategori'));
    }

    /**
     * Update produk Admin
     */
    public function update(Request $request, string $id)
    {
        $produk = Produk::findOrFail($id);
        
        // Pastikan hanya pemilik yang bisa update
        if ($produk->id_user !== Auth::id()) {
            abort(403, 'Akses tidak diizinkan.');
        }

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'harga'       => 'required|numeric|min:0',
            'deskripsi'   => 'nullable|string',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'no_whatsapp' => 'required|string|max:20',
        ]);

        $fotoPath = $produk->foto;
        if ($request->hasFile('foto')) {
            if ($fotoPath && Storage::disk('public')->exists($fotoPath)) {
                Storage::disk('public')->delete($fotoPath);
            }
            $fotoPath = $request->file('foto')->store('produk_images', 'public');
        }

        $produk->update([
            'kategori_id' => $request->kategori_id,
            'nama_produk' => $request->nama_produk,
            'harga'       => $request->harga,
            'deskripsi'   => $request->deskripsi,
            'foto'        => $fotoPath,
            'no_whatsapp' => $request->no_whatsapp,
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Hapus produk Admin
     */
    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);
        
        // Superadmin boleh hapus semuanya. Admin hanya hapus produknya sendiri.
        if (Auth::user()->role !== 'superadmin' && $produk->id_user !== Auth::id()) {
            abort(403, 'Akses tidak diizinkan.');
        }

        if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
            Storage::disk('public')->delete($produk->foto);
        }

        $produk->delete();

        if (Auth::user()->role === 'superadmin') {
            return redirect()->route('superadmin.produk.index')->with('success', 'Produk berhasil dihapus!');
        }

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus!');
    }

    /**
     * Daftar semua produk (Superadmin)
     */
    public function superadminIndex(Request $request)
    {
        $query = Produk::with('kategori', 'user')->latest();
        
        if ($request->has('q') && $request->q != '') {
            $query->where('nama_produk', 'like', '%' . $request->q . '%');
        }

        $produk = $query->paginate(15);
        return view('superadmin.produk.index', compact('produk'));
    }
}
