@extends('layouts.cliente')

@section('titulo', $cancion->name . ' — MiSpoty')

@section('contenido')

    <div class="max-w-3xl mx-auto">

        {{-- Volver --}}
        <a href="{{ route('canciones.index') }}"
           class="inline-flex items-center gap-2 text-sm font-semibold mb-6 transition sp-enlace-nav">
            ← Volver al catálogo
        </a>

        {{-- Ficha de la canción --}}
        <div class="rounded-xl p-6 flex flex-col sm:flex-row gap-8 sp-tarjeta">

            {{-- Portada --}}
            <div class="w-full sm:w-56 flex-shrink-0">
                <div class="w-full aspect-square rounded-lg overflow-hidden sp-placeholder-img">
                    @if ($cancion->album_cover)
                        <img src="{{ asset('storage/' . $cancion->album_cover) }}"
                             alt="Portada de {{ $cancion->name }}"
                             class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20" fill="none"
                                 viewBox="0 0 24 24" stroke="#535353" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2
                                         1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2
                                         1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                            </svg>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Datos --}}
            <div class="flex flex-col justify-center gap-3">

                <div>
                    <p class="text-xs font-semibold uppercase tracking-widest mb-1 sp-verde">Canción</p>
                    <h1 class="text-3xl font-black text-white">{{ $cancion->name }}</h1>
                </div>

                <p class="text-lg font-semibold sp-gris">{{ $cancion->artist }}</p>

                @if ($cancion->genero)
                    <span class="inline-block px-3 py-1 rounded-full text-xs font-bold w-fit sp-badge-genero">
                        {{ $cancion->genero->name }}
                    </span>
                @endif

                <p class="text-sm sp-tenue">
                    Duración:
                    <span class="text-white font-semibold">{{ $cancion->duration }}</span>
                </p>

            </div>
        </div>

        {{-- Reproductor --}}
        <div class="mt-6 rounded-xl p-6 sp-tarjeta">
            <p class="text-xs font-semibold uppercase tracking-widest mb-4 sp-tenue">Reproductor</p>
            @if ($cancion->audio_file)
                <audio controls class="w-full sp-reproductor">
                    <source src="{{ Storage::url($cancion->audio_file) }}" type="audio/mpeg">
                    Tu navegador no soporta el reproductor de audio.
                </audio>
            @else
                <p class="text-sm sp-gris">Audio no disponible.</p>
            @endif
        </div>

    </div>

@endsection
