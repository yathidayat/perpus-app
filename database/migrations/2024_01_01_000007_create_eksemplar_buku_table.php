<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('eksemplar_buku', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buku_id')
                ->constrained('buku')
                ->cascadeOnDelete();
            $table->string('kode_barcode', 50)->unique();
            $table->enum('status_fisik', ['tersedia', 'dipinjam', 'rusak', 'hilang'])
                ->default('tersedia');
            $table->string('kondisi', 100)->nullable()->comment('mis: baik, sampul lepas, dll');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('eksemplar_buku');
    }
};
