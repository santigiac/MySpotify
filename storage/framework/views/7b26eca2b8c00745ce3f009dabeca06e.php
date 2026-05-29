<?php if($canciones->isEmpty()): ?>
    <div class="col-span-full text-center py-20">
        <p class="text-lg font-semibold sp-gris">No se encontraron canciones.</p>
    </div>
<?php else: ?>
    <?php $__currentLoopData = $canciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cancion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('canciones.mostrar', $cancion)); ?>"
           class="block rounded-lg p-4 transition hover:scale-105 sp-tarjeta">

            
            <div class="w-full aspect-square rounded mb-4 overflow-hidden sp-placeholder-img">
                <?php if($cancion->album_cover): ?>
                    <img src="<?php echo e(asset('storage/' . $cancion->album_cover)); ?>"
                         alt="Portada de <?php echo e($cancion->name); ?>"
                         class="w-full h-full object-cover">
                <?php else: ?>
                    <div class="w-full h-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16" fill="none"
                             viewBox="0 0 24 24" stroke="#535353" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2
                                     1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2
                                     1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                        </svg>
                    </div>
                <?php endif; ?>
            </div>

            
            <p class="text-white text-sm font-bold truncate"><?php echo e($cancion->name); ?></p>
            <p class="text-sm truncate mt-1 sp-gris"><?php echo e($cancion->artist); ?></p>
            <?php if($cancion->genero): ?>
                <p class="text-xs mt-1 sp-tenue"><?php echo e($cancion->genero->name); ?></p>
            <?php endif; ?>

        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH C:\wamp64\www\DAW2\proyectos\MySpotify\resources\views/cliente/canciones/partials/tarjetas.blade.php ENDPATH**/ ?>