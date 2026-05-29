@extends('layouts.cliente')

@section('titulo', 'Canciones — MiSpoty')

@section('contenido')

    <div class="max-w-7xl mx-auto">

        {{-- Cabecera --}}
        <h1 class="text-3xl font-black text-white mb-6">Canciones</h1>

        {{-- Buscador y filtros (AJAX) --}}
        <div class="mb-8">

            <div class="mb-4">
                <input
                    type="text"
                    id="input-buscar"
                    value="{{ $buscar }}"
                    placeholder="Buscar por título o artista…"
                    class="w-full px-4 py-3 rounded text-sm sp-campo"
                >
            </div>

            {{-- Filtros de género --}}
            @if ($generos->isNotEmpty())
                <div class="flex flex-wrap gap-3" id="filtros-genero">
                    @foreach ($generos as $genero)
                        <label class="flex items-center gap-2 px-3 py-2 rounded cursor-pointer transition sp-filtro">
                            <input
                                type="checkbox"
                                name="generos[]"
                                value="{{ $genero->id }}"
                                {{ in_array($genero->id, $generosSeleccionados) ? 'checked' : '' }}
                                class="w-3 h-3 sp-checkbox-negro"
                            >
                            <span class="text-sm font-semibold">{{ $genero->name }}</span>
                        </label>
                    @endforeach
                </div>
            @endif

        </div>

        {{-- Grid de canciones (se reemplaza por AJAX) --}}
        <div id="grid-canciones"
             class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mb-8">
            @include('cliente.canciones.partials.tarjetas')
        </div>

        {{-- Paginación (solo carga inicial, no en respuestas AJAX) --}}
        <div id="paginacion">
            {{ $canciones->appends(['buscar' => $buscar, 'generos' => $generosSeleccionados])->links() }}
        </div>

    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/buscar-ajax.js') }}"></script>
@endpush
