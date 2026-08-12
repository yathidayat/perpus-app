<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('denda', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peminjaman_id')
                ->constrained('peminjaman')
                ->cascadeOnDelete();
            $table->unsignedInteger('jumlah')->default(0);
            $table->enum('status_bayar', ['belum_bayar', 'lunas'])->default('belum_bayar');
            $table->date('tgl_bayar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('denda');
    }
};
