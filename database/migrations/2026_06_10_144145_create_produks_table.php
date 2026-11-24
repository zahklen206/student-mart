<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {

            $table->id();

            $table->foreignId('id_user')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->foreignId('kategori_id')
                  ->constrained('kategoris')
                  ->onDelete('cascade');

            $table->string('nama_produk');

            $table->integer('harga');

            $table->text('deskripsi')->nullable();

            $table->string('foto')->nullable();

            $table->string('no_whatsapp');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};

