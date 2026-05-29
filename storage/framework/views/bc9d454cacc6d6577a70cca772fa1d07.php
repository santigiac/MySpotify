<?php $__env->startSection('titulo', 'Mis listas — MiSpoty'); ?>

<?php $__env->startSection('contenido'); ?>

    <div class="max-w-7xl mx-auto">

        
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-black text-white">Mis listas</h1>
            <a href="<?php echo e(route('listas.crear')); ?>"
               class="px-5 py-2.5 rounded-full font-bold text-sm transition hover:scale-105 sp-btn-verde">
                + Nueva lista
            </a>
        </div>

        <?php if($misListas->isEmpty()): ?>
            <p class="sp-gris text-sm mb-12">Aún no has creado ninguna lista.</p>
        <?php else: ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mb-12">
                <?php $__currentLoopData = $misListas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lista): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="rounded-xl p-5 flex flex-col gap-3 sp-tarjeta">

                        <div class="flex items-start justify-between gap-2">
                            <h3 class="text-white font-bold text-base leading-tight"><?php echo e($lista->name); ?></h3>
                            <span class="text-base flex-shrink-0">
                                <?php echo e($lista->is_public ? '🌐' : '🔒'); ?>

                            </span>
                        </div>

                        <p class="text-xs sp-tenue">
                            <?php echo e($lista->canciones_count); ?>

                            <?php echo e($lista->canciones_count === 1 ? 'canción' : 'canciones'); ?>

                        </p>

                        <div class="flex gap-2 flex-wrap mt-auto">
                            <a href="<?php echo e(route('listas.mostrar', $lista)); ?>"
                               class="px-3 py-1.5 rounded text-xs font-bold sp-btn-verde">
                                Ver
                            </a>
                            <a href="<?php echo e(route('listas.editar', $lista)); ?>"
                               class="px-3 py-1.5 rounded text-xs font-bold sp-btn-limpiar">
                                Editar
                            </a>
                            <form method="POST" action="<?php echo e(route('listas.eliminar', $lista)); ?>"
                                  data-confirmar="¿Eliminar '<?php echo e($lista->name); ?>'? Esta acción no se puede deshacer.">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit"
                                        class="px-3 py-1.5 rounded text-xs font-bold sp-btn-eliminar">
                                    Eliminar
                                </button>
                            </form>
                        </div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        
        <h2 class="text-2xl font-black text-white mb-6">Listas públicas</h2>

        <?php if($listasPublicas->isEmpty()): ?>
            <p class="sp-gris text-sm">No hay listas públicas de otros usuarios disponibles.</p>
        <?php else: ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                <?php $__currentLoopData = $listasPublicas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lista): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="rounded-xl p-5 flex flex-col gap-3 sp-tarjeta">

                        <div class="flex items-start justify-between gap-2">
                            <h3 class="text-white font-bold text-base leading-tight"><?php echo e($lista->name); ?></h3>
                            <span class="text-base flex-shrink-0">🌐</span>
                        </div>

                        <p class="text-xs sp-tenue">
                            <?php echo e($lista->canciones_count); ?>

                            <?php echo e($lista->canciones_count === 1 ? 'canción' : 'canciones'); ?>

                        </p>

                        <p class="text-xs sp-claro">Por <?php echo e($lista->usuario->name); ?></p>

                        <div class="mt-auto">
                            <a href="<?php echo e(route('listas.mostrar', $lista)); ?>"
                               class="px-3 py-1.5 rounded text-xs font-bold sp-btn-verde">
                                Ver
                            </a>
                        </div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cliente', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\DAW2\proyectos\MySpotify\resources\views/cliente/listas/index.blade.php ENDPATH**/ ?>