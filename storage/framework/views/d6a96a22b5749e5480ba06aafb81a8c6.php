<?php $__env->startSection('titulo', 'Canciones — MiSpoty'); ?>

<?php $__env->startSection('contenido'); ?>

    <div class="max-w-7xl mx-auto">

        
        <h1 class="text-3xl font-black text-white mb-6">Canciones</h1>

        
        <form method="GET" action="<?php echo e(route('canciones.index')); ?>" class="mb-8">

            <div class="flex flex-col sm:flex-row gap-3 mb-4">
                
                <input
                    type="text"
                    name="buscar"
                    value="<?php echo e($buscar); ?>"
                    placeholder="Buscar por título o artista…"
                    class="flex-1 px-4 py-3 rounded text-sm sp-campo"
                >
                <button type="submit"
                        class="px-6 py-3 rounded-full font-bold text-sm transition hover:scale-105 sp-btn-verde">
                    Buscar
                </button>
                <?php if($buscar !== '' || !empty($generosSeleccionados)): ?>
                    <a href="<?php echo e(route('canciones.index')); ?>"
                       class="px-6 py-3 rounded-full text-sm font-semibold text-center transition sp-btn-limpiar">
                        Limpiar
                    </a>
                <?php endif; ?>
            </div>

            
            <?php if($generos->isNotEmpty()): ?>
                <div class="flex flex-wrap gap-3">
                    <?php $__currentLoopData = $generos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genero): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="flex items-center gap-2 px-3 py-2 rounded transition
                                      <?php echo e(in_array($genero->id, $generosSeleccionados) ? 'sp-filtro-activo' : 'sp-filtro'); ?>">
                            <input
                                type="checkbox"
                                name="generos[]"
                                value="<?php echo e($genero->id); ?>"
                                <?php echo e(in_array($genero->id, $generosSeleccionados) ? 'checked' : ''); ?>

                                class="w-3 h-3 auto-submit sp-checkbox-negro"
                            >
                            <span class="text-sm font-semibold"><?php echo e($genero->name); ?></span>
                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

        </form>

        
        <?php if($canciones->isEmpty()): ?>
            <div class="text-center py-20">
                <p class="text-lg font-semibold sp-gris">No se encontraron canciones.</p>
                <a href="<?php echo e(route('canciones.index')); ?>" class="mt-4 inline-block text-sm underline sp-verde">
                    Ver todas las canciones
                </a>
            </div>
        <?php else: ?>

            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mb-8">
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
            </div>

            
            <?php echo e($canciones->appends(['buscar' => $buscar, 'generos' => $generosSeleccionados])->links()); ?>


        <?php endif; ?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cliente', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\DAW2\proyectos\MySpotify\MySpoty\resources\views/cliente/canciones/index.blade.php ENDPATH**/ ?>