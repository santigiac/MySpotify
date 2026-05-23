<?php

namespace Database\Seeders;

use App\Models\Cancion;
use App\Models\Genero;
use Illuminate\Database\Seeder;

class CancionSeeder extends Seeder
{
    public function run(): void
    {
        $trap      = Genero::where('name', 'Trap')->first()->id;
        $indie     = Genero::where('name', 'Indie')->first()->id;
        $urbano    = Genero::where('name', 'Urbano')->first()->id;
        $pop       = Genero::where('name', 'Pop')->first()->id;
        $reggaeton = Genero::where('name', 'Reggaeton')->first()->id;

        $canciones = [
            // Trap
            ['name' => 'BZRP Music Sessions #52', 'duration' => '3:14', 'artist' => 'Bizarrap ft. Quevedo',         'genre_id' => $trap],
            ['name' => 'Dakiti',                  'duration' => '3:37', 'artist' => 'Bad Bunny ft. Jhay Cortez',   'genre_id' => $trap],
            ['name' => 'La Noche de Anoche',       'duration' => '3:26', 'artist' => 'Bad Bunny ft. ROSALÍA',       'genre_id' => $trap],
            ['name' => 'Tití Me Preguntó',         'duration' => '4:03', 'artist' => 'Bad Bunny',                   'genre_id' => $trap],
            ['name' => 'Moscow Mule',              'duration' => '3:46', 'artist' => 'Bad Bunny',                   'genre_id' => $trap],

            // Indie
            ['name' => 'Sublime',                 'duration' => '4:22', 'artist' => 'Vetusta Morla',               'genre_id' => $indie],
            ['name' => 'El Hombre Delgado',        'duration' => '4:15', 'artist' => 'Vetusta Morla',               'genre_id' => $indie],
            ['name' => 'Corazones',               'duration' => '3:52', 'artist' => 'Izal',                        'genre_id' => $indie],
            ['name' => 'Esta Soy Yo',             'duration' => '3:38', 'artist' => 'Izal',                        'genre_id' => $indie],
            ['name' => 'Un Buen Lugar',           'duration' => '3:45', 'artist' => 'Jorge Drexler',               'genre_id' => $indie],
            ['name' => 'Telefonía',               'duration' => '3:56', 'artist' => 'Supersubmarina',              'genre_id' => $indie],

            // Urbano
            ['name' => 'Con Altura',              'duration' => '2:57', 'artist' => 'ROSALÍA ft. J Balvin',        'genre_id' => $urbano],
            ['name' => 'Malamente',               'duration' => '3:09', 'artist' => 'ROSALÍA',                     'genre_id' => $urbano],
            ['name' => 'Bizcochito',              'duration' => '2:24', 'artist' => 'ROSALÍA',                     'genre_id' => $urbano],
            ['name' => 'Cayó La Noche',           'duration' => '3:31', 'artist' => 'Cruz Cafuné',                 'genre_id' => $urbano],
            ['name' => 'Antes de Morirme',        'duration' => '3:54', 'artist' => 'C. Tangana ft. ROSALÍA',     'genre_id' => $urbano],
            ['name' => 'Nunca Estoy',             'duration' => '3:22', 'artist' => 'C. Tangana ft. Corina Smith', 'genre_id' => $urbano],

            // Pop
            ['name' => 'Hawái',                   'duration' => '3:10', 'artist' => 'Maluma',                      'genre_id' => $pop],
            ['name' => 'Blinding Lights',         'duration' => '3:20', 'artist' => 'The Weeknd',                  'genre_id' => $pop],
            ['name' => 'Lover',                   'duration' => '3:41', 'artist' => 'Taylor Swift',                'genre_id' => $pop],

            // Reggaeton
            ['name' => 'Con Calma',               'duration' => '3:17', 'artist' => 'Daddy Yankee ft. Snow',       'genre_id' => $reggaeton],
            ['name' => 'Gasolina',                'duration' => '3:39', 'artist' => 'Daddy Yankee',                'genre_id' => $reggaeton],
            ['name' => 'Danza Kuduro',            'duration' => '3:43', 'artist' => 'Don Omar ft. Lucenzo',        'genre_id' => $reggaeton],
        ];

        foreach ($canciones as $cancion) {
            Cancion::create($cancion);
        }
    }
}
