<?php $__env->startSection('titulo', 'Nueva lista — MiSpoty'); ?>

<?php $__env->startSection('contenido'); ?>

    <div class="max-w-lg mx-auto">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-black text-white">Nueva lista</h1>
            <a href="<?php echo e(route('listas.index')); ?>"
               class="px-5 py-2.5 rounded-full font-bold text-sm transition sp-btn-limpiar">
                ← Volver
            </a>
        </div>

        <?php if($errors->any()): ?>
            <div class="rounded p-4 mb-6 sp-alerta-error">
                <ul class="list-disc list-inside text-sm space-y-1">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('listas.guardar')); ?>"
              class="rounded-xl p-6 space-y-5 sp-tarjeta">
            <?php echo csrf_field(); ?>

            <div>
                <label class="block text-sm font-semibold text-white mb-1">Nombre de la lista</label>
                <input type="text"
                       name="name"
                       value="<?php echo e(old('name')); ?>"
                       placeholder="Ej: Mis favoritos"
                       class="w-full px-4 py-3 rounded text-sm sp-campo <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-600 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            </div>

            <div>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox"
                           name="is_public"
                           value="1"
                           <?php echo e(old('is_public') ? 'checked' : ''); ?>

                           class="w-4 h-4 sp-checkbox">
                    <span class="text-sm font-semibold text-white">Lista pública</span>
                </label>
                <p class="text-xs sp-tenue mt-1 ml-7">Otros usuarios podrán ver esta lista.</p>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                        class="px-6 py-3 rounded-full font-bold text-sm transition hover:scale-105 sp-btn-verde">
                    Crear lista
                </button>
                <a href="<?php echo e(route('listas.index')); ?>"
                   class="px-6 py-3 rounded-full font-bold text-sm transition sp-btn-limpiar">
                    Cancelar
                </a>
            </div>

        </form>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cliente', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\DAW2\proyectos\MySpotify\resources\views/cliente/listas/crear.blade.php ENDPATH**/ ?>