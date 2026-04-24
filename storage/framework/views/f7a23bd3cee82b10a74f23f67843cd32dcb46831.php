<?php $__env->startSection('content'); ?>
<div class="teachers-panel">
    <div class="teachers-panel__head">
        <div>
            <h1 class="teachers-title"><i class="bi bi-person-workspace"></i> Gestión de Planta Docente</h1>
            <p class="teachers-subtitle">Administra perfiles, documentos y orden de visualización de docentes.</p>
        </div>
        <a href="<?php echo e(route('admin.teachers.create')); ?>" class="teachers-btn-create">
            <i class="bi bi-plus-lg"></i>
            Añadir Docente
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo e(session('success')); ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="teachers-table-wrap table-responsive">
        <table class="table teachers-table align-middle mb-0">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Título</th>
                    <th>Departamento</th>
                    <th>PDF</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><span class="teachers-order"><?php echo e($item->order); ?></span></td>
                        <td>
                            <?php if($item->image_path): ?>
                                <img src="<?php echo e(asset('storage/' . $item->image_path)); ?>" alt="<?php echo e($item->name); ?>" class="teachers-avatar">
                            <?php else: ?>
                                <div class="teachers-avatar teachers-avatar--fallback">
                                    <i class="bi bi-person"></i>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="teachers-name"><?php echo e($item->name); ?></td>
                        <td><?php echo e($item->title); ?></td>
                        <td><?php echo e($item->department); ?></td>
                        <td>
                            <?php if($item->pdf_path): ?>
                                <a href="<?php echo e(asset('storage/' . $item->pdf_path)); ?>" target="_blank" class="teachers-pdf-link" title="Abrir PDF">
                                    <span class="teachers-pdf-link__icon"><i class="bi bi-file-earmark-pdf-fill"></i></span>
                                    <span>Ver PDF</span>
                                </a>
                            <?php else: ?>
                                <span class="teachers-no-pdf">Sin PDF</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="teachers-actions">
                                <a href="<?php echo e(route('admin.teachers.edit', $item)); ?>" class="teachers-btn teachers-btn--edit" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                    Editar
                                </a>
                                <form action="<?php echo e(route('admin.teachers.destroy', $item)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="teachers-btn teachers-btn--delete" title="Eliminar" onclick="return confirm('¿Estás seguro de que quieres eliminar a este docente?');">
                                        <i class="bi bi-trash"></i>
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <?php echo e($items->links()); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views\admin\teachers\index.blade.php ENDPATH**/ ?>