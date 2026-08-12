<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EksemplarBuku extends Model
{
    protected $table = 'eksemplar_buku';

    protected $fillable = [
        'buku_id',
        'kode_barcode',
        'status_fisik',
        'kondisi',
    ];

    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }

    public function peminjaman(): HasMany
    {
        return $this->hasMany(Peminjaman::class, 'eksemplar_id');
    }
}