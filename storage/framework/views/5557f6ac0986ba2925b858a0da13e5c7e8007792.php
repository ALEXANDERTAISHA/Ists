

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <h2>Editar Evento - Línea de Tiempo</h2>

    <form action="<?php echo e(route('admin.timeline.update', $event)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label>Año</label>
            <input type="number" name="year" class="form-control" value="<?php echo e($event->year); ?>" required>
        </div>
        <div class="mb-3">
            <label>Título</label>
            <input type="text" name="title" class="form-control" value="<?php echo e($event->title); ?>">
        </div>
        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="description" class="form-control" rows="4"><?php echo e($event->description); ?></textarea>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="is_public" class="form-check-input" id="is_public" <?php echo e($event->is_public ? 'checked' : ''); ?>>
            <label class="form-check-label" for="is_public">Visible públicamente</label>
        </div>
        <button class="btn btn-primary">Guardar</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views\admin\timeline\edit.blade.php ENDPATH**/ ?>