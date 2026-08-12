<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class PengaturanSistem extends Model
{
    protected $table = 'pengaturan_sistem';

    protected $fillable = [
        'key',
        'value',
        'keterangan',
    ];

    public static function get(string $key, mixed $default = null): mixed
    {
        return Cache::rememberForever("pengaturan_sistem:$key", function () use ($key, $default) {
            return static::where('key', $key)->value('value') ?? $default;
        });
    }

    public static function set(string $key, string $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
        Cache::forget("pengaturan_sistem:$key");
    }
}