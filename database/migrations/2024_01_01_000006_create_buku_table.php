<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')
                ->constrained('kategori_buku')
                ->restrictOnDelete();
            $table->string('judul', 200);
            $table->string('penulis', 150)->nullable();
            $table->string('penerbit', 150)->nullable();
            $table->smallInteger('tahun_terbit')->nullable();
            $table->string('isbn', 30)->nullable()->unique();
            $table->string('cover')->nullable()->comment('path/url gambar cover');
            $table->text('deskripsi')->nullable();
            $table->unsignedSmallInteger('lama_pinjam_hari')
                ->nullable()
                ->comment('override default_lama_pinjam_hari, null = pakai default sistem');
            $table->timestamps();

            $table->index('judul');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
