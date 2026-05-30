<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    public function run(): void
    {
        $generos = [
            'Trap',
            'Rap Español',
            'Urbano',
            'Flamenco Urbano',
            'Pop',
            'Reggaeton',
        ];

        foreach ($generos as $nombre) {
            Genero::create(['name' => $nombre]);
        }
    }
}
