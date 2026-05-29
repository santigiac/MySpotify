<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('titulo', 'MiSpoty'); ?></title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>
<body class="sp-fondo min-h-screen flex flex-col">

    
    <nav class="sp-fondo-negro px-6 py-4 flex items-center justify-between sticky top-0 z-50">

        
        <div class="flex items-center gap-8">
            <a href="<?php echo e(route('canciones.index')); ?>" class="text-2xl font-black tracking-tight sp-verde">
                MiSpoty
            </a>
            <div class="hidden sm:flex items-center gap-6">
                <a href="<?php echo e(route('canciones.index')); ?>"
                   class="text-sm font-semibold transition <?php echo e(request()->routeIs('canciones.*') ? 'sp-enlace-activo' : 'sp-enlace-nav'); ?>">
                    Canciones
                </a>
                <a href="<?php echo e(route('listas.index')); ?>"
                   class="text-sm font-semibold transition <?php echo e(request()->routeIs('listas.*') ? 'sp-enlace-activo' : 'sp-enlace-nav'); ?>">
                    Mis listas
                </a>
            </div>
        </div>

        
        <div class="flex items-center gap-4">
            <span class="text-sm sp-gris">
                Hola, <span class="text-white font-semibold"><?php echo e(Auth::user()->name); ?></span>
            </span>
            <form method="POST" action="<?php echo e(route('cerrar-sesion')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit"
                        class="text-sm font-semibold px-4 py-2 rounded-full transition sp-btn-borde">
                    Cerrar sesión
                </button>
            </form>
        </div>

    </nav>

    
    <main class="flex-1 px-6 py-8">

        
        <?php if(session('exito')): ?>
            <div class="max-w-7xl mx-auto mb-5 p-3 rounded text-sm font-semibold sp-alerta-exito">
                <?php echo e(session('exito')); ?>

            </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="max-w-7xl mx-auto mb-5 p-3 rounded text-sm font-semibold sp-alerta-error">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('contenido'); ?>
    </main>

    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\wamp64\www\DAW2\proyectos\MySpotify\resources\views/layouts/cliente.blade.php ENDPATH**/ ?>