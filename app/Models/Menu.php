<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    protected $fillable = [
        'parent_id',
        'nama_menu',
        'icon',
        'route',
        'urutan',
        'status'
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Menu::class, 'parent_id')
            ->where('status', 0) // Hanya yang show
            ->orderBy('urutan');
    }

    public function roleMenu(): HasMany
    {
        return $this->hasMany(RoleMenu::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_menu')
            ->withPivot(['can_view', 'can_create', 'can_edit', 'can_delete'])
            ->withTimestamps();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 0); // 0 = show
    }

    public function scopeRestricted($query)
    {
        return $query->where('status', 1); // 1 = restricted
    }

    public function scopeMainMenus($query)
    {
        return $query->whereNull('parent_id')
            ->where('status', 0)
            ->orderBy('urutan');
    }

     public function isAccessibleBy($user): bool
    {
        // Developer & Admin bisa akses semua
        if (in_array($user->role->name, ['developer', 'admin'])) {
            return true;
        }
        
        return $this->roles()
                    ->where('role_id', $user->role_id)
                    ->wherePivot('can_view', true)
                    ->exists();
    }

    public static function getUserMenus($user)
    {
        // Jika user tidak login atau tidak punya role, tetap tampilkan semua menu aktif
        if (!$user) {
            return self::with(['children' => function ($query) {
                $query->where('status', 0)->orderBy('urutan');
            }])
                ->whereNull('parent_id')
                ->where('status', 0)
                ->orderBy('urutan')
                ->get();
        }

        // Sederhana: tampilkan semua menu aktif tanpa filter role dulu
        return self::with(['children' => function ($query) {
            $query->where('status', 0)->orderBy('urutan');
        }])
            ->whereNull('parent_id')
            ->where('status', 0)
            ->orderBy('urutan')
            ->get();
    }
}