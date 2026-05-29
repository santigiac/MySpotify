<?php $__env->startSection('titulo', 'Editar canción — Admin MiSpoty'); ?>

<?php $__env->startSection('contenido'); ?>

    <div class="max-w-2xl mx-auto">

        
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-black text-white">Editar canción</h1>
            <a href="<?php echo e(route('admin.canciones.index')); ?>"
               class="px-5 py-2.5 rounded-full font-bold text-sm transition hover:scale-105 sp-btn-limpiar">
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

        
        <form method="POST"
              action="<?php echo e(route('admin.canciones.actualizar', $cancion)); ?>"
              enctype="multipart/form-data"
              class="rounded-xl p-6 space-y-5 sp-tarjeta">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            
            <div>
                <label class="block text-sm font-semibold text-white mb-1">Nombre de la canción</label>
                <input type="text"
                       name="name"
                       value="<?php echo e(old('name', $cancion->name)); ?>"
                       placeholder="Ej: Mala Mujer"
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
                <label class="block text-sm font-semibold text-white mb-1">Artista / Grupo</label>
                <input type="text"
                       name="artist"
                       value="<?php echo e(old('artist', $cancion->artist)); ?>"
                       placeholder="Ej: C. Tangana"
                       class="w-full px-4 py-3 rounded text-sm sp-campo <?php $__errorArgs = ['artist'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-600 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            </div>

            
            <div>
                <label class="block text-sm font-semibold text-white mb-1">Duración</label>
                <input type="text"
                       name="duration"
                       value="<?php echo e(old('duration', $cancion->duration)); ?>"
                       placeholder="3:45"
                       class="w-full px-4 py-3 rounded text-sm sp-campo <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-600 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            </div>

            
            <div>
                <label class="block text-sm font-semibold text-white mb-1">Género</label>
                <select name="genre_id"
                        class="w-full px-4 py-3 rounded text-sm sp-select <?php $__errorArgs = ['genre_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-600 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <option value="">— Selecciona un género —</option>
                    <?php $__currentLoopData = $generos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genero): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($genero->id); ?>"
                            <?php echo e(old('genre_id', $cancion->genre_id) == $genero->id ? 'selected' : ''); ?>>
                            <?php echo e($genero->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            
            <div>
                <label class="block text-sm font-semibold text-white mb-1">Portada del álbum</label>
                <?php if($cancion->album_cover): ?>
                    <div class="mb-3 flex items-center gap-4">
                        <img src="<?php echo e(asset('storage/' . $cancion->album_cover)); ?>"
                             alt="<?php echo e($cancion->name); ?>"
                             class="w-20 h-20 rounded object-cover">
                        <span class="text-xs sp-gris">Portada actual. Sube una nueva para reemplazarla.</span>
                    </div>
                <?php endif; ?>
                <input type="file"
                       name="album_cover"
                       accept=".jpg,.jpeg,.png,.webp"
                       class="w-full px-4 py-3 rounded text-sm sp-campo <?php $__errorArgs = ['album_cover'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-600 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <p class="text-xs sp-tenue mt-1">JPG, PNG o WebP. Máximo 2 MB. Deja vacío para mantener la actual.</p>
            </div>

            
            <div>
                <label class="block text-sm font-semibold text-white mb-1">Archivo de audio</label>
                <?php if($cancion->audio_file): ?>
                    <div class="mb-3">
                        <audio controls class="w-full sp-reproductor">
                            <source src="<?php echo e(Storage::url($cancion->audio_file)); ?>">
                        </audio>
                        <p class="text-xs sp-gris mt-1">Audio actual. Sube uno nuevo para reemplazarlo.</p>
                    </div>
                <?php endif; ?>
                <input type="file"
                       name="audio_file"
                       accept=".mp3,.wav,.ogg"
                       class="w-full px-4 py-3 rounded text-sm sp-campo <?php $__errorArgs = ['audio_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-600 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <p class="text-xs sp-tenue mt-1">MP3, WAV u OGG. Máximo 20 MB. Deja vacío para mantener el actual.</p>
            </div>

            
            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                        class="px-6 py-3 rounded-full font-bold text-sm transition hover:scale-105 sp-btn-verde">
                    Guardar cambios
                </button>
                <a href="<?php echo e(route('admin.canciones.index')); ?>"
                   class="px-6 py-3 rounded-full font-bold text-sm transition sp-btn-limpiar">
                    Cancelar
                </a>
            </div>

        </form>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\DAW2\proyectos\MySpotify\resources\views/admin/canciones/editar.blade.php ENDPATH**/ ?>