<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Buku extends Model
{
    protected $table = 'buku';

    protected $fillable = [
        'kategori_id',
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'isbn',
        'cover',
        'deskripsi',
        'lama_pinjam_hari',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriBuku::class, 'kategori_id');
    }

    public function eksemplar(): HasMany
    {
        return $this->hasMany(EksemplarBuku::class, 'buku_id');
    }

    public function eksemplarTersedia(): HasMany
    {
        return $this->eksemplar()->where('status_fisik', 'tersedia');
    }

    /**
     * Lama pinjam efektif untuk buku ini: pakai override buku,
     * kalau kosong fallback ke default_lama_pinjam_hari di pengaturan_sistem.
     */
    public function lamaPinjamEfektif(): int
    {
        return $this->lama_pinjam_hari
            ?? (int) (PengaturanSistem::get('default_lama_pinjam_hari') ?? 7);
    }
}