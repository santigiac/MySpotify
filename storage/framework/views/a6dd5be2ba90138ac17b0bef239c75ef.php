<?php if($paginator->hasPages()): ?>
    <nav role="navigation" aria-label="Navegación de páginas" class="flex items-center justify-center mt-8">
        <div class="flex items-center gap-1 flex-wrap">

            
            <?php if($paginator->onFirstPage()): ?>
                <span class="px-3 py-2 rounded text-sm cursor-not-allowed opacity-40 sp-pagina">
                    ← Anterior
                </span>
            <?php else: ?>
                <a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev"
                   class="px-3 py-2 rounded text-sm transition sp-pagina">
                    ← Anterior
                </a>
            <?php endif; ?>

            
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(is_string($element)): ?>
                    <span class="px-3 py-2 text-sm sp-pagina-punto"><?php echo e($element); ?></span>
                <?php endif; ?>

                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pagina => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($pagina == $paginator->currentPage()): ?>
                            <span class="px-3 py-2 rounded text-sm sp-pagina-activa">
                                <?php echo e($pagina); ?>

                            </span>
                        <?php else: ?>
                            <a href="<?php echo e($url); ?>"
                               class="px-3 py-2 rounded text-sm transition sp-pagina">
                                <?php echo e($pagina); ?>

                            </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <?php if($paginator->hasMorePages()): ?>
                <a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next"
                   class="px-3 py-2 rounded text-sm transition sp-pagina">
                    Siguiente →
                </a>
            <?php else: ?>
                <span class="px-3 py-2 rounded text-sm cursor-not-allowed opacity-40 sp-pagina">
                    Siguiente →
                </span>
            <?php endif; ?>

        </div>
    </nav>
<?php endif; ?>
<?php /**PATH C:\wamp64\www\DAW2\proyectos\MySpotify\resources\views/vendor/pagination/tailwind.blade.php ENDPATH**/ ?>