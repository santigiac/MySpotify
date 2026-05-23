<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar sesión — MiSpoty</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body style="background-color: #121212;" class="min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-sm rounded-xl p-8" style="background-color: #282828;">

        {{-- Logo --}}
        <div class="text-center mb-8">
            <a href="{{ route('bienvenida') }}" class="text-4xl font-black tracking-tight" style="color: #1DB954;">
                MiSpoty
            </a>
            <h2 class="text-white text-xl font-bold mt-4">Inicia sesión</h2>
        </div>

        {{-- Errores del servidor --}}
        @if ($errors->any())
            <div class="mb-4 p-3 rounded text-sm" style="background-color: #3e0000; color: #ff6b6b;">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form id="form-login" method="POST" action="{{ route('login.entrar') }}"
              onsubmit="validarLogin(event)" class="space-y-4">
            @csrf

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-semibold mb-1" style="color: #b3b3b3;">
                    Correo electrónico
                </label>
                <input
                    type="text"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    autofocus
                    autocomplete="email"
                    class="w-full px-4 py-3 rounded text-white text-sm outline-none transition"
                    style="background-color: #3e3e3e; border: 1px solid #535353;"
                    onfocus="this.style.borderColor='#1DB954'"
                    onblur="this.style.borderColor='#535353'"
                >
                <span id="error-email" class="error-js text-xs mt-1"
                      style="color: #ff6b6b; display: none;"></span>
            </div>

            {{-- Contraseña --}}
            <div>
                <label for="password" class="block text-sm font-semibold mb-1" style="color: #b3b3b3;">
                    Contraseña
                </label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    autocomplete="current-password"
                    class="w-full px-4 py-3 rounded text-white text-sm outline-none transition"
                    style="background-color: #3e3e3e; border: 1px solid #535353;"
                    onfocus="this.style.borderColor='#1DB954'"
                    onblur="this.style.borderColor='#535353'"
                >
                <span id="error-password" class="error-js text-xs mt-1"
                      style="color: #ff6b6b; display: none;"></span>
            </div>

            {{-- Recuérdame --}}
            <div class="flex items-center gap-2">
                <input type="checkbox" id="recuerdame" name="recuerdame"
                       class="w-4 h-4 rounded cursor-pointer" style="accent-color: #1DB954;">
                <label for="recuerdame" class="text-sm cursor-pointer" style="color: #b3b3b3;">
                    Recuérdame
                </label>
            </div>

            {{-- Botón --}}
            <button type="submit"
                    class="w-full font-bold py-3 px-8 rounded-full text-black transition hover:scale-105 mt-2"
                    style="background-color: #1DB954;">
                Iniciar sesión
            </button>
        </form>

        {{-- Enlace registro --}}
        <p class="text-center text-sm mt-6" style="color: #b3b3b3;">
            ¿No tienes cuenta?
            <a href="{{ route('registro') }}" class="font-semibold underline" style="color: #1DB954;">
                Regístrate gratis
            </a>
        </p>

    </div>

    <script src="{{ asset('js/validacion-login.js') }}"></script>
</body>
</html>
