<?php $__env->startSection('content'); ?>
<div class="admin-content">
    <div class="dashboard-header">
        <h1><i class="bi bi-person-gear"></i> Editar Miembro</h1>
        <p>Modifica el formulario para editar un miembro del equipo.</p>
    </div>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.leadership.update', $item)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo e(old('name', $item->name)); ?>" required>
        </div>
        <div class="form-group">
            <label for="position">Cargo</label>
            <input type="text" name="position" id="position" class="form-control" value="<?php echo e(old('position', $item->position)); ?>" required>
        </div>
        <div class="form-group">
            <label for="bio">Biografía</label>
            <textarea name="bio" id="bio" class="form-control" rows="5"><?php echo e(old('bio', $item->bio)); ?></textarea>
        </div>
        <div class="form-group">
            <label for="image">Imagen</label>
            <input type="file" name="image" id="image" class="form-control">
            <?php if($item->image_path): ?>
                <img src="<?php echo e(asset('storage/' . $item->image_path)); ?>" alt="Imagen actual" style="max-width: 200px; margin-top: 10px;">
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="order">Orden</label>
            <input type="number" name="order" id="order" class="form-control" value="<?php echo e(old('order', $item->order)); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Miembro</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views\admin\leadership\edit.blade.php ENDPATH**/ ?>