<?php

namespace Database\Seeders;

use App\Models\Cancion;
use App\Models\Genero;
use Illuminate\Database\Seeder;

class CancionSeeder extends Seeder
{
    public function run(): void
    {
        $trap     = Genero::where('name', 'Trap')->first()->id;
        $rap      = Genero::where('name', 'Rap Español')->first()->id;
        $urbano   = Genero::where('name', 'Urbano')->first()->id;
        $flamenco = Genero::where('name', 'Flamenco Urbano')->first()->id;
        $pop      = Genero::where('name', 'Pop')->first()->id;
        $reggae   = Genero::where('name', 'Reggaeton')->first()->id;

        $duki        = 'portadas/Duki.webp';
        $ysya        = 'portadas/YSYA.png';
        $hoke        = 'portadas/Hoke.webp';
        $delaossa    = 'portadas/Delaossa.png';
        $cafune      = 'portadas/Cruz Cafune.jpg';
        $ctangana    = 'portadas/Ctangana.jpg';
        $grecas      = 'portadas/Grecas.webp';
        $rosalia     = 'portadas/Rosalia.jpg';
        $quevedo     = 'portadas/Quevedo.webp';
        $badgyal     = 'portadas/BadGyal.jpg';
        $daddyyankee = 'portadas/Daddy Yankee.jpg';
        $donomar     = 'portadas/Don Omar.webp';
        $badbunny    = 'portadas/Bad Bunny.jpg';

        $canciones = [

            // ── Trap (Duki & YSY A) ──────────────────────────────────
            ['name' => 'Sol y Luna',         'duration' => '3:12', 'artist' => 'Duki',              'genre_id' => $trap, 'album_cover' => $duki],
            ['name' => 'Goteo',              'duration' => '3:45', 'artist' => 'Duki',              'genre_id' => $trap, 'album_cover' => $duki],
            ['name' => '2:50',               'duration' => '2:50', 'artist' => 'Duki',              'genre_id' => $trap, 'album_cover' => $duki],
            ['name' => 'Malbec',             'duration' => '3:28', 'artist' => 'Duki ft. Bizarrap', 'genre_id' => $trap, 'album_cover' => $duki],
            ['name' => 'Apunta de Espada',   'duration' => '3:33', 'artist' => 'Duki ft. YSY A',   'genre_id' => $trap, 'album_cover' => $duki],
            ['name' => 'Givenchy',           'duration' => '3:14', 'artist' => 'Duki',              'genre_id' => $trap, 'album_cover' => $duki],
            ['name' => 'Full Ice',           'duration' => '3:22', 'artist' => 'YSY A',             'genre_id' => $trap, 'album_cover' => $ysya],
            ['name' => 'Amanecer',           'duration' => '3:41', 'artist' => 'YSY A',             'genre_id' => $trap, 'album_cover' => $ysya],
            ['name' => 'Un Piso Mas',        'duration' => '3:15', 'artist' => 'YSY A',             'genre_id' => $trap, 'album_cover' => $ysya],

            // ── Rap Español (Hoke & Delaossa) ────────────────────────
            ['name' => 'BBO',                'duration' => '3:22', 'artist' => 'Hoke',              'genre_id' => $rap, 'album_cover' => $hoke],
            ['name' => 'Tres Creus',         'duration' => '3:48', 'artist' => 'Hoke',              'genre_id' => $rap, 'album_cover' => $hoke],
            ['name' => 'Five O',             'duration' => '3:30', 'artist' => 'Hoke',              'genre_id' => $rap, 'album_cover' => $hoke],
            ['name' => 'Infrarojo',          'duration' => '4:05', 'artist' => 'Hoke',              'genre_id' => $rap, 'album_cover' => $hoke],
            ['name' => 'Still Luving',       'duration' => '3:35', 'artist' => 'Delaossa',          'genre_id' => $rap, 'album_cover' => $delaossa],
            ['name' => 'Veneno',             'duration' => '4:12', 'artist' => 'Delaossa',          'genre_id' => $rap, 'album_cover' => $delaossa],
            ['name' => 'La Placita',         'duration' => '3:58', 'artist' => 'Delaossa',          'genre_id' => $rap, 'album_cover' => $delaossa],

            // ── Urbano (Cruz Cafuné & C. Tangana) ───────────────────
            ['name' => 'Cayó La Noche',      'duration' => '3:31', 'artist' => 'Cruz Cafuné',                   'genre_id' => $urbano, 'album_cover' => $cafune],
            ['name' => 'Muchoperro',         'duration' => '3:20', 'artist' => 'Cruz Cafuné',                   'genre_id' => $urbano, 'album_cover' => $cafune],
            ['name' => 'Movezz',             'duration' => '3:45', 'artist' => 'Cruz Cafuné',                   'genre_id' => $urbano, 'album_cover' => $cafune],
            ['name' => 'Cangrinaje',         'duration' => '3:12', 'artist' => 'Cruz Cafuné',                   'genre_id' => $urbano, 'album_cover' => $cafune],
            ['name' => 'Mala Mujer',         'duration' => '3:15', 'artist' => 'C. Tangana',                    'genre_id' => $urbano, 'album_cover' => $ctangana],
            ['name' => 'Antes de Morirme',   'duration' => '3:54', 'artist' => 'C. Tangana ft. ROSALÍA',        'genre_id' => $urbano, 'album_cover' => $ctangana],
            ['name' => 'Nunca Estoy',        'duration' => '3:22', 'artist' => 'C. Tangana ft. Corina Smith',   'genre_id' => $urbano, 'album_cover' => $ctangana],
            ['name' => 'Bien Duro',          'duration' => '3:42', 'artist' => 'C. Tangana',                    'genre_id' => $urbano, 'album_cover' => $ctangana],

            // ── Flamenco Urbano (Grecas & ROSALÍA) ──────────────────
            ['name' => 'Pienso en Ti',       'duration' => '3:15', 'artist' => 'Grecas',                'genre_id' => $flamenco, 'album_cover' => $grecas],
            ['name' => 'La Tribu',           'duration' => '3:42', 'artist' => 'Grecas',                'genre_id' => $flamenco, 'album_cover' => $grecas],
            ['name' => 'Rumba de mi Barrio', 'duration' => '3:28', 'artist' => 'Grecas',                'genre_id' => $flamenco, 'album_cover' => $grecas],
            ['name' => 'El Baile',           'duration' => '3:55', 'artist' => 'Grecas',                'genre_id' => $flamenco, 'album_cover' => $grecas],
            ['name' => 'Malamente',          'duration' => '3:09', 'artist' => 'ROSALÍA',               'genre_id' => $flamenco, 'album_cover' => $rosalia],
            ['name' => 'Con Altura',         'duration' => '2:57', 'artist' => 'ROSALÍA ft. J Balvin',  'genre_id' => $flamenco, 'album_cover' => $rosalia],
            ['name' => 'Bizcochito',         'duration' => '2:24', 'artist' => 'ROSALÍA',               'genre_id' => $flamenco, 'album_cover' => $rosalia],

            // ── Pop (Quevedo & Bad Gyal) ─────────────────────────────
            ['name' => 'Ahora',                  'duration' => '3:10', 'artist' => 'Quevedo',               'genre_id' => $pop, 'album_cover' => $quevedo],
            ['name' => 'Columbia',               'duration' => '3:45', 'artist' => 'Quevedo',               'genre_id' => $pop, 'album_cover' => $quevedo],
            ['name' => 'Tuyo y Mío',             'duration' => '3:22', 'artist' => 'Quevedo',               'genre_id' => $pop, 'album_cover' => $quevedo],
            ['name' => 'BZRP Music Sessions #52','duration' => '3:14', 'artist' => 'Bizarrap ft. Quevedo',  'genre_id' => $pop, 'album_cover' => $quevedo],
            ['name' => 'Zorra',                  'duration' => '2:48', 'artist' => 'Bad Gyal',              'genre_id' => $pop, 'album_cover' => $badgyal],
            ['name' => 'Prefiero',               'duration' => '3:15', 'artist' => 'Bad Gyal',              'genre_id' => $pop, 'album_cover' => $badgyal],
            ['name' => 'Blin Blin',              'duration' => '3:33', 'artist' => 'Bad Gyal ft. J Balvin', 'genre_id' => $pop, 'album_cover' => $badgyal],

            // ── Reggaeton ────────────────────────────────────────────
            ['name' => 'Gasolina',          'duration' => '3:39', 'artist' => 'Daddy Yankee',              'genre_id' => $reggae, 'album_cover' => $daddyyankee],
            ['name' => 'Con Calma',         'duration' => '3:17', 'artist' => 'Daddy Yankee ft. Snow',     'genre_id' => $reggae, 'album_cover' => $daddyyankee],
            ['name' => 'Danza Kuduro',      'duration' => '3:43', 'artist' => 'Don Omar ft. Lucenzo',      'genre_id' => $reggae, 'album_cover' => $donomar],
            ['name' => 'Dakiti',            'duration' => '3:37', 'artist' => 'Bad Bunny ft. Jhay Cortez', 'genre_id' => $reggae, 'album_cover' => $badbunny],
            ['name' => 'Tití Me Preguntó',  'duration' => '4:03', 'artist' => 'Bad Bunny',                 'genre_id' => $reggae, 'album_cover' => $badbunny],
        ];

        foreach ($canciones as $cancion) {
            Cancion::create($cancion);
        }
    }
}
