<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Slide - ISTS Admin</title>
    <link rel="stylesheet" href="<?php echo e(asset('public/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/css/admin.css')); ?>">
</head>
<body>
    <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container">
        <h2>Crear Nuevo Slide</h2>

        <?php if(session('error')): ?>
            <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
        <?php endif; ?>

        <form action="<?php echo e(url('/admin/heroslides/store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="subtitle">Subtítulo</label>
                <textarea id="subtitle" name="subtitle" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="image">Imagen</label>
                <input type="file" id="image" name="image" class="form-control-file" required>
            </div>

            <div class="form-group">
                <label for="link">Enlace (URL)</label>
                <input type="url" id="link" name="link" class="form-control" placeholder="https://ejemplo.com">
            </div>

            <div class="form-group">
                <label for="sort_order">Orden de Aparición</label>
                <input type="number" id="sort_order" name="sort_order" class="form-control" value="0">
            </div>

            <div class="form-check">
                <input type="checkbox" id="is_active" name="is_active" class="form-check-input" value="1" checked>
                <label for="is_active" class="form-check-label">Activo</label>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Guardar Slide</button>
            <a href="<?php echo e(url('/admin/heroslides')); ?>" class="btn btn-secondary mt-3">Cancelar</a>
        </form>
    </div>

    <?php echo $__env->make('admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\workspace\ists\resources\views\admin\crud\slides\create.blade.php ENDPATH**/ ?>