@extends('layouts.admin')

@section('titulo', 'Usuarios — Admin MiSpoty')

@section('contenido')

    <div class="max-w-7xl mx-auto">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-3xl font-black text-white">Gestión de usuarios</h1>
                <p class="text-sm sp-gris mt-1">
                    {{ $usuarios->total() }} {{ $usuarios->total() === 1 ? 'usuario registrado' : 'usuarios registrados' }}
                </p>
            </div>
        </div>

        {{-- Búsqueda --}}
        <form method="GET" action="{{ route('admin.usuarios.index') }}" class="mb-6">
            <div class="flex flex-col sm:flex-row gap-3">
                <input
                    type="text"
                    name="buscar"
                    value="{{ $buscar }}"
                    placeholder="Buscar por nombre o email…"
                    class="flex-1 px-4 py-3 rounded text-sm sp-campo"
                >
                <button type="submit"
                        class="px-6 py-3 rounded-full font-bold text-sm transition hover:scale-105 sp-btn-verde">
                    Buscar
                </button>
                @if ($buscar !== '')
                    <a href="{{ route('admin.usuarios.index') }}"
                       class="px-6 py-3 rounded-full text-sm font-semibold text-center transition sp-btn-limpiar">
                        Limpiar
                    </a>
                @endif
            </div>
        </form>

        {{-- Tabla --}}
        @if ($usuarios->isEmpty())
            <div class="rounded-xl p-12 text-center sp-tarjeta">
                <p class="sp-gris">No se encontraron usuarios.</p>
            </div>
        @else
            <div class="rounded-xl overflow-hidden sp-tarjeta mb-6">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="sp-tabla-cabecera">
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Nombre</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Email</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Registrado el</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Estado</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr class="sp-tabla-fila">

                                <td class="px-4 py-3 text-white font-semibold">{{ $usuario->name }}</td>
                                <td class="px-4 py-3 sp-gris">{{ $usuario->email }}</td>
                                <td class="px-4 py-3 sp-tenue">{{ $usuario->created_at->format('d/m/Y') }}</td>

                                <td class="px-4 py-3">
                                    @if ($usuario->activo)
                                        <span class="px-2 py-1 rounded text-xs font-bold sp-badge-activo">Activo</span>
                                    @else
                                        <span class="px-2 py-1 rounded text-xs font-bold sp-badge-inactivo">Deshabilitado</span>
                                    @endif
                                </td>

                                <td class="px-4 py-3">
                                    <form method="POST"
                                          action="{{ route('admin.usuarios.toggle', $usuario) }}"
                                          data-confirmar="{{ $usuario->activo ? '¿Deshabilitar a ' . $usuario->name . '?' : '¿Habilitar a ' . $usuario->name . '?' }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                                class="px-3 py-1.5 rounded text-xs font-bold {{ $usuario->activo ? 'sp-btn-eliminar' : 'sp-btn-verde' }}">
                                            {{ $usuario->activo ? 'Deshabilitar' : 'Habilitar' }}
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Paginación --}}
            {{ $usuarios->appends(['buscar' => $buscar])->links() }}
        @endif

    </div>

@endsection
