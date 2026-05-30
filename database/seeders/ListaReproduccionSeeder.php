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

        // Pública 1: Trap Argento (Carlos)
        $trapArgento = ListaReproduccion::create([
            'user_id'   => $carlos->id,
            'name'      => 'Trap Argento',
            'is_public' => true,
        ]);
        $trapArgento->canciones()->attach(
            Cancion::whereIn('name', ['Me Perdí', 'Goteo', '2:50', 'Plan A', 'BLESS', 'Cristal', 'Givenchy'])->pluck('id')
        );

        // Pública 2: Urbano España (Laura)
        $urbanoEsp = ListaReproduccion::create([
            'user_id'   => $laura->id,
            'name'      => 'Urbano España',
            'is_public' => true,
        ]);
        $urbanoEsp->canciones()->attach(
            Cancion::whereIn('name', ['Cayó La Noche', 'Se Acabó', 'Mala Mujer', 'Antes de Morirme', 'Nunca Estoy', 'Bien Guay'])->pluck('id')
        );

        // Pública 3: Flamenco y Rumba (Laura)
        $flamencoPop = ListaReproduccion::create([
            'user_id'   => $laura->id,
            'name'      => 'Flamenco y Rumba',
            'is_public' => true,
        ]);
        $flamencoPop->canciones()->attach(
            Cancion::whereIn('name', ['Pienso en Ti', 'La Tribu', 'Rumba de mi Barrio', 'El Baile', 'Malamente', 'Con Altura'])->pluck('id')
        );

        // Privada 1: Rap de Barrio (Sergio)
        $rapBarrio = ListaReproduccion::create([
            'user_id'   => $sergio->id,
            'name'      => 'Rap de Barrio',
            'is_public' => false,
        ]);
        $rapBarrio->canciones()->attach(
            Cancion::whereIn('name', ['Noche de Verano', 'Sin Dinero', 'Llevo', 'Raíces', 'Solo', 'Falso Profeta', 'Cicatrices'])->pluck('id')
        );

        // Privada 2: Mix Total (Carlos)
        $mixTotal = ListaReproduccion::create([
            'user_id'   => $carlos->id,
            'name'      => 'Mix Total',
            'is_public' => false,
        ]);
        $mixTotal->canciones()->attach(
            Cancion::whereIn('name', ['Toca', 'Zorra', 'BZRP Music Sessions #52', 'Dakiti', 'Columbia', 'Gasolina'])->pluck('id')
        );
    }
}
