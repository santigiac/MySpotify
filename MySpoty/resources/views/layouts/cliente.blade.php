<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo', 'MiSpoty')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body style="background-color: #121212;" class="min-h-screen flex flex-col">

    {{-- Barra de navegación --}}
    <nav style="background-color: #000000;" class="px-6 py-4 flex items-center justify-between sticky top-0 z-50">

        {{-- Logo y links de navegación --}}
        <div class="flex items-center gap-8">
            <a href="{{ route('inicio') }}" class="text-2xl font-black tracking-tight" style="color: #1DB954;">
                MiSpoty
            </a>
            <div class="hidden sm:flex items-center gap-6">
                <a href="{{ route('inicio') }}"
                   class="text-sm font-semibold transition hover:text-white
                          {{ request()->routeIs('inicio') ? 'text-white' : '' }}"
                   style="{{ request()->routeIs('inicio') ? 'color: #ffffff;' : 'color: #b3b3b3;' }}">
                    Inicio
                </a>
                <a href="{{ route('listas-reproduccion') }}"
                   class="text-sm font-semibold transition hover:text-white
                          {{ request()->routeIs('listas-reproduccion') ? 'text-white' : '' }}"
                   style="{{ request()->routeIs('listas-reproduccion') ? 'color: #ffffff;' : 'color: #b3b3b3;' }}">
                    Mis listas
                </a>
            </div>
        </div>

        {{-- Usuario y cerrar sesión --}}
        <div class="flex items-center gap-4">
            <span class="text-sm" style="color: #b3b3b3;">
                Hola, <span class="text-white font-semibold">{{ Auth::user()->name }}</span>
            </span>
            <form method="POST" action="{{ route('cerrar-sesion') }}">
                @csrf
                <button type="submit"
                        class="text-sm font-semibold px-4 py-2 rounded-full border transition hover:text-black hover:bg-white"
                        style="border-color: #535353; color: #b3b3b3;">
                    Cerrar sesión
                </button>
            </form>
        </div>

    </nav>

    {{-- Contenido principal --}}
    <main class="flex-1 px-6 py-8">
        @yield('contenido')
    </main>

</body>
</html>
