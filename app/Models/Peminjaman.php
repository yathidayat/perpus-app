<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $fillable = [
        'siswa_id',
        'eksemplar_id',
        'petugas_id',
        'kode_verifikasi',
        'tgl_pengajuan',
        'tgl_pinjam',
        'durasi_diminta_hari',
        'durasi_disetujui_hari',
        'tgl_jatuh_tempo',
        'tgl_kembali',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'tgl_pengajuan' => 'datetime',
            'tgl_pinjam' => 'date',
            'tgl_jatuh_tempo' => 'date',
            'tgl_kembali' => 'date',
        ];
    }

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }

    public function petugas(): BelongsTo
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }

    public function eksemplar(): BelongsTo
    {
        return $this->belongsTo(EksemplarBuku::class, 'eksemplar_id');
    }

    public function denda(): HasOne
    {
        return $this->hasOne(Denda::class, 'peminjaman_id');
    }

    /**
     * Prioritas durasi: durasi_disetujui_hari (keputusan petugas)
     * -> lama_pinjam_hari milik buku -> default_lama_pinjam_hari sistem.
     */
    public function durasiEfektifHari(): int
    {
        if ($this->durasi_disetujui_hari) {
            return $this->durasi_disetujui_hari;
        }

        return $this->eksemplar?->buku?->lamaPinjamEfektif()
            ?? (int) (PengaturanSistem::get('default_lama_pinjam_hari') ?? 7);
    }

    public function isTerlambat(): bool
    {
        return $this->status === 'dipinjam'
            && $this->tgl_jatuh_tempo
            && $this->tgl_jatuh_tempo->isPast();
    }
}