<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')
                ->constrained('users')
                ->restrictOnDelete();
            $table->foreignId('eksemplar_id')
                ->constrained('eksemplar_buku')
                ->restrictOnDelete();
            $table->foreignId('petugas_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete()
                ->comment('diisi saat admin/petugas melakukan ACC');
            $table->string('kode_verifikasi', 30)->unique()
                ->comment('ditunjukkan siswa ke petugas, bisa diketik manual atau di-scan barcode');
            $table->dateTime('tgl_pengajuan');
            $table->date('tgl_pinjam')->nullable();
            $table->unsignedSmallInteger('durasi_diminta_hari')->nullable()
                ->comment('diisi siswa saat mengajukan, opsional');
            $table->unsignedSmallInteger('durasi_disetujui_hari')->nullable()
                ->comment('diisi petugas saat ACC, jadi acuan akhir tgl_jatuh_tempo');
            $table->date('tgl_jatuh_tempo')->nullable();
            $table->date('tgl_kembali')->nullable();
            $table->enum('status', [
                'menunggu_konfirmasi',
                'dipinjam',
                'dikembalikan',
                'terlambat',
                'ditolak',
            ])->default('menunggu_konfirmasi');
            $table->timestamps();

            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
