<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MiSpoty — Música sin límites</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="sp-fondo min-h-screen flex flex-col items-center justify-center">

    <main class="flex flex-col items-center justify-center flex-1 px-6 py-16 text-center">

        {{-- Logo --}}
        <div class="mb-8">
            <span class="text-6xl font-black tracking-tight sp-verde">MiSpoty</span>
        </div>

        {{-- Slogan --}}
        <h1 class="text-white text-3xl font-bold mb-3">
            Música sin límites
        </h1>
        <p class="mb-12 text-lg sp-gris">
            Millones de canciones. Acceso gratuito. Sin tarjeta de crédito.
        </p>

        {{-- Botones --}}
        <div class="flex flex-col sm:flex-row gap-4 w-full max-w-xs">
            <a href="{{ route('registro') }}"
               class="w-full text-center font-bold py-3 px-8 rounded-full transition hover:scale-105 sp-btn-verde">
                Registrarse gratis
            </a>
            <a href="{{ route('login') }}"
               class="w-full text-center font-bold py-3 px-8 rounded-full transition sp-btn-borde-blanco">
                Iniciar sesión
            </a>
        </div>

    </main>

    {{-- Pie de página --}}
    <footer class="w-full py-6 text-center text-sm sp-claro sp-borde-superior-oscuro">
        &copy; {{ date('Y') }} MiSpoty · Proyecto escolar
    </footer>

</body>
</html>
