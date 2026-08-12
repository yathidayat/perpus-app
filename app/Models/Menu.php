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
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('urutan');
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
}