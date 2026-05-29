<?php

namespace App\Http\Controllers;

use App\Models\Cancion;
use App\Models\Genero;
use App\Models\ListaReproduccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CancionController extends Controller
{
    public function index(Request $request)
    {
        $buscar               = $request->input('buscar', '');
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

    public function buscar(Request $request)
    {
        $buscar               = $request->input('buscar', '');
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

        $canciones = $query->take(50)->get();

        return view('cliente.canciones.partials.tarjetas', compact('canciones'));
    }

    public function mostrar(Cancion $cancion)
    {
        $cancion->load('genero');

        $misListas = ListaReproduccion::where('user_id', Auth::id())
            ->orderBy('name')
            ->get();

        return view('cliente.canciones.show', compact('cancion', 'misListas'));
    }
}
