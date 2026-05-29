<?php

namespace App\Http\Controllers;

use App\Models\Cancion;
use App\Models\ListaReproduccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ListaReproduccionController extends Controller
{
    public function index()
    {
        $misListas = ListaReproduccion::where('user_id', Auth::id())
            ->withCount('canciones')
            ->orderBy('name')
            ->get();

        $listasPublicas = ListaReproduccion::where('is_public', true)
            ->where('user_id', '!=', Auth::id())
            ->with('usuario')
            ->withCount('canciones')
            ->orderBy('name')
            ->get();

        return view('cliente.listas.index', compact('misListas', 'listasPublicas'));
    }

    public function crear()
    {
        return view('cliente.listas.crear');
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'name'      => 'required|max:150',
            'is_public' => 'nullable|boolean',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.max'      => 'El nombre no puede superar 150 caracteres.',
        ]);

        ListaReproduccion::create([
            'user_id'   => Auth::id(),
            'name'      => $request->input('name'),
            'is_public' => $request->boolean('is_public'),
        ]);

        return redirect()->route('listas.index')
            ->with('exito', 'Lista creada correctamente.');
    }

    public function mostrar(ListaReproduccion $lista)
    {
        $lista->load(['canciones.genero', 'usuario']);
        return view('cliente.listas.show', compact('lista'));
    }

    public function editar(ListaReproduccion $lista)
    {
        if ($lista->user_id !== Auth::id()) {
            abort(403);
        }
        return view('cliente.listas.editar', compact('lista'));
    }

    public function actualizar(Request $request, ListaReproduccion $lista)
    {
        if ($lista->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'name'      => 'required|max:150',
            'is_public' => 'nullable|boolean',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.max'      => 'El nombre no puede superar 150 caracteres.',
        ]);

        $lista->update([
            'name'      => $request->input('name'),
            'is_public' => $request->boolean('is_public'),
        ]);

        return redirect()->route('listas.mostrar', $lista)
            ->with('exito', 'Lista actualizada correctamente.');
    }

    public function eliminar(ListaReproduccion $lista)
    {
        if ($lista->user_id !== Auth::id()) {
            abort(403);
        }

        DB::transaction(function () use ($lista) {
            $lista->canciones()->detach();
            $lista->delete();
        });

        return redirect()->route('listas.index')
            ->with('exito', 'Lista eliminada correctamente.');
    }

    public function agregarCancion(Request $request, ListaReproduccion $lista)
    {
        if ($lista->user_id !== Auth::id()) {
            abort(403);
        }

        $cancionId = $request->input('cancion_id');
        $resultado = $lista->canciones()->syncWithoutDetaching([$cancionId]);

        if (empty($resultado['attached'])) {
            return back()->with('error', 'La canción ya estaba en la lista.');
        }

        return back()->with('exito', 'Canción añadida a la lista.');
    }

    public function quitarCancion(ListaReproduccion $lista, Cancion $cancion)
    {
        if ($lista->user_id !== Auth::id()) {
            abort(403);
        }

        $lista->canciones()->detach($cancion->id);

        return back()->with('exito', 'Canción eliminada de la lista.');
    }
}
