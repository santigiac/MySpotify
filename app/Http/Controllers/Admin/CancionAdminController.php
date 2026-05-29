<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cancion;
use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CancionAdminController extends Controller
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

        $canciones = $query->paginate(15);
        $generos   = Genero::all();

        return view('admin.canciones.index', compact(
            'canciones', 'generos', 'buscar', 'generosSeleccionados'
        ));
    }

    public function crear()
    {
        $generos = Genero::all();
        return view('admin.canciones.crear', compact('generos'));
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'name'        => 'required|max:150',
            'duration'    => 'required|string',
            'artist'      => 'required|max:150',
            'genre_id'    => 'required|exists:generos,id',
            'album_cover' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'audio_file'  => 'required|mimes:mp3,wav,ogg|max:20480',
        ], [
            'name.required'        => 'El nombre es obligatorio.',
            'name.max'             => 'El nombre no puede superar 150 caracteres.',
            'duration.required'    => 'La duración es obligatoria.',
            'artist.required'      => 'El artista es obligatorio.',
            'artist.max'           => 'El artista no puede superar 150 caracteres.',
            'genre_id.required'    => 'El género es obligatorio.',
            'genre_id.exists'      => 'El género seleccionado no existe.',
            'album_cover.required' => 'La portada es obligatoria.',
            'album_cover.image'    => 'La portada debe ser una imagen.',
            'album_cover.mimes'    => 'La portada debe ser jpg, jpeg, png o webp.',
            'album_cover.max'      => 'La portada no puede superar 2 MB.',
            'audio_file.required'  => 'El archivo de audio es obligatorio.',
            'audio_file.mimes'     => 'El audio debe ser mp3, wav u ogg.',
            'audio_file.max'       => 'El audio no puede superar 20 MB.',
        ]);

        $portada = $request->file('album_cover')->store('portadas', 'public');
        $audio   = $request->file('audio_file')->store('audios', 'public');

        Cancion::create([
            'name'        => $request->input('name'),
            'duration'    => $request->input('duration'),
            'artist'      => $request->input('artist'),
            'genre_id'    => $request->input('genre_id'),
            'album_cover' => $portada,
            'audio_file'  => $audio,
        ]);

        return redirect()->route('admin.canciones.index')
            ->with('exito', 'Canción creada correctamente.');
    }

    public function editar(Cancion $cancion)
    {
        $generos = Genero::all();
        return view('admin.canciones.editar', compact('cancion', 'generos'));
    }

    public function actualizar(Request $request, Cancion $cancion)
    {
        $request->validate([
            'name'        => 'required|max:150',
            'duration'    => 'required|string',
            'artist'      => 'required|max:150',
            'genre_id'    => 'required|exists:generos,id',
            'album_cover' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'audio_file'  => 'nullable|mimes:mp3,wav,ogg|max:20480',
        ], [
            'name.required'     => 'El nombre es obligatorio.',
            'name.max'          => 'El nombre no puede superar 150 caracteres.',
            'duration.required' => 'La duración es obligatoria.',
            'artist.required'   => 'El artista es obligatorio.',
            'artist.max'        => 'El artista no puede superar 150 caracteres.',
            'genre_id.required' => 'El género es obligatorio.',
            'genre_id.exists'   => 'El género seleccionado no existe.',
            'album_cover.image' => 'La portada debe ser una imagen.',
            'album_cover.mimes' => 'La portada debe ser jpg, jpeg, png o webp.',
            'album_cover.max'   => 'La portada no puede superar 2 MB.',
            'audio_file.mimes'  => 'El audio debe ser mp3, wav u ogg.',
            'audio_file.max'    => 'El audio no puede superar 20 MB.',
        ]);

        $datos = [
            'name'     => $request->input('name'),
            'duration' => $request->input('duration'),
            'artist'   => $request->input('artist'),
            'genre_id' => $request->input('genre_id'),
        ];

        if ($request->hasFile('album_cover')) {
            if ($cancion->album_cover) {
                Storage::disk('public')->delete($cancion->album_cover);
            }
            $datos['album_cover'] = $request->file('album_cover')->store('portadas', 'public');
        }

        if ($request->hasFile('audio_file')) {
            if ($cancion->audio_file) {
                Storage::disk('public')->delete($cancion->audio_file);
            }
            $datos['audio_file'] = $request->file('audio_file')->store('audios', 'public');
        }

        $cancion->update($datos);

        return redirect()->route('admin.canciones.index')
            ->with('exito', 'Canción actualizada correctamente.');
    }

    public function eliminar(Cancion $cancion)
    {
        DB::transaction(function () use ($cancion) {
            $cancion->listasReproduccion()->detach();

            if ($cancion->album_cover) {
                Storage::disk('public')->delete($cancion->album_cover);
            }
            if ($cancion->audio_file) {
                Storage::disk('public')->delete($cancion->audio_file);
            }

            $cancion->delete();
        });

        return redirect()->route('admin.canciones.index')
            ->with('exito', 'Canción eliminada correctamente.');
    }
}
