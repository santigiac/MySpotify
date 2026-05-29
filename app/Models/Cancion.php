<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cancion extends Model
{
    protected $table = 'canciones';

    protected $fillable = [
        'name',
        'duration',
        'artist',
        'genre_id',
        'album_cover',
        'audio_file',
    ];

    public function genero(): BelongsTo
    {
        return $this->belongsTo(Genero::class, 'genre_id');
    }

    public function listasReproduccion(): BelongsToMany
    {
        return $this->belongsToMany(ListaReproduccion::class, 'lista_reproduccion_cancion', 'song_id', 'playlist_id');
    }
}
