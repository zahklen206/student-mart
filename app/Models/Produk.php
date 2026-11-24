<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'id_user',
        'kategori_id',
        'nama_produk',
        'harga',
        'deskripsi',
        'foto',
        'no_whatsapp'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}

