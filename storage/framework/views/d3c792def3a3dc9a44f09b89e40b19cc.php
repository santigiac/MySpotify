<?php $__env->startSection('titulo', 'Canciones — Admin MiSpoty'); ?>

<?php $__env->startSection('contenido'); ?>

    <div class="max-w-7xl mx-auto">

        
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-black text-white">Gestión de canciones</h1>
            <a href="<?php echo e(route('admin.canciones.crear')); ?>"
               class="px-5 py-2.5 rounded-full font-bold text-sm transition hover:scale-105 sp-btn-verde">
                + Nueva canción
            </a>
        </div>

        
        <form method="GET" action="<?php echo e(route('admin.canciones.index')); ?>" class="mb-6">

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
                    <a href="<?php echo e(route('admin.canciones.index')); ?>"
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
            <div class="rounded-xl p-12 text-center sp-tarjeta">
                <p class="sp-gris">No se encontraron canciones.</p>
            </div>
        <?php else: ?>
            <div class="rounded-xl overflow-hidden sp-tarjeta mb-6">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="sp-tabla-cabecera">
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Portada</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Nombre</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Artista</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Género</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Duración</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $canciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cancion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="sp-tabla-fila">

                                
                                <td class="px-4 py-3">
                                    <?php if($cancion->album_cover): ?>
                                        <img src="<?php echo e(asset('storage/' . $cancion->album_cover)); ?>"
                                             alt="<?php echo e($cancion->name); ?>"
                                             class="w-12 h-12 rounded object-cover">
                                    <?php else: ?>
                                        <div class="w-12 h-12 rounded flex items-center justify-center sp-placeholder-img">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                 viewBox="0 0 24 24" stroke="#535353" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2
                                                         1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2
                                                         1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                                            </svg>
                                        </div>
                                    <?php endif; ?>
                                </td>

                                
                                <td class="px-4 py-3 text-white font-semibold">
                                    <?php echo e($cancion->name); ?>

                                </td>

                                
                                <td class="px-4 py-3 sp-gris"><?php echo e($cancion->artist); ?></td>

                                
                                <td class="px-4 py-3 sp-gris">
                                    <?php echo e($cancion->genero?->name ?? '—'); ?>

                                </td>

                                
                                <td class="px-4 py-3 sp-tenue"><?php echo e($cancion->duration); ?></td>

                                
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-2">
                                        <a href="<?php echo e(route('admin.canciones.editar', $cancion)); ?>"
                                           class="px-3 py-1.5 rounded text-xs font-bold sp-btn-limpiar">
                                            Editar
                                        </a>
                                        <form method="POST"
                                              action="<?php echo e(route('admin.canciones.eliminar', $cancion)); ?>"
                                              data-confirmar="¿Eliminar '<?php echo e($cancion->name); ?>'? Se borrarán también los archivos de portada y audio.">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit"
                                                    class="px-3 py-1.5 rounded text-xs font-bold sp-btn-eliminar">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            
            <?php echo e($canciones->appends(['buscar' => $buscar, 'generos' => $generosSeleccionados])->links()); ?>

        <?php endif; ?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\DAW2\proyectos\MySpotify\resources\views/admin/canciones/index.blade.php ENDPATH**/ ?>