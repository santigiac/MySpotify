@extends('layouts.cliente')

@section('titulo', $lista->name . ' — MiSpoty')

@section('contenido')

    <div class="max-w-4xl mx-auto">

        {{-- Volver --}}
        <a href="{{ route('listas.index') }}"
           class="inline-flex items-center gap-2 text-sm font-semibold mb-6 transition sp-enlace-nav">
            ← Volver a mis listas
        </a>

        {{-- Cabecera de la lista --}}
        <div class="rounded-xl p-6 mb-6 sp-tarjeta">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                <div>
                    <p class="text-xs font-semibold uppercase tracking-widest mb-1 sp-verde">
                        {{ $lista->is_public ? '🌐 Lista pública' : '🔒 Lista privada' }}
                    </p>
                    <h1 class="text-3xl font-black text-white">{{ $lista->name }}</h1>
                    <p class="text-sm mt-1 sp-gris">Por {{ $lista->usuario->name }}</p>
                </div>

                @if ($lista->user_id === Auth::id())
                    <div class="flex items-center gap-3 flex-shrink-0">
                        <a href="{{ route('listas.editar', $lista) }}"
                           class="px-4 py-2 rounded-full text-sm font-bold transition sp-btn-limpiar">
                            Editar
                        </a>
                        <form method="POST"
                              action="{{ route('listas.eliminar', $lista) }}"
                              data-confirmar="¿Eliminar la lista '{{ $lista->name }}'? Esta acción no se puede deshacer.">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-4 py-2 rounded-full text-sm font-bold sp-btn-eliminar">
                                Eliminar lista
                            </button>
                        </form>
                    </div>
                @endif

            </div>
        </div>

        {{-- Canciones --}}
        @if ($lista->canciones->isEmpty())
            <div class="rounded-xl p-12 text-center sp-tarjeta">
                <p class="sp-gris">Esta lista no tiene canciones todavía.</p>
                @if ($lista->user_id === Auth::id())
                    <a href="{{ route('canciones.index') }}"
                       class="inline-block mt-4 text-sm font-semibold underline sp-verde">
                        Explorar canciones
                    </a>
                @endif
            </div>
        @else
            <div class="space-y-3">
                @foreach ($lista->canciones as $cancion)
                    <div class="rounded-xl p-4 sp-tarjeta">

                        <div class="flex items-center gap-4">

                            {{-- Portada --}}
                            <div class="w-12 h-12 rounded flex-shrink-0 overflow-hidden sp-placeholder-img">
                                @if ($cancion->album_cover)
                                    <img src="{{ asset('storage/' . $cancion->album_cover) }}"
                                         alt="{{ $cancion->name }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                             viewBox="0 0 24 24" stroke="#535353" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2
                                                     1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2
                                                     1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            {{-- Info --}}
                            <div class="flex-1 min-w-0">
                                <p class="text-white font-semibold text-sm truncate">{{ $cancion->name }}</p>
                                <p class="text-xs sp-gris truncate">{{ $cancion->artist }}</p>
                                @if ($cancion->genero)
                                    <p class="text-xs sp-tenue">{{ $cancion->genero->name }}</p>
                                @endif
                            </div>

                            {{-- Duración --}}
                            <p class="text-xs sp-tenue flex-shrink-0 hidden sm:block">{{ $cancion->duration }}</p>

                            {{-- Quitar (solo propietario) --}}
                            @if ($lista->user_id === Auth::id())
                                <form method="POST"
                                      action="{{ route('listas.quitar-cancion', [$lista, $cancion]) }}"
                                      class="flex-shrink-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-xs font-bold px-3 py-1.5 rounded sp-btn-eliminar"
                                            title="Quitar de la lista">
                                        ✕
                                    </button>
                                </form>
                            @endif

                        </div>

                        {{-- Reproductor --}}
                        @if ($cancion->audio_file)
                            <div class="mt-3">
                                <audio controls class="w-full sp-reproductor">
                                    <source src="{{ Storage::url($cancion->audio_file) }}" type="audio/mpeg">
                                </audio>
                            </div>
                        @endif

                    </div>
                @endforeach
            </div>
        @endif

    </div>

@endsection
