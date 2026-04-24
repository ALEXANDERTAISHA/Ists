<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Equipo Directivo</title>
    <link rel="stylesheet" href="<?php echo e(asset('public/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/css/admin.css')); ?>">
</head>
<body>
    <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Gestión de Equipo Directivo</h1>
            <a href="<?php echo e(url('/admin/leadership/create')); ?>" class="btn btn-primary">
                 <i class="bi bi-person-plus"></i> Añadir Miembro
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Orden</th>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Cargo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($member->display_order); ?></td>
                                    <td>
                                        <img src="<?php echo e(asset($member->image_path)); ?>" alt="<?php echo e($member->name); ?>" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                    </td>
                                    <td><?php echo e($member->name); ?></td>
                                    <td><?php echo e($member->position); ?></td>
                                    <td>
                                        <a href="<?php echo e(url('/admin/leadership/edit/' . $member->id)); ?>" class="btn btn-sm btn-edit" title="Editar">
                                                <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="<?php echo e(url('/admin/leadership/delete/' . $member->id)); ?>" method="POST" style="display: inline;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este miembro?')">
                                                   <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="text-center">No hay miembros registrados.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\workspace\ists\resources\views\admin\crud\leadership\list.blade.php ENDPATH**/ ?>