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
    ?>
    <li class="menu-tree-item menu-tree-level-<?php echo e($level); ?><?php echo e($hasChildren ? ' has-children' : ''); ?>">
        <div class="menu-tree-row">
            <?php
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
            <?php if($hasChildren && !(Str::lower(trim($node->title)) === 'reglamento')): ?>
                <?php if($node->career && trim($node->title) === trim($node->career->name)): ?>
                    <a href="<?php echo e(route('career.show', $node->career->slug)); ?>" class="menu-tree-link menu-tree-link--no-nav" tabindex="0"><?php echo e($node->title); ?></a>
                <?php else: ?>
                    <a href="#" class="menu-tree-link menu-tree-link--no-nav" tabindex="0"><?php echo e($node->title); ?></a>
                <?php endif; ?>
                <button type="button" class="menu-tree-toggle" aria-label="Desplegar submenu">▶</button>
            <?php else: ?>
                <?php if($node->career && trim($node->title) === trim($node->career->name)): ?>
                    <a href="<?php echo e(route('career.show', $node->career->slug)); ?>" class="menu-tree-link"><?php echo e($node->title); ?></a>
                <?php elseif($node->pdf_file): ?>
                    <a href="<?php echo e(asset($node->pdf_file)); ?>" class="menu-tree-link" target="_blank" rel="noopener"><?php echo e($node->title); ?></a>
                <?php else: ?>
                    <a href="<?php echo e(url($node->url ?: '#')); ?>" class="menu-tree-link" <?php if($isServicios): ?> target="_blank" rel="noopener" <?php endif; ?>><?php echo e($node->title); ?></a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.menu-tree-link--no-nav').forEach(function(link) {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                    });
                });
            });
        </script>
        <?php if($hasChildren && !(Str::lower(trim($node->title)) === 'reglamento')): ?>
            <ul class="menu-tree-children menu-tree-children-level-<?php echo e($level + 1); ?>">
                <?php echo $__env->make('public.partials.menu.desktop_nodes', ['nodes' => $node->childrenRecursive, 'level' => $level + 1, 'presencialesMostradas' => $presencialesMostradas, 'dualesMostradas' => $dualesMostradas], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </ul>
        <?php endif; ?>
        <?php if($node->career && !$isDuplicated && trim($node->title) !== trim($node->career->name)): ?>
            <?php if($isPresencial): ?>
                <?php $presencialesMostradas[] = $node->career->id; ?>
            <?php elseif($isDual): ?>
                <?php $dualesMostradas[] = $node->career->id; ?>
            <?php endif; ?>
            <li class="menu-tree-item menu-tree-level-<?php echo e($level + 1); ?>">
                <div class="menu-tree-row">
                    <a href="<?php echo e(route('career.show', $node->career->slug)); ?>" class="menu-tree-link"><?php echo e($node->career->name); ?></a>
                </div>
            </li>
        <?php endif; ?>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\workspace\ists\resources\views/public/partials/menu/desktop_nodes.blade.php ENDPATH**/ ?>