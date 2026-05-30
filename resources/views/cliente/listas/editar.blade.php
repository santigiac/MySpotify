@extends('layouts.cliente')

@section('titulo', 'Editar lista — MiSpoty')

@section('contenido')

    <div class="max-w-lg mx-auto">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-black text-white">Editar lista</h1>
            <a href="{{ route('listas.mostrar', $lista) }}"
               class="px-5 py-2.5 rounded-full font-bold text-sm transition sp-btn-limpiar">
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

        <form method="POST" action="{{ route('listas.actualizar', $lista) }}"
              class="rounded-xl p-6 space-y-5 sp-tarjeta">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-white mb-1">Nombre de la lista</label>
                <input type="text"
                       name="name"
                       value="{{ old('name', $lista->name) }}"
                       placeholder="Ej: Mis favoritos"
                       class="w-full px-4 py-3 rounded text-sm sp-campo @error('name') border-red-600 @enderror">
            </div>

            <div>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox"
                           name="is_public"
                           value="1"
                           {{ old('is_public', $lista->is_public) ? 'checked' : '' }}
                           class="w-4 h-4 sp-checkbox">
                    <span class="text-sm font-semibold text-white">Lista pública</span>
                </label>
                <p class="text-xs sp-tenue mt-1 ml-7">Otros usuarios podrán ver esta lista.</p>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                        class="px-6 py-3 rounded-full font-bold text-sm transition hover:scale-105 sp-btn-verde">
                    Guardar cambios
                </button>
                <a href="{{ route('listas.mostrar', $lista) }}"
                   class="px-6 py-3 rounded-full font-bold text-sm transition sp-btn-limpiar">
                    Cancelar
                </a>
            </div>

        </form>

    </div>

@endsection
