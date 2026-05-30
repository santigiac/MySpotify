@extends('layouts.cliente')

@section('titulo', 'Mis listas — MiSpoty')

@section('contenido')

    <div class="max-w-7xl mx-auto">

        {{-- MIS LISTAS --}}
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-black text-white">Mis listas</h1>
            <a href="{{ route('listas.crear') }}"
               class="px-5 py-2.5 rounded-full font-bold text-sm transition hover:scale-105 sp-btn-verde">
                + Nueva lista
            </a>
        </div>

        @if ($misListas->isEmpty())
            <div class="rounded-xl p-10 text-center mb-10 sp-tarjeta">
                <p class="sp-gris mb-3">Aún no has creado ninguna lista.</p>
                <a href="{{ route('listas.crear') }}" class="text-sm font-semibold sp-verde underline">
                    Crea tu primera lista
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mb-12">
                @foreach ($misListas as $lista)
                    <div class="rounded-xl p-5 flex flex-col gap-3 sp-tarjeta">

                        {{-- Nombre y visibilidad --}}
                        <div>
                            <h2 class="text-white font-bold text-base truncate">{{ $lista->name }}</h2>
                            <p class="text-xs mt-1 sp-tenue">
                                {{ $lista->is_public ? '🌐 Pública' : '🔒 Privada' }}
                                &middot;
                                {{ $lista->canciones_count }} {{ $lista->canciones_count === 1 ? 'canción' : 'canciones' }}
                            </p>
                        </div>

                        {{-- Acciones --}}
                        <div class="flex items-center gap-2 mt-auto pt-2">
                            <a href="{{ route('listas.mostrar', $lista) }}"
                               class="flex-1 text-center px-3 py-1.5 rounded text-xs font-bold sp-btn-verde">
                                Ver
                            </a>
                            <a href="{{ route('listas.editar', $lista) }}"
                               class="flex-1 text-center px-3 py-1.5 rounded text-xs font-bold sp-btn-limpiar">
                                Editar
                            </a>
                            <form method="POST"
                                  action="{{ route('listas.eliminar', $lista) }}"
                                  data-confirmar="¿Eliminar la lista '{{ $lista->name }}'?">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1.5 rounded text-xs font-bold sp-btn-eliminar">
                                    ✕
                                </button>
                            </form>
                        </div>

                    </div>
                @endforeach
            </div>
        @endif

        {{-- LISTAS PÚBLICAS --}}
        <h2 class="text-2xl font-black text-white mb-5">Listas públicas</h2>

        @if ($listasPublicas->isEmpty())
            <div class="rounded-xl p-10 text-center sp-tarjeta">
                <p class="sp-gris">No hay listas públicas disponibles.</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                @foreach ($listasPublicas as $lista)
                    <div class="rounded-xl p-5 flex flex-col gap-3 sp-tarjeta">

                        <div>
                            <h3 class="text-white font-bold text-base truncate">{{ $lista->name }}</h3>
                            <p class="text-xs mt-1 sp-gris">Por {{ $lista->usuario->name }}</p>
                            <p class="text-xs mt-0.5 sp-tenue">
                                🌐 Pública &middot;
                                {{ $lista->canciones_count }} {{ $lista->canciones_count === 1 ? 'canción' : 'canciones' }}
                            </p>
                        </div>

                        <div class="mt-auto pt-2">
                            <a href="{{ route('listas.mostrar', $lista) }}"
                               class="block text-center px-3 py-1.5 rounded text-xs font-bold sp-btn-verde">
                                Ver
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>
        @endif

    </div>

@endsection
