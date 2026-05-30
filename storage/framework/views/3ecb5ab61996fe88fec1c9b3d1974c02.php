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
                    <p class="text-xs font-semibold uppercase tracking-widest mb-1 sp-verde">
                        <?php echo e($lista->is_public ? '🌐 Lista pública' : '🔒 Lista privada'); ?>

                    </p>
                    <h1 class="text-3xl font-black text-white"><?php echo e($lista->name); ?></h1>
                    <p class="text-sm mt-1 sp-gris">Por <?php echo e($lista->usuario->name); ?></p>
                </div>

                <?php if($lista->user_id === Auth::id()): ?>
                    <div class="flex items-center gap-3 flex-shrink-0">
                        <a href="<?php echo e(route('listas.editar', $lista)); ?>"
                           class="px-4 py-2 rounded-full text-sm font-bold transition sp-btn-limpiar">
                            Editar
                        </a>
                        <form method="POST"
                              action="<?php echo e(route('listas.eliminar', $lista)); ?>"
                              data-confirmar="¿Eliminar la lista '<?php echo e($lista->name); ?>'? Esta acción no se puede deshacer.">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit"
                                    class="px-4 py-2 rounded-full text-sm font-bold sp-btn-eliminar">
                                Eliminar lista
                            </button>
                        </form>
                    </div>
                <?php endif; ?>

            </div>
        </div>

        
        <?php if($lista->canciones->isEmpty()): ?>
            <div class="rounded-xl p-12 text-center sp-tarjeta">
                <p class="sp-gris">Esta lista no tiene canciones todavía.</p>
                <?php if($lista->user_id === Auth::id()): ?>
                    <a href="<?php echo e(route('canciones.index')); ?>"
                       class="inline-block mt-4 text-sm font-semibold underline sp-verde">
                        Explorar canciones
                    </a>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <div class="space-y-3">
                <?php $__currentLoopData = $lista->canciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cancion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="rounded-xl p-4 sp-tarjeta">

                        <div class="flex items-center gap-4">

                            
                            <div class="w-12 h-12 rounded flex-shrink-0 overflow-hidden sp-placeholder-img">
                                <?php if($cancion->album_cover): ?>
                                    <img src="<?php echo e(asset('storage/' . $cancion->album_cover)); ?>"
                                         alt="<?php echo e($cancion->name); ?>"
                                         class="w-full h-full object-cover">
                                <?php else: ?>
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
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
                                <p class="text-white font-semibold text-sm truncate"><?php echo e($cancion->name); ?></p>
                                <p class="text-xs sp-gris truncate"><?php echo e($cancion->artist); ?></p>
                                <?php if($cancion->genero): ?>
                                    <p class="text-xs sp-tenue"><?php echo e($cancion->genero->name); ?></p>
                                <?php endif; ?>
                            </div>

                            
                            <p class="text-xs sp-tenue flex-shrink-0 hidden sm:block"><?php echo e($cancion->duration); ?></p>

                            
                            <?php if($lista->user_id === Auth::id()): ?>
                                <form method="POST"
                                      action="<?php echo e(route('listas.quitar-cancion', [$lista, $cancion])); ?>"
                                      class="flex-shrink-0">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit"
                                            class="text-xs font-bold px-3 py-1.5 rounded sp-btn-eliminar"
                                            title="Quitar de la lista">
                                        ✕
                                    </button>
                                </form>
                            <?php endif; ?>

                        </div>

                        
                        <?php if($cancion->audio_file): ?>
                            <div class="mt-3">
                                <audio controls class="w-full sp-reproductor">
                                    <source src="<?php echo e(Storage::url($cancion->audio_file)); ?>" type="audio/mpeg">
                                </audio>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cliente', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\DAW2\proyectos\MySpotify\resources\views/cliente/listas/show.blade.php ENDPATH**/ ?>