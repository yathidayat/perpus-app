<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Denda extends Model
{
    protected $table = 'denda';

    protected $fillable = [
        'peminjaman_id',
        'jumlah',
        'status_bayar',
        'tgl_bayar',
    ];

    protected function casts(): array
    {
        return [
            'tgl_bayar' => 'date',
        ];
    }

    public function peminjaman(): BelongsTo
    {
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id');
    }
}