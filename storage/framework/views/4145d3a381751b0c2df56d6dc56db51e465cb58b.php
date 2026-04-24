<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Slides - ISTS Admin</title>
    <link rel="stylesheet" href="<?php echo e(asset('public/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/css/admin.css')); ?>">
</head>
<body>
    <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container">
        <h2>Gestionar Slides del Carrusel</h2>
        <a href="<?php echo e(url('/admin/heroslides/create')); ?>" class="btn btn-primary mb-3">Crear Nuevo Slide</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Título</th>
                    <th>Orden</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($slide['id']); ?></td>
                    <td><img src="<?php echo e(asset($slide['image_path'])); ?>" alt="" width="150"></td>
                    <td><?php echo e($slide['title']); ?></td>
                    <td><?php echo e($slide['sort_order']); ?></td>
                    <td><?php echo e($slide['is_active'] ? 'Sí' : 'No'); ?></td>
                    <td>
                        <a href="<?php echo e(url('/admin/heroslides/edit/' . $slide['id'])); ?>" class="btn btn-sm btn-edit"><i class="bi bi-pencil-square"></i> Editar</a>
                        <form action="<?php echo e(url('/admin/heroslides/delete/' . $slide['id'])); ?>" method="POST" style="display: inline-block;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este slide?');">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <?php echo $__env->make('admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\workspace\ists\resources\views\admin\crud\slides\list.blade.php ENDPATH**/ ?>