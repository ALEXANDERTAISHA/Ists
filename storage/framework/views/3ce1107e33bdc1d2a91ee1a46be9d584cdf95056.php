<?php
    $node = $node ?? [];
    $children = $node['children'] ?? [];
    $hasChildren = !empty($children);
    $rawFile = $node['file_url'] ?? $node['pdf_url'] ?? null;

    if (!empty($rawFile)) {
        if (filter_var($rawFile, FILTER_VALIDATE_URL)) {
            $fileLink = $rawFile;
        } elseif (strpos($rawFile, '/uploads') === 0 || strpos($rawFile, 'uploads/') === 0) {
            $fileLink = asset(ltrim($rawFile, '/'));
        } else {
            $fileLink = asset('storage/' . ltrim($rawFile, '/'));
        }
    } else {
        $fileLink = null;
    }

    $detailLink = !empty($node['slug']) ? route('transparency.show', $node['slug']) : '#';
    $folderClass = empty($fileLink) ? 'tree-folder tree-folder--empty' : 'tree-folder';
?>

<?php if($hasChildren): ?>
    <details class="<?php echo e($folderClass); ?>" open style="--tree-level: <?php echo e((int)($level ?? 0)); ?>;">
        <summary>
            <span class="tree-caret">▶</span>
            <span>📁</span>
            <a href="<?php echo e($detailLink); ?>" class="tree-title-link"><?php echo e($node['title'] ?? 'Sin título'); ?></a>
        </summary>
        <div class="tree-body">
            <?php if(!empty($node['description'])): ?>
                <div style="color:#334155; margin-bottom: 0.35rem;"><?php echo e($node['description']); ?></div>
            <?php endif; ?>

            <?php if($fileLink): ?>
                <a href="<?php echo e($fileLink); ?>" target="_blank" class="tree-file-link pdf-pro-link">📄 Ver PDF</a>
            <?php endif; ?>

            <div class="tree-children">
                <?php $__currentLoopData = $children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('public.transparency.partials.tree-node', ['node' => $child, 'level' => ($level ?? 0) + 1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </details>
<?php else: ?>
    <div class="<?php echo e($folderClass); ?>" style="--tree-level: <?php echo e((int)($level ?? 0)); ?>;">
        <div class="tree-body tree-body--leaf <?php if($fileLink): ?> pdf-card-premium <?php endif; ?>">
            <div style="display:flex; flex-wrap: wrap; align-items:center; gap:0.55rem;">
                <?php if($fileLink): ?>
                    <span class="pdf-card-premium-icon">
                        <svg viewBox="0 0 32 32" fill="none" width="32" height="32">
                            <rect width="32" height="32" rx="8" fill="#fff2f2"/>
                            <path d="M10 8a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V12.828a2 2 0 0 0-.586-1.414l-3.828-3.828A2 2 0 0 0 17.172 7H10Zm0 2h7v3a2 2 0 0 0 2 2h3v8a1 1 0 0 1-1 1H10a1 1 0 0 1-1-1V10a1 1 0 0 1 1-1Zm9 0.414L24.586 14H19a1 1 0 0 1-1-1V8.414Z" fill="#c62828"/>
                        </svg>
                    </span>
                <?php else: ?>
                    <span>📁</span>
                <?php endif; ?>
                <a href="<?php echo e($detailLink); ?>" class="tree-title-link <?php if($fileLink): ?> pdf-card-premium-title <?php endif; ?>" style="font-weight:700;"><?php echo e($node['title'] ?? 'Sin título'); ?></a>
                <?php if($fileLink): ?>
                    <a href="<?php echo e($fileLink); ?>" target="_blank" class="tree-file-link pdf-pro-link" style="margin-top:0; color:#fff; font-weight:600;">Ver PDF</a>
                <?php endif; ?>
            </div>
            <?php if(!empty($node['description'])): ?>
                <div style="margin-top:0.45rem; color:#fff;"><?php echo e($node['description']); ?></div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\workspace\ists\resources\views\public\transparency\partials\tree-node.blade.php ENDPATH**/ ?>