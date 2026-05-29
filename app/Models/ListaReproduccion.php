<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ListaReproduccion extends Model
{
    protected $table = 'listas_reproduccion';

    protected $fillable = [
        'user_id',
        'name',
        'is_public',
    ];

    protected function casts(): array
    {
        return [
            'is_public' => 'boolean',
        ];
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }

    public function canciones(): BelongsToMany
    {
        return $this->belongsToMany(Cancion::class, 'lista_reproduccion_cancion', 'playlist_id', 'song_id');
    }
}
