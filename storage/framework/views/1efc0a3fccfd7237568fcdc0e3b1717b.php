<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MiSpoty — Música sin límites</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body style="background-color: #121212;" class="min-h-screen flex flex-col items-center justify-center">

    <main class="flex flex-col items-center justify-center flex-1 px-6 py-16 text-center">

        
        <div class="mb-8">
            <span class="text-6xl font-black tracking-tight" style="color: #1DB954;">MiSpoty</span>
        </div>

        
        <h1 class="text-white text-3xl font-bold mb-3">
            Música sin límites
        </h1>
        <p class="mb-12 text-lg" style="color: #b3b3b3;">
            Millones de canciones. Acceso gratuito. Sin tarjeta de crédito.
        </p>

        
        <div class="flex flex-col sm:flex-row gap-4 w-full max-w-xs">
            <a href="<?php echo e(route('registro')); ?>"
               class="w-full text-center font-bold py-3 px-8 rounded-full text-black transition hover:scale-105"
               style="background-color: #1DB954;">
                Registrarse gratis
            </a>
            <a href="<?php echo e(route('login')); ?>"
               class="w-full text-center font-bold py-3 px-8 rounded-full text-white border transition hover:border-white"
               style="border-color: #535353; background-color: transparent;">
                Iniciar sesión
            </a>
        </div>

    </main>

    
    <footer class="w-full py-6 text-center text-sm" style="color: #6a6a6a; border-top: 1px solid #282828;">
        &copy; <?php echo e(date('Y')); ?> MiSpoty · Proyecto escolar
    </footer>

</body>
</html>
<?php /**PATH C:\wamp64\www\DAW2\proyectos\MySpotify\MySpoty\resources\views/welcome.blade.php ENDPATH**/ ?>