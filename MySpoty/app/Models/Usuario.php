<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'activo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
            'activo'            => 'boolean',
        ];
    }

    public function listasReproduccion(): HasMany
    {
        return $this->hasMany(ListaReproduccion::class, 'user_id');
    }

    public function canciones(): BelongsToMany
    {
        return $this->belongsToMany(Cancion::class, 'lista_reproduccion_cancion', 'playlist_id', 'song_id')
            ->join('listas_reproduccion', 'listas_reproduccion.id', '=', 'lista_reproduccion_cancion.playlist_id')
            ->where('listas_reproduccion.user_id', '=', $this->id)
            ->select('canciones.*');
    }

    public function esAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
