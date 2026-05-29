<?php $__env->startSection('titulo', $cancion->name . ' — MiSpoty'); ?>

<?php $__env->startSection('contenido'); ?>

    <div class="max-w-3xl mx-auto">

        
        <a href="<?php echo e(route('canciones.index')); ?>"
           class="inline-flex items-center gap-2 text-sm font-semibold mb-6 transition sp-enlace-nav">
            ← Volver al catálogo
        </a>

        
        <div class="rounded-xl p-6 flex flex-col sm:flex-row gap-8 sp-tarjeta">

            
            <div class="w-full sm:w-56 flex-shrink-0">
                <div class="w-full aspect-square rounded-lg overflow-hidden sp-placeholder-img">
                    <?php if($cancion->album_cover): ?>
                        <img src="<?php echo e(asset('storage/' . $cancion->album_cover)); ?>"
                             alt="Portada de <?php echo e($cancion->name); ?>"
                             class="w-full h-full object-cover">
                    <?php else: ?>
                        <div class="w-full h-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20" fill="none"
                                 viewBox="0 0 24 24" stroke="#535353" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2
                                         1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2
                                         1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                            </svg>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            
            <div class="flex flex-col justify-center gap-3">

                <div>
                    <p class="text-xs font-semibold uppercase tracking-widest mb-1 sp-verde">Canción</p>
                    <h1 class="text-3xl font-black text-white"><?php echo e($cancion->name); ?></h1>
                </div>

                <p class="text-lg font-semibold sp-gris"><?php echo e($cancion->artist); ?></p>

                <?php if($cancion->genero): ?>
                    <span class="inline-block px-3 py-1 rounded-full text-xs font-bold w-fit sp-badge-genero">
                        <?php echo e($cancion->genero->name); ?>

                    </span>
                <?php endif; ?>

                <p class="text-sm sp-tenue">
                    Duración:
                    <span class="text-white font-semibold">
                        <?php
                            $minutos  = intdiv($cancion->duration, 60);
                            $segundos = $cancion->duration % 60;
                        ?>
                        <?php echo e($minutos); ?>:<?php echo e(str_pad($segundos, 2, '0', STR_PAD_LEFT)); ?>

                    </span>
                </p>

            </div>
        </div>

        
        <div class="mt-6 rounded-xl p-6 sp-tarjeta">
            <p class="text-sm font-semibold mb-2 sp-tenue">Reproductor — disponible en M4</p>
            <div class="h-12 rounded sp-placeholder-seccion"></div>
        </div>

        
        <div class="mt-4 rounded-xl p-6 sp-tarjeta">
            <p class="text-sm font-semibold sp-tenue">Añadir a lista de reproducción — disponible en M5</p>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cliente', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\DAW2\proyectos\MySpotify\resources\views/cliente/canciones/show.blade.php ENDPATH**/ ?>