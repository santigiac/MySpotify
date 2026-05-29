<?php

namespace Database\Seeders;

use App\Models\Cancion;
use App\Models\ListaReproduccion;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class ListaReproduccionSeeder extends Seeder
{
    public function run(): void
    {
        $carlos = Usuario::where('email', 'carlos@mispoty.com')->first();
        $laura  = Usuario::where('email', 'laura@mispoty.com')->first();
        $sergio = Usuario::where('email', 'sergio@mispoty.com')->first();

        // Pública 1: Éxitos del Verano (Carlos)
        $exitosVerano = ListaReproduccion::create([
            'user_id'   => $carlos->id,
            'name'      => 'Éxitos del Verano',
            'is_public' => true,
        ]);
        $exitosVerano->canciones()->attach(
            Cancion::whereIn('name', ['Con Calma', 'Hawái', 'Con Altura', 'Dakiti', 'Danza Kuduro'])->pluck('id')
        );

        // Pública 2: Indie Vibes (Laura)
        $indieVibes = ListaReproduccion::create([
            'user_id'   => $laura->id,
            'name'      => 'Indie Vibes',
            'is_public' => true,
        ]);
        $indieVibes->canciones()->attach(
            Cancion::whereIn('name', ['Sublime', 'El Hombre Delgado', 'Corazones', 'Esta Soy Yo', 'Telefonía', 'Un Buen Lugar'])->pluck('id')
        );

        // Privada 1: Mi Trap Favorito (Carlos)
        $miTrap = ListaReproduccion::create([
            'user_id'   => $carlos->id,
            'name'      => 'Mi Trap Favorito',
            'is_public' => false,
        ]);
        $miTrap->canciones()->attach(
            Cancion::whereIn('name', ['BZRP Music Sessions #52', 'Tití Me Preguntó', 'Moscow Mule', 'La Noche de Anoche'])->pluck('id')
        );

        // Privada 2: Relajación Urbana (Sergio)
        $relajacion = ListaReproduccion::create([
            'user_id'   => $sergio->id,
            'name'      => 'Relajación Urbana',
            'is_public' => false,
        ]);
        $relajacion->canciones()->attach(
            Cancion::whereIn('name', ['Malamente', 'Bizcochito', 'Cayó La Noche', 'Antes de Morirme', 'Nunca Estoy'])->pluck('id')
        );
    }
}
