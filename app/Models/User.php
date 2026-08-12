<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'role_id',
        'nama',
        'email',
        'password',
        'no_induk',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function peminjamanSebagaiSiswa(): HasMany
    {
        return $this->hasMany(Peminjaman::class, 'siswa_id');
    }

    public function peminjamanDiverifikasi(): HasMany
    {
        return $this->hasMany(Peminjaman::class, 'petugas_id');
    }

    public function notifikasi(): HasMany
    {
        return $this->hasMany(Notifikasi::class);
    }

    public function isAdmin(): bool
    {
        return $this->role?->nama_role === 'admin';
    }
}