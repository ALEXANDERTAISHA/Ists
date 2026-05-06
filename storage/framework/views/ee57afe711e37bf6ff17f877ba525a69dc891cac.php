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
        $nodeUrl = trim((string) $node->url);
        $hasCustomUrl = $nodeUrl !== '' && $nodeUrl !== '#';
        $nodeHref = $hasCustomUrl ? url($nodeUrl) : null;
        $hasDesignLanding = !$node->career && $node->hasOwnDesignPresentation();
    ?>
    <li class="menu-tree-item menu-tree-level-<?php echo e($level); ?><?php echo e($hasChildren ? ' has-children' : ''); ?>">
        <div class="menu-tree-row">
            <?php
                $isServicios = false;
                $parent = $node->parent ?? null;
                while ($parent) {
                    if (Str::lower(trim($parent->title)) === 'servicios') {
                        $isServicios = true;
                        break;
                    }
                    $parent = $parent->parent ?? null;
                }

                $rootParent = $node;
                while ($rootParent && $rootParent->parent) {
                    $rootParent = $rootParent->parent;
                }
                $rootParentTitle = $rootParent ? Str::lower(trim($rootParent->title)) : null;
                $shouldOpenFolderView = $hasDesignLanding;
            ?>

            <?php if($hasCustomUrl): ?>
                <a href="<?php echo e($nodeHref); ?>" class="menu-tree-link" <?php if($isServicios): ?> target="_blank" rel="noopener" onclick="window.open(this.href, '_blank', 'noopener'); return false;" <?php endif; ?>><?php echo e($node->title); ?></a>
            <?php elseif($hasChildren && !(Str::lower(trim($node->title)) === 'reglamento')): ?>
                <?php if($level === 0): ?>
                    <?php if($shouldOpenFolderView): ?>
                        <a href="<?php echo e(route('public.menu-designs.show', $node->id)); ?>" class="menu-tree-link" tabindex="0"><?php echo e($node->title); ?></a>
                    <?php else: ?>
                        <a href="#" class="menu-tree-link menu-tree-link--no-nav" tabindex="0"><?php echo e($node->title); ?></a>
                        <button type="button" class="menu-tree-toggle" aria-label="Desplegar submenu">▶</button>
                    <?php endif; ?>
                <?php else: ?>
                    <a href="<?php echo e(route('public.menu-designs.show', $node->id)); ?>" class="menu-tree-link" tabindex="0"><?php echo e($node->title); ?></a>
                <?php endif; ?>
            <?php elseif($node->career && trim($node->title) === trim($node->career->name)): ?>
                <a href="<?php echo e(route('career.show', $node->career->slug)); ?>" class="menu-tree-link"><?php echo e($node->title); ?></a>
            <?php elseif($node->pdf_file): ?>
                <a href="<?php echo e(asset($node->pdf_file)); ?>" class="menu-tree-link" target="_blank" rel="noopener"><?php echo e($node->title); ?></a>
            <?php elseif($node->hasOwnDesignPresentation()): ?>
                <a href="<?php echo e(route('public.menu-designs.show', $node->id)); ?>" class="menu-tree-link"><?php echo e($node->title); ?></a>
            <?php else: ?>
                <a href="#" class="menu-tree-link menu-tree-link--no-nav"><?php echo e($node->title); ?></a>
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

        <?php if($hasChildren && $level === 0 && !(Str::lower(trim($node->title)) === 'reglamento') && !$hasDesignLanding): ?>
            <ul class="menu-tree-children menu-tree-children-level-<?php echo e($level + 1); ?> menu-premium-panel">
                <?php $__currentLoopData = $node->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $childUrl = trim((string) $child->url);
                        $childHasCustomUrl = $childUrl !== '' && $childUrl !== '#';
                        $childHref = $childHasCustomUrl ? url($childUrl) : null;
                    ?>
                    <li class="menu-tree-item menu-tree-level-<?php echo e($level + 1); ?>">
                        <div class="menu-tree-row">
                            <?php if($childHasCustomUrl): ?>
                                <a href="<?php echo e($childHref); ?>" class="menu-tree-link" <?php if($isServicios): ?> target="_blank" rel="noopener" onclick="window.open(this.href, '_blank', 'noopener'); return false;" <?php endif; ?>><?php echo e($child->title); ?></a>
                            <?php elseif($child->career && $child->career->slug): ?>
                                <a href="<?php echo e(route('career.show', $child->career->slug)); ?>" class="menu-tree-link"><?php echo e($child->title); ?></a>
                            <?php elseif($child->pdf_file): ?>
                                <a href="<?php echo e(asset($child->pdf_file)); ?>" class="menu-tree-link" target="_blank" rel="noopener"><?php echo e($child->title); ?></a>
                            <?php elseif($child->hasBrowsableDesignContent()): ?>
                                <a href="<?php echo e(route('public.menu-designs.show', $child->id)); ?>" class="menu-tree-link"><?php echo e($child->title); ?></a>
                            <?php else: ?>
                                <span class="menu-tree-link"><?php echo e($child->title); ?></span>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <?php if($hasCustomUrl): ?>
                        <a href="<?php echo e($nodeHref); ?>" class="menu-tree-link" <?php if($isServicios): ?> target="_blank" rel="noopener" onclick="window.open(this.href, '_blank', 'noopener'); return false;" <?php endif; ?>><?php echo e($node->career->name); ?></a>
                    <?php elseif($node->career && $node->career->slug): ?>
                        <a href="<?php echo e(route('career.show', $node->career->slug)); ?>" class="menu-tree-link"><?php echo e($node->career->name); ?></a>
                    <?php else: ?>
                        <span class="menu-tree-link"><?php echo e($node->career->name); ?></span>
                    <?php endif; ?>
                </div>
            </li>
        <?php endif; ?>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\workspace\ists\resources\views/public/partials/menu/desktop_nodes.blade.php ENDPATH**/ ?>