<?php $__env->startSection('titulo', $lista->name . ' — MiSpoty'); ?>

<?php $__env->startSection('contenido'); ?>

    <div class="max-w-4xl mx-auto">

        
        <a href="<?php echo e(route('listas.index')); ?>"
           class="inline-flex items-center gap-2 text-sm font-semibold mb-6 transition sp-enlace-nav">
            ← Volver a mis listas
        </a>

        
        <div class="rounded-xl p-6 mb-6 sp-tarjeta">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                <div>
                    <div class="flex items-center gap-3 mb-1">
                        <h1 class="text-3xl font-black text-white"><?php echo e($lista->name); ?></h1>
                        <span class="text-xl"><?php echo e($lista->is_public ? '🌐' : '🔒'); ?></span>
                    </div>
                    <p class="text-sm sp-gris">
                        Por <span class="text-white font-semibold"><?php echo e($lista->usuario->name); ?></span>
                        · <?php echo e($lista->canciones->count()); ?>

                        <?php echo e($lista->canciones->count() === 1 ? 'canción' : 'canciones'); ?>

                        · <?php echo e($lista->is_public ? 'Pública' : 'Privada'); ?>

                    </p>
                </div>

                <?php if($lista->user_id === Auth::id()): ?>
                    <div class="flex gap-3 flex-shrink-0">
                        <a href="<?php echo e(route('listas.editar', $lista)); ?>"
                           class="px-4 py-2 rounded-full text-sm font-bold sp-btn-limpiar">
                            Editar
                        </a>
                        <form method="POST" action="<?php echo e(route('listas.eliminar', $lista)); ?>"
                              data-confirmar="¿Eliminar '<?php echo e($lista->name); ?>'? Esta acción no se puede deshacer.">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit"
                                    class="px-4 py-2 rounded-full text-sm font-bold sp-btn-eliminar">
                                Eliminar
                            </button>
                        </form>
                    </div>
                <?php endif; ?>

            </div>
        </div>

        
        <?php if($lista->canciones->isEmpty()): ?>
            <div class="rounded-xl p-8 text-center sp-tarjeta">
                <p class="sp-gris">Esta lista no tiene canciones todavía.</p>
                <?php if($lista->user_id === Auth::id()): ?>
                    <a href="<?php echo e(route('canciones.index')); ?>" class="mt-3 inline-block text-sm underline sp-verde">
                        Explorar canciones
                    </a>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <div class="space-y-3">
                <?php $__currentLoopData = $lista->canciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cancion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="rounded-xl p-4 sp-tarjeta">

                        <div class="flex gap-4 items-start">

                            
                            <div class="w-14 h-14 rounded flex-shrink-0 overflow-hidden sp-placeholder-img">
                                <?php if($cancion->album_cover): ?>
                                    <img src="<?php echo e(asset('storage/' . $cancion->album_cover)); ?>"
                                         alt="<?php echo e($cancion->name); ?>"
                                         class="w-full h-full object-cover">
                                <?php else: ?>
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                             viewBox="0 0 24 24" stroke="#535353" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2
                                                     1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2
                                                     1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                                        </svg>
                                    </div>
                                <?php endif; ?>
                            </div>

                            
                            <div class="flex-1 min-w-0">
                                <a href="<?php echo e(route('canciones.mostrar', $cancion)); ?>"
                                   class="text-white font-bold text-sm hover:underline truncate block">
                                    <?php echo e($cancion->name); ?>

                                </a>
                                <p class="text-xs sp-gris mt-0.5">
                                    <?php echo e($cancion->artist); ?>

                                    <?php if($cancion->genero): ?>
                                        · <span class="sp-tenue"><?php echo e($cancion->genero->name); ?></span>
                                    <?php endif; ?>
                                    · <span class="sp-tenue"><?php echo e($cancion->duration); ?></span>
                                </p>

                                <div class="mt-3">
                                    <?php if($cancion->audio_file): ?>
                                        <audio controls class="sp-reproductor">
                                            <source src="<?php echo e(Storage::url($cancion->audio_file)); ?>" type="audio/mpeg">
                                        </audio>
                                    <?php else: ?>
                                        <p class="text-xs sp-tenue">Audio no disponible.</p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            
                            <?php if($lista->user_id === Auth::id()): ?>
                                <form method="POST"
                                      action="<?php echo e(route('listas.quitar-cancion', [$lista, $cancion])); ?>"
                                      class="flex-shrink-0">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit"
                                            class="px-3 py-1.5 rounded text-xs font-bold sp-btn-eliminar"
                                            title="Quitar de la lista">
                                        ✕
                                    </button>
                                </form>
                            <?php endif; ?>

                        </div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cliente', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\DAW2\proyectos\MySpotify\resources\views/cliente/listas/show.blade.php ENDPATH**/ ?>