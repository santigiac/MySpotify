@extends('layouts.admin')

@section('titulo', 'Nueva canción — Admin MiSpoty')

@section('contenido')

    <div class="max-w-2xl mx-auto">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-black text-white">Nueva canción</h1>
            <a href="{{ route('admin.canciones.index') }}"
               class="px-5 py-2.5 rounded-full font-bold text-sm transition hover:scale-105 sp-btn-limpiar">
                ← Volver
            </a>
        </div>

        @if ($errors->any())
            <div class="rounded p-4 mb-6 sp-alerta-error">
                <ul class="list-disc list-inside text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST"
              action="{{ route('admin.canciones.guardar') }}"
              enctype="multipart/form-data"
              class="rounded-xl p-6 space-y-5 sp-tarjeta">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-white mb-1">Nombre de la canción</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       placeholder="Ej: Mala Mujer"
                       class="w-full px-4 py-3 rounded text-sm sp-campo @error('name') border-red-600 @enderror">
            </div>

            <div>
                <label class="block text-sm font-semibold text-white mb-1">Artista / Grupo</label>
                <input type="text" name="artist" value="{{ old('artist') }}"
                       placeholder="Ej: C. Tangana"
                       class="w-full px-4 py-3 rounded text-sm sp-campo @error('artist') border-red-600 @enderror">
            </div>

            <div>
                <label class="block text-sm font-semibold text-white mb-1">Duración</label>
                <input type="text" name="duration" value="{{ old('duration') }}"
                       placeholder="3:45"
                       class="w-full px-4 py-3 rounded text-sm sp-campo @error('duration') border-red-600 @enderror">
            </div>

            <div>
                <label class="block text-sm font-semibold text-white mb-1">Género</label>
                <select name="genre_id"
                        class="w-full px-4 py-3 rounded text-sm sp-select @error('genre_id') border-red-600 @enderror">
                    <option value="">— Selecciona un género —</option>
                    @foreach ($generos as $genero)
                        <option value="{{ $genero->id }}" {{ old('genre_id') == $genero->id ? 'selected' : '' }}>
                            {{ $genero->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-white mb-1">Portada del álbum</label>
                <input type="file" name="album_cover" accept=".jpg,.jpeg,.png,.webp"
                       class="w-full px-4 py-3 rounded text-sm sp-campo @error('album_cover') border-red-600 @enderror">
                <p class="text-xs sp-tenue mt-1">JPG, PNG o WebP. Máximo 2 MB.</p>
            </div>

            <div>
                <label class="block text-sm font-semibold text-white mb-1">Archivo de audio</label>
                <input type="file" name="audio_file" accept=".mp3,.wav,.ogg"
                       class="w-full px-4 py-3 rounded text-sm sp-campo @error('audio_file') border-red-600 @enderror">
                <p class="text-xs sp-tenue mt-1">MP3, WAV u OGG. Máximo 20 MB.</p>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                        class="px-6 py-3 rounded-full font-bold text-sm transition hover:scale-105 sp-btn-verde">
                    Guardar canción
                </button>
                <a href="{{ route('admin.canciones.index') }}"
                   class="px-6 py-3 rounded-full font-bold text-sm transition sp-btn-limpiar">
                    Cancelar
                </a>
            </div>

        </form>

    </div>

@endsection
