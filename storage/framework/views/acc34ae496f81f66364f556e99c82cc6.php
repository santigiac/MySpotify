<?php $__env->startSection('titulo', 'Canciones — MiSpoty'); ?>

<?php $__env->startSection('contenido'); ?>

    <div class="max-w-7xl mx-auto">

        
        <h1 class="text-3xl font-black text-white mb-6">Canciones</h1>

        
        <div class="mb-8">

            <div class="mb-4">
                <input
                    type="text"
                    id="input-buscar"
                    value="<?php echo e($buscar); ?>"
                    placeholder="Buscar por título o artista…"
                    class="w-full px-4 py-3 rounded text-sm sp-campo"
                >
            </div>

            
            <?php if($generos->isNotEmpty()): ?>
                <div class="flex flex-wrap gap-3" id="filtros-genero">
                    <?php $__currentLoopData = $generos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genero): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="flex items-center gap-2 px-3 py-2 rounded cursor-pointer transition sp-filtro">
                            <input
                                type="checkbox"
                                name="generos[]"
                                value="<?php echo e($genero->id); ?>"
                                <?php echo e(in_array($genero->id, $generosSeleccionados) ? 'checked' : ''); ?>

                                class="w-3 h-3 sp-checkbox-negro"
                            >
                            <span class="text-sm font-semibold"><?php echo e($genero->name); ?></span>
                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

        </div>

        
        <div id="grid-canciones"
             class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mb-8">
            <?php echo $__env->make('cliente.canciones.partials.tarjetas', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        
        <div id="paginacion">
            <?php echo e($canciones->appends(['buscar' => $buscar, 'generos' => $generosSeleccionados])->links()); ?>

        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/buscar-ajax.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.cliente', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\DAW2\proyectos\MySpotify\resources\views/cliente/canciones/index.blade.php ENDPATH**/ ?>