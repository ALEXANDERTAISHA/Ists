<?php
    $level = $level ?? 0;
    $presencialesMostradas = $presencialesMostradas ?? [];
    $dualesMostradas = $dualesMostradas ?? [];
?>

<?php $__currentLoopData = $nodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $node): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $hasChildren = $node->childrenRecursive && $node->childrenRecursive->count() > 0;
        $isPresencial = isset($node->career) && $node->career && $node->career->modality === 'presencial';
        $isDual = isset($node->career) && $node->career && $node->career->modality === 'dual';
        $isDuplicated = ($isPresencial && in_array($node->career->id, $presencialesMostradas)) || ($isDual && in_array($node->career->id, $dualesMostradas));
        // Detectar si es submenú de Servicios
        $isServicios = false;
        $parent = $node->parent ?? null;
        while ($parent) {
            if (Str::lower(trim($parent->title)) === 'servicios') {
                $isServicios = true;
                break;
            }
            $parent = $parent->parent ?? null;
        }
    ?>
    <?php if($node->career && !$isDuplicated && trim($node->title) !== trim($node->career->name)): ?>
        <?php if($isPresencial): ?>
            <?php $presencialesMostradas[] = $node->career->id; ?>
        <?php elseif($isDual): ?>
            <?php $dualesMostradas[] = $node->career->id; ?>
        <?php endif; ?>
        <li class="mobile-tree-item mobile-tree-level-<?php echo e($level); ?>">
            <a href="<?php echo e(route('career.show', $node->career->slug)); ?>" class="mobile-tree-link"><?php echo e($node->career->name); ?></a>
        </li>
    <?php endif; ?>
    <?php if($hasChildren): ?>
        <li class="mobile-tree-item mobile-tree-level-<?php echo e($level); ?>">
            <details class="mobile-tree-details">
                <summary class="mobile-menu__summary mobile-tree-summary">
                    <?php if($node->career && trim($node->title) === trim($node->career->name)): ?>
                        <a href="<?php echo e(route('career.show', $node->career->slug)); ?>" class="mobile-tree-link" style="display:inline;"><?php echo e($node->title); ?></a>
                    <?php else: ?>
                        <?php echo e($node->title); ?>

                    <?php endif; ?>
                </summary>
                <ul class="mobile-menu__children mobile-tree-children">
                    <?php echo $__env->make('public.partials.menu.mobile_nodes', ['nodes' => $node->childrenRecursive, 'level' => $level + 1, 'presencialesMostradas' => $presencialesMostradas, 'dualesMostradas' => $dualesMostradas], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </ul>
            </details>
        </li>
    <?php elseif(!$node->career): ?>
        <li class="mobile-tree-item mobile-tree-level-<?php echo e($level); ?>">
            <?php if($node->pdf_file): ?>
                <a href="<?php echo e(asset($node->pdf_file)); ?>" class="mobile-tree-link" target="_blank" rel="noopener"><?php echo e($node->title); ?></a>
            <?php else: ?>
                <a href="<?php echo e(url($node->url ?: '#')); ?>" class="mobile-tree-link" <?php if($isServicios): ?> target="_blank" rel="noopener" <?php endif; ?>><?php echo e($node->title); ?></a>
            <?php endif; ?>
        </li>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\workspace\ists\resources\views/public/partials/menu/mobile_nodes.blade.php ENDPATH**/ ?>