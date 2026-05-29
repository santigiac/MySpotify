<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrarse — MiSpoty</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="sp-fondo min-h-screen flex items-center justify-center px-4 py-8">

    <div class="w-full max-w-sm rounded-xl p-8 sp-fondo-oscuro">

        {{-- Logo --}}
        <div class="text-center mb-8">
            <a href="{{ route('bienvenida') }}" class="text-4xl font-black tracking-tight sp-verde">
                MiSpoty
            </a>
            <h2 class="text-white text-xl font-bold mt-4">Crea tu cuenta</h2>
        </div>

        {{-- Errores del servidor --}}
        @if ($errors->any())
            <div class="mb-4 p-3 rounded text-sm sp-caja-error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form id="form-registro" method="POST" action="{{ route('registro.guardar') }}" class="space-y-4">
            @csrf

            {{-- Nombre --}}
            <div>
                <label for="nombre" class="block text-sm font-semibold mb-1 sp-gris">
                    Nombre completo
                </label>
                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    value="{{ old('nombre') }}"
                    autofocus
                    autocomplete="name"
                    class="w-full px-4 py-3 rounded text-sm sp-campo"
                >
                <span id="error-nombre" class="error-js text-xs mt-1"></span>
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-semibold mb-1 sp-gris">
                    Correo electrónico
                </label>
                <input
                    type="text"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    autocomplete="email"
                    class="w-full px-4 py-3 rounded text-sm sp-campo"
                >
                <span id="error-email" class="error-js text-xs mt-1"></span>
            </div>

            {{-- Contraseña --}}
            <div>
                <label for="password" class="block text-sm font-semibold mb-1 sp-gris">
                    Contraseña
                </label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    autocomplete="new-password"
                    class="w-full px-4 py-3 rounded text-sm sp-campo"
                >
                <span id="error-password" class="error-js text-xs mt-1"></span>
                <p class="text-xs mt-1 sp-claro">Mínimo 8 caracteres</p>
            </div>

            {{-- Confirmar contraseña --}}
            <div>
                <label for="password_confirmation" class="block text-sm font-semibold mb-1 sp-gris">
                    Confirmar contraseña
                </label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    autocomplete="new-password"
                    class="w-full px-4 py-3 rounded text-sm sp-campo"
                >
                <span id="error-password_confirmation" class="error-js text-xs mt-1"></span>
            </div>

            {{-- Botón --}}
            <button type="submit"
                    class="w-full font-bold py-3 px-8 rounded-full transition hover:scale-105 mt-2 sp-btn-verde">
                Crear cuenta
            </button>
        </form>

        {{-- Enlace login --}}
        <p class="text-center text-sm mt-6 sp-gris">
            ¿Ya tienes cuenta?
            <a href="{{ route('login') }}" class="font-semibold underline sp-verde">
                Inicia sesión
            </a>
        </p>

    </div>

    <script src="{{ asset('js/validacion-registro.js') }}"></script>
</body>
</html>
