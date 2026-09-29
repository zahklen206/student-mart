<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the admins.
     */
    public function index()
    {
        // Hanya tampilkan user dengan role 'admin'
        $admins = User::where('role', 'admin')->latest()->paginate(10);
        return view('superadmin.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new admin.
     */
    public function create()
    {
        return view('superadmin.admin.create');
    }

    /**
     * Store a newly created admin in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin', // Force role admin
        ]);

        return redirect()->route('superadmin.admin.index')->with('success', 'Akun Admin berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified admin.
     */
    public function edit(string $id)
    {
        $admin = User::findOrFail($id);
        
        // Pastikan superadmin tidak mengedit user dengan role selain admin (misal user biasa/superadmin lain) dari menu ini
        if ($admin->role !== 'admin') {
            abort(403, 'Akses tidak diizinkan. Hanya dapat mengedit akun admin.');
        }

        return view('superadmin.admin.edit', compact('admin'));
    }

    /**
     * Update the specified admin in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin = User::findOrFail($id);

        if ($admin->role !== 'admin') {
            abort(403, 'Akses tidak diizinkan. Hanya dapat mengedit akun admin.');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class.',email,'.$admin->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // Jika password diisi, maka update password
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $admin->update($data);

        return redirect()->route('superadmin.admin.index')->with('success', 'Akun Admin berhasil diperbarui!');
    }

    /**
     * Remove the specified admin from storage.
     */
    public function destroy(string $id)
    {
        $admin = User::findOrFail($id);

        if ($admin->role === 'superadmin') {
            return redirect()->route('superadmin.admin.index')->with('error', 'Akun Superadmin tidak dapat dihapus!');
        }

        if ($admin->produks()->count() > 0) {
            return redirect()->route('superadmin.admin.index')->with('error', 'Tidak dapat menghapus admin ini karena masih memiliki produk. Hapus produknya terlebih dahulu.');
        }

        $admin->delete();

        return redirect()->route('superadmin.admin.index')->with('success', 'Akun Admin berhasil dihapus!');
    }
}
