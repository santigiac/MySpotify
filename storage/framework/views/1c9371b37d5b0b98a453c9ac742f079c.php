<?php $__env->startSection('titulo', 'Usuarios — Admin MiSpoty'); ?>

<?php $__env->startSection('contenido'); ?>

    <div class="max-w-7xl mx-auto">

        
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-3xl font-black text-white">Gestión de usuarios</h1>
                <p class="text-sm sp-gris mt-1"><?php echo e($usuarios->total()); ?> <?php echo e($usuarios->total() === 1 ? 'usuario registrado' : 'usuarios registrados'); ?></p>
            </div>
        </div>

        
        <form method="GET" action="<?php echo e(route('admin.usuarios.index')); ?>" class="mb-6">
            <div class="flex flex-col sm:flex-row gap-3">
                <input
                    type="text"
                    name="buscar"
                    value="<?php echo e($buscar); ?>"
                    placeholder="Buscar por nombre o email…"
                    class="flex-1 px-4 py-3 rounded text-sm sp-campo"
                >
                <button type="submit"
                        class="px-6 py-3 rounded-full font-bold text-sm transition hover:scale-105 sp-btn-verde">
                    Buscar
                </button>
                <?php if($buscar !== ''): ?>
                    <a href="<?php echo e(route('admin.usuarios.index')); ?>"
                       class="px-6 py-3 rounded-full text-sm font-semibold text-center transition sp-btn-limpiar">
                        Limpiar
                    </a>
                <?php endif; ?>
            </div>
        </form>

        
        <?php if($usuarios->isEmpty()): ?>
            <div class="rounded-xl p-12 text-center sp-tarjeta">
                <p class="sp-gris">No se encontraron usuarios.</p>
            </div>
        <?php else: ?>
            <div class="rounded-xl overflow-hidden sp-tarjeta mb-6">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="sp-tabla-cabecera">
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Nombre</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Email</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Registrado el</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Estado</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="sp-tabla-fila">

                                
                                <td class="px-4 py-3 text-white font-semibold">
                                    <?php echo e($usuario->name); ?>

                                </td>

                                
                                <td class="px-4 py-3 sp-gris"><?php echo e($usuario->email); ?></td>

                                
                                <td class="px-4 py-3 sp-tenue">
                                    <?php echo e($usuario->created_at->format('d/m/Y')); ?>

                                </td>

                                
                                <td class="px-4 py-3">
                                    <?php if($usuario->activo): ?>
                                        <span class="px-2 py-1 rounded text-xs font-bold sp-badge-activo">Activo</span>
                                    <?php else: ?>
                                        <span class="px-2 py-1 rounded text-xs font-bold sp-badge-inactivo">Deshabilitado</span>
                                    <?php endif; ?>
                                </td>

                                
                                <td class="px-4 py-3">
                                    <form method="POST"
                                          action="<?php echo e(route('admin.usuarios.toggle', $usuario)); ?>"
                                          data-confirmar="<?php echo e($usuario->activo ? '¿Deshabilitar a ' . $usuario->name . '?' : '¿Habilitar a ' . $usuario->name . '?'); ?>">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>
                                        <button type="submit"
                                                class="px-3 py-1.5 rounded text-xs font-bold <?php echo e($usuario->activo ? 'sp-btn-eliminar' : 'sp-btn-verde'); ?>">
                                            <?php echo e($usuario->activo ? 'Deshabilitar' : 'Habilitar'); ?>

                                        </button>
                                    </form>
                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            
            <?php echo e($usuarios->appends(['buscar' => $buscar])->links()); ?>

        <?php endif; ?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\DAW2\proyectos\MySpotify\resources\views/admin/usuarios/index.blade.php ENDPATH**/ ?>