<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    protected $fillable = [
        'nama_role',
        'deskripsi',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function roleMenu(): HasMany
    {
        return $this->hasMany(RoleMenu::class);
    }

    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(Menu::class, 'role_menu')
            ->withPivot(['can_view', 'can_create', 'can_edit', 'can_delete'])
            ->withTimestamps();
    }
}