<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo', 'MiSpoty')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="sp-fondo min-h-screen flex flex-col">

    {{-- Barra de navegación --}}
    <nav class="sp-fondo-negro px-6 py-4 flex items-center justify-between sticky top-0 z-50">

        {{-- Logo y links de navegación --}}
        <div class="flex items-center gap-8">
            <a href="{{ route('canciones.index') }}" class="text-2xl font-black tracking-tight sp-verde">
                MiSpoty
            </a>
            <div class="hidden sm:flex items-center gap-6">
                <a href="{{ route('canciones.index') }}"
                   class="text-sm font-semibold transition {{ request()->routeIs('canciones.*') ? 'sp-enlace-activo' : 'sp-enlace-nav' }}">
                    Canciones
                </a>
                <a href="{{ route('listas.index') }}"
                   class="text-sm font-semibold transition {{ request()->routeIs('listas.*') ? 'sp-enlace-activo' : 'sp-enlace-nav' }}">
                    Mis listas
                </a>
            </div>
        </div>

        {{-- Usuario y cerrar sesión --}}
        <div class="flex items-center gap-4">
            <span class="text-sm sp-gris">
                Hola, <span class="text-white font-semibold">{{ Auth::user()->name }}</span>
            </span>
            <form method="POST" action="{{ route('cerrar-sesion') }}">
                @csrf
                <button type="submit"
                        class="text-sm font-semibold px-4 py-2 rounded-full transition sp-btn-borde">
                    Cerrar sesión
                </button>
            </form>
        </div>

    </nav>

    {{-- Contenido principal --}}
    <main class="flex-1 px-6 py-8">

        {{-- Mensajes flash --}}
        @if (session('exito'))
            <div class="max-w-7xl mx-auto mb-5 p-3 rounded text-sm font-semibold sp-alerta-exito">
                {{ session('exito') }}
            </div>
        @endif
        @if (session('error'))
            <div class="max-w-7xl mx-auto mb-5 p-3 rounded text-sm font-semibold sp-alerta-error">
                {{ session('error') }}
            </div>
        @endif

        @yield('contenido')
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
