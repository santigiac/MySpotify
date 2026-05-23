@extends('layouts.cliente')

@section('titulo', 'Canciones — MiSpoty')

@section('contenido')

    <div class="max-w-7xl mx-auto">

        {{-- Cabecera --}}
        <h1 class="text-3xl font-black text-white mb-6">Canciones</h1>

        {{-- Formulario de búsqueda y filtros --}}
        <form method="GET" action="{{ route('canciones.index') }}" class="mb-8">

            <div class="flex flex-col sm:flex-row gap-3 mb-4">
                {{-- Barra de búsqueda --}}
                <input
                    type="text"
                    name="buscar"
                    value="{{ $buscar }}"
                    placeholder="Buscar por título o artista…"
                    class="flex-1 px-4 py-3 rounded text-sm sp-campo"
                >
                <button type="submit"
                        class="px-6 py-3 rounded-full font-bold text-sm transition hover:scale-105 sp-btn-verde">
                    Buscar
                </button>
                @if ($buscar !== '' || !empty($generosSeleccionados))
                    <a href="{{ route('canciones.index') }}"
                       class="px-6 py-3 rounded-full text-sm font-semibold text-center transition sp-btn-limpiar">
                        Limpiar
                    </a>
                @endif
            </div>

            {{-- Filtros de género --}}
            @if ($generos->isNotEmpty())
                <div class="flex flex-wrap gap-3">
                    @foreach ($generos as $genero)
                        <label class="flex items-center gap-2 px-3 py-2 rounded transition
                                      {{ in_array($genero->id, $generosSeleccionados) ? 'sp-filtro-activo' : 'sp-filtro' }}">
                            <input
                                type="checkbox"
                                name="generos[]"
                                value="{{ $genero->id }}"
                                {{ in_array($genero->id, $generosSeleccionados) ? 'checked' : '' }}
                                class="w-3 h-3 auto-submit sp-checkbox-negro"
                            >
                            <span class="text-sm font-semibold">{{ $genero->name }}</span>
                        </label>
                    @endforeach
                </div>
            @endif

        </form>

        {{-- Resultado --}}
        @if ($canciones->isEmpty())
            <div class="text-center py-20">
                <p class="text-lg font-semibold sp-gris">No se encontraron canciones.</p>
                <a href="{{ route('canciones.index') }}" class="mt-4 inline-block text-sm underline sp-verde">
                    Ver todas las canciones
                </a>
            </div>
        @else

            {{-- Grid de canciones --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mb-8">
                @foreach ($canciones as $cancion)
                    <a href="{{ route('canciones.mostrar', $cancion) }}"
                       class="block rounded-lg p-4 transition hover:scale-105 sp-tarjeta">

                        {{-- Portada --}}
                        <div class="w-full aspect-square rounded mb-4 overflow-hidden sp-placeholder-img">
                            @if ($cancion->album_cover)
                                <img src="{{ asset('storage/' . $cancion->album_cover) }}"
                                     alt="Portada de {{ $cancion->name }}"
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16" fill="none"
                                         viewBox="0 0 24 24" stroke="#535353" stroke-width="1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2
                                                 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2
                                                 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        {{-- Info --}}
                        <p class="text-white text-sm font-bold truncate">{{ $cancion->name }}</p>
                        <p class="text-sm truncate mt-1 sp-gris">{{ $cancion->artist }}</p>
                        @if ($cancion->genero)
                            <p class="text-xs mt-1 sp-tenue">{{ $cancion->genero->name }}</p>
                        @endif

                    </a>
                @endforeach
            </div>

            {{-- Paginación --}}
            {{ $canciones->appends(['buscar' => $buscar, 'generos' => $generosSeleccionados])->links() }}

        @endif

    </div>

@endsection
