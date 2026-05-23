<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrarse — MiSpoty</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body style="background-color: #121212;" class="min-h-screen flex items-center justify-center px-4 py-8">

    <div class="w-full max-w-sm rounded-xl p-8" style="background-color: #282828;">

        {{-- Logo --}}
        <div class="text-center mb-8">
            <a href="{{ route('bienvenida') }}" class="text-4xl font-black tracking-tight" style="color: #1DB954;">
                MiSpoty
            </a>
            <h2 class="text-white text-xl font-bold mt-4">Crea tu cuenta</h2>
        </div>

        {{-- Errores globales --}}
        @if ($errors->any())
            <div class="mb-4 p-3 rounded text-sm" style="background-color: #3e0000; color: #ff6b6b;">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('registro.guardar') }}" class="space-y-4">
            @csrf

            {{-- Nombre --}}
            <div>
                <label for="nombre" class="block text-sm font-semibold mb-1" style="color: #b3b3b3;">
                    Nombre completo
                </label>
                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    value="{{ old('nombre') }}"
                    required
                    autofocus
                    autocomplete="name"
                    class="w-full px-4 py-3 rounded text-white text-sm outline-none transition"
                    style="background-color: #3e3e3e; border: 1px solid #535353;"
                    onfocus="this.style.borderColor='#1DB954'"
                    onblur="this.style.borderColor='#535353'"
                >
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-semibold mb-1" style="color: #b3b3b3;">
                    Correo electrónico
                </label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                    class="w-full px-4 py-3 rounded text-white text-sm outline-none transition"
                    style="background-color: #3e3e3e; border: 1px solid #535353;"
                    onfocus="this.style.borderColor='#1DB954'"
                    onblur="this.style.borderColor='#535353'"
                >
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
                    required
                    autocomplete="new-password"
                    class="w-full px-4 py-3 rounded text-white text-sm outline-none transition"
                    style="background-color: #3e3e3e; border: 1px solid #535353;"
                    onfocus="this.style.borderColor='#1DB954'"
                    onblur="this.style.borderColor='#535353'"
                >
                <p class="text-xs mt-1" style="color: #6a6a6a;">Mínimo 8 caracteres</p>
            </div>

            {{-- Confirmar contraseña --}}
            <div>
                <label for="password_confirmation" class="block text-sm font-semibold mb-1" style="color: #b3b3b3;">
                    Confirmar contraseña
                </label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    class="w-full px-4 py-3 rounded text-white text-sm outline-none transition"
                    style="background-color: #3e3e3e; border: 1px solid #535353;"
                    onfocus="this.style.borderColor='#1DB954'"
                    onblur="this.style.borderColor='#535353'"
                >
            </div>

            {{-- Botón --}}
            <button type="submit"
                    class="w-full font-bold py-3 px-8 rounded-full text-black transition hover:scale-105 mt-2"
                    style="background-color: #1DB954;">
                Crear cuenta
            </button>
        </form>

        {{-- Enlace login --}}
        <p class="text-center text-sm mt-6" style="color: #b3b3b3;">
            ¿Ya tienes cuenta?
            <a href="{{ route('login') }}" class="font-semibold underline" style="color: #1DB954;">
                Inicia sesión
            </a>
        </p>

    </div>

</body>
</html>
