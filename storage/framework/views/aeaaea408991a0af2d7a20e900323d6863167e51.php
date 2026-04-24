<?php
    $indent = max(0, ((int) ($level ?? 0)) * 20);
    $nodeId = 'menu-node-' . $item->id;
    $isExpanded = false;
?>

<div id="<?php echo e($nodeId); ?>" style="margin-left: <?php echo e($indent); ?>px; border:1px solid #e2e8f0; border-radius:12px; overflow:hidden; margin-bottom:10px;">
    <div class="d-flex flex-wrap justify-content-between align-items-center" style="padding:0.9rem 1rem; background:<?php echo e(($level ?? 0) === 0 ? '#f8fafc' : '#ffffff'); ?>; gap:0.7rem;">
        <div style="display:flex; align-items:center; gap:0.7rem;">
            <button type="button" class="btn btn-sm btn-light" onclick="toggleMenuNode('<?php echo e($nodeId); ?>')" style="font-size:1.1rem; border-radius:6px; border:1px solid #e2e8f0; padding:0.2rem 0.6rem;">
                <span id="icon-<?php echo e($nodeId); ?>"><?php echo e($isExpanded ? '-' : '+'); ?></span>
            </button>
            <div>
                <div style="font-weight:800; color:#0f172a;">
                    <?php if(($level ?? 0) > 0): ?>
                        <span style="color:#94a3b8; margin-right:6px;"><?php echo e(str_repeat('->', (int) $level)); ?></span>
                    <?php endif; ?>
                    <?php echo e($item->title); ?>

                </div>
                <div style="font-size:0.86rem; color:#64748b;">
                    URL: <?php echo e($item->url ?: '#'); ?> | Orden: <?php echo e($item->order ?? 0); ?> | Estado: <?php echo e($item->is_active ? 'Activo' : 'Inactivo'); ?>

                    <?php if($item->pdf_file): ?>
                        <br>PDF: <a href="<?php echo e(asset($item->pdf_file)); ?>" target="_blank" style="color:#0ea5a8; text-decoration:underline;">Ver PDF</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="d-flex flex-wrap" style="gap:0.45rem;">
            <a href="<?php echo e(route('admin.menu-items.create', ['parent_id' => $item->id])); ?>" class="btn btn-sm" style="background:#dbeafe; color:#1d4ed8; font-weight:700; border-radius:8px;">+ Submenu</a>
            <a href="<?php echo e(route('admin.menu-items.edit', $item)); ?>" class="btn btn-sm" style="background:#e2e8f0; color:#0f172a; font-weight:700; border-radius:8px;">Editar</a>
            <a href="<?php echo e(route('admin.menu-items.designs.create', $item->id)); ?>" class="btn btn-sm" style="background:linear-gradient(135deg,#fbbf24,#6366f1); color:#fff; font-weight:700; border-radius:8px; box-shadow:0 4px 12px rgba(99,102,241,0.12);">Agregar Diseño</a>
            <?php if($item->pdfs && $item->pdfs->count()): ?>
                <a href="<?php echo e(route('admin.menu-items.designs.edit', [$item->id, $item->pdfs->first()->id])); ?>" class="btn btn-sm" style="background:linear-gradient(135deg,#6366f1,#0ea5a8); color:#fff; font-weight:700; border-radius:8px; box-shadow:0 4px 12px rgba(14,165,168,0.12);">Editar Diseño</a>
            <?php endif; ?>
            <?php if($item->url): ?>
                <a href="<?php echo e($item->url); ?>" class="btn btn-sm" style="background:#f1f5f9; color:#0ea5a8; font-weight:700; border-radius:8px;" target="_blank">Abrir enlace</a>
            <?php endif; ?>
            <form action="<?php echo e(route('admin.menu-items.destroy', $item)); ?>" method="POST" onsubmit="return confirm('¿Eliminar este menú y sus submenús?');">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-sm" style="background:#fee2e2; color:#b91c1c; font-weight:700; border-radius:8px;">Eliminar</button>
            </form>
        </div>
    </div>
    <div class="menu-node-children" style="display: <?php echo e($isExpanded ? 'block' : 'none'); ?>;">
        <?php if($item->career): ?>
            <div style="margin-left: <?php echo e(($indent + 20)); ?>px; border:1px solid #e0f2fe; border-radius:10px; margin-bottom:8px; background:#f0f9ff;">
                <div class="d-flex flex-wrap justify-content-between align-items-center" style="padding:0.7rem 1rem; gap:0.7rem;">
                    <div>
                        <div style="font-weight:700; color:#2563eb;">
                            <span style="color:#94a3b8; margin-right:6px;">-></span>
                            <?php echo e($item->career->name); ?> <span class="badge bg-info text-dark ms-2">Carrera vinculada</span>
                        </div>
                        <div style="font-size:0.86rem; color:#64748b;">
                            URL: <?php echo e(url('/carrera/' . $item->career->slug)); ?>

                        </div>
                    </div>
                    <div class="d-flex flex-wrap" style="gap:0.45rem;">
                        <a href="<?php echo e(url('/carrera/' . $item->career->slug)); ?>" class="btn btn-sm" style="background:#dbeafe; color:#1d4ed8; font-weight:700; border-radius:8px;" target="_blank">Ver carrera</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if($item->childrenRecursive && $item->childrenRecursive->count()): ?>
            <?php $__currentLoopData = $item->childrenRecursive; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('admin.crud.menu_items.partials.tree_node', ['item' => $child, 'level' => ($level ?? 0) + 1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\workspace\ists\resources\views\admin\crud\menu_items\partials\tree_node.blade.php ENDPATH**/ ?>