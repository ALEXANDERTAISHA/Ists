

<?php $__env->startSection('title', 'Gestión de Carreras'); ?>

<?php $__env->startSection('content'); ?>
<div class="card admin-page-card admin-page-card--careers" style="border-radius: 18px; box-shadow: 0 2px 16px rgba(0,158,96,0.10); margin-top: 2.5rem; max-width: 1100px; margin-left:auto; margin-right:auto;">
    <div class="card-body p-5">
        <div class="mb-4 d-flex flex-column flex-md-row align-items-center justify-content-between admin-page-header" style="gap:1.2rem;">
            <h1 class="fw-bold mb-0" style="font-size:2.1rem; color:#1a3c34; letter-spacing:-1px; display:flex;align-items:center;gap:0.5em;">
                <i class="bi bi-mortarboard" style="font-size:1.8rem; color: var(--admin-primary);"></i> Gestión de Carreras
            </h1>
            <a href="<?php echo e(route('admin.careers.create')); ?>" class="btn-new"><i class="bi bi-plus-lg"></i> Nueva Carrera</a>
        </div>
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo e(session('success')); ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
        <?php endif; ?>
        <div class="table-responsive">
            <table class="table align-middle" style="border-radius: 12px; overflow: hidden;">
                <thead style="background: linear-gradient(90deg,#009e60,#0e3e49 90%); color: #fff;">
                    <tr>
                        <th style="width: 80px;">Imagen</th>
                        <th>Nombre</th>
                        <th>Coordinador</th>
                        <th style="width: 100px;">Orden</th>
                        <th style="width: 100px;">Estado</th>
                        <th style="width: 220px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $careerIcons = [
                            'desarrollo-software' => [
                                'bg'  => 'linear-gradient(135deg,#1e3a8a 0%,#2563eb 100%)',
                                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="30" height="30"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/><line x1="12" y1="2" x2="12" y2="22"/></svg>',
                            ],
                            'agroecologia' => [
                                'bg'  => 'linear-gradient(135deg,#065f46 0%,#059669 100%)',
                                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="30" height="30"><path d="M12 22V12"/><path d="M5 3a7 7 0 0 1 14 0c0 5-7 9-7 9S5 8 5 3z"/></svg>',
                            ],
                            'contabilidad-y-asesoria-tributaria' => [
                                'bg'  => 'linear-gradient(135deg,#78350f 0%,#d97706 100%)',
                                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="30" height="30"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/><path d="M7 8h.01M12 8h.01M17 8h.01M7 12h10"/></svg>',
                            ],
                            'educacion-inicial' => [
                                'bg'  => 'linear-gradient(135deg,#701a75 0%,#c026d3 100%)',
                                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="30" height="30"><path d="M12 3L2 9l10 6 10-6-10-6z"/><path d="M2 9v6l10 6 10-6V9"/><path d="M12 15v6"/></svg>',
                            ],
                        ];
                    ?>
                    <?php $__empty_1 = true; $__currentLoopData = $careers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $career): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php
                            $icon = $careerIcons[$career->slug] ?? ['bg' => 'linear-gradient(135deg,#334155 0%,#64748b 100%)', 'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="30" height="30"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>'];
                            $img1Ok = $career->image_path && file_exists(public_path('storage/' . ltrim($career->image_path, '/')));
                            $img2Ok = $career->image_path_2 && file_exists(public_path('storage/' . ltrim($career->image_path_2, '/')));
                        ?>
                        <tr>
                            <td>
                                <?php if($img1Ok): ?>
                                    <img src="<?php echo e(asset('storage/' . ltrim($career->image_path, '/'))); ?>" alt="<?php echo e($career->name); ?>" style="width:60px;height:60px;border-radius:10px;object-fit:cover;display:block;box-shadow:0 4px 12px rgba(0,0,0,0.18);">
                                <?php else: ?>
                                    <div style="width:60px;height:60px;border-radius:10px;background:<?php echo e($icon['bg']); ?>;display:flex;align-items:center;justify-content:center;box-shadow:0 4px 12px rgba(0,0,0,0.18);">
                                        <?php echo $icon['svg']; ?>

                                    </div>
                                <?php endif; ?>
                            </td>
                            <td style="font-weight:600;">
                                <?php echo e($career->name); ?>

                                <?php if($career->description): ?>
                                    <br><small class="text-muted"><?php echo e(Str::limit($career->description, 60)); ?></small>
                                <?php endif; ?>
                                <?php if(!$img1Ok || !$img2Ok): ?>
                                    <br><small class="badge" style="background: #ff6b6b; color: white; font-size: 10px;">⚠️ Falta<?php echo e(!$img1Ok && !$img2Ok ? 'n' : ''); ?> imagen<?php echo e(!$img1Ok && !$img2Ok ? 'es' : ''); ?></small>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e($career->coordinator ?? '-'); ?>

                                <?php if($career->coordinator_email): ?>
                                    <br><small class="text-muted"><?php echo e($career->coordinator_email); ?></small>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($career->sort_order); ?></td>
                            <td>
                                <span class="badge" style="background:<?php echo e($career->is_active ? '#009e60' : '#f9d423'); ?>;color:#fff; font-weight:600; border-radius:6px; padding:0.4em 1em; font-size:0.98em;">
                                    <?php echo e($career->is_active ? 'Activa' : 'Inactiva'); ?>

                                </span>
                            </td>
                            <td class="admin-actions-cell" style="display:flex; gap:0.5em;">
                                <a href="<?php echo e(route('career.show', $career->slug)); ?>" class="btn btn-view btn-sm" target="_blank"><i class="bi bi-eye"></i> Ver</a>
                                <form action="<?php echo e(route('admin.careers.destroy', $career)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta carrera?');"><i class="bi bi-trash"></i> Eliminar</button>
                                </form>
                                <a href="<?php echo e(route('admin.careers.edit', $career)); ?>" class="btn btn-edit btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">No hay carreras registradas.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views\admin\careers\index.blade.php ENDPATH**/ ?>