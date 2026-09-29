<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Akun Super Admin
        $superadmin = User::firstOrCreate(
            ['email' => 'superadmin@studentmart.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'role' => 'superadmin',
            ]
        );

        // 2. Akun Admin / Penjual
        $admin = User::firstOrCreate(
            ['email' => 'admin@studentmart.com'],
            [
                'name' => 'Admin Mahasiswa',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // 3. Kategori Awal
        $kategoris = [
            'Buku & Alat Tulis',
            'Elektronik & Gadget',
            'Fashion & Pakaian',
            'Makanan & Minuman',
            'Jasa & Percetakan',
            'Kebutuhan Kos',
        ];

        $kategoriInstances = [];
        foreach ($kategoris as $nama) {
            $kategoriInstances[$nama] = Kategori::firstOrCreate([
                'nama_kategori' => $nama,
            ]);
        }

        // 4. Contoh Produk Awal untuk Penjual
        if (Produk::count() === 0) {
            Produk::create([
                'id_user' => $admin->id,
                'kategori_id' => $kategoriInstances['Buku & Alat Tulis']->id,
                'nama_produk' => 'Buku Pemrograman Web Dasar',
                'harga' => 45000,
                'deskripsi' => 'Buku referensi kuliah pemrograman web kondisi masih sangat mulus dan lengkap.',
                'foto' => null,
                'no_whatsapp' => '081234567890',
            ]);

            Produk::create([
                'id_user' => $admin->id,
                'kategori_id' => $kategoriInstances['Elektronik & Gadget']->id,
                'nama_produk' => 'Kalkulator Scientific Casio',
                'harga' => 85000,
                'deskripsi' => 'Kalkulator scientific untuk mahasiswa teknik/akuntansi. Berfungsi normal 100%.',
                'foto' => null,
                'no_whatsapp' => '081234567890',
            ]);

            Produk::create([
                'id_user' => $admin->id,
                'kategori_id' => $kategoriInstances['Jasa & Percetakan']->id,
                'nama_produk' => 'Jasa Print & Jilid Skripsi / Makalah',
                'harga' => 15000,
                'deskripsi' => 'Layanan cetak dokumen, makalah, dan jilid spiral/hardcover cepat selesai.',
                'foto' => null,
                'no_whatsapp' => '081234567890',
            ]);
        }
    }
}
