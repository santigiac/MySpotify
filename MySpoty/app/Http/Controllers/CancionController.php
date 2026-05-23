<?php

namespace App\Http\Controllers;

use App\Models\Cancion;
use App\Models\Genero;
use Illuminate\Http\Request;

class CancionController extends Controller
{
    public function index(Request $request)
    {
        $buscar              = $request->input('buscar', '');
        $generosSeleccionados = array_map('intval', $request->input('generos', []));

        $query = Cancion::with('genero');

        if ($buscar !== '') {
            $query->where(function ($q) use ($buscar) {
                $q->where('name', 'LIKE', '%' . $buscar . '%')
                  ->orWhere('artist', 'LIKE', '%' . $buscar . '%');
            });
        }

        if (!empty($generosSeleccionados)) {
            $query->whereIn('genre_id', $generosSeleccionados);
        }

        $canciones = $query->paginate(12);
        $generos   = Genero::all();

        return view('cliente.canciones.index', compact(
            'canciones',
            'generos',
            'buscar',
            'generosSeleccionados'
        ));
    }

    public function mostrar(Cancion $cancion)
    {
        $cancion->load('genero');

        return view('cliente.canciones.show', compact('cancion'));
    }
}
