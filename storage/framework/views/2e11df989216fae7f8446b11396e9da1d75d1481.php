

<?php $__env->startSection('content'); ?>

<div class="container my-4">
    <div class="card shadow-sm mx-auto" style="max-width:900px;">
        <div class="card-body pb-0">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <div class="d-flex align-items-center gap-3">
                    <span style="font-size:2.2rem; color:#2563eb;">🕒</span>
                    <h2 class="fw-bold mb-0" style="font-size:1.7rem; letter-spacing:0.5px;">Nuevo Evento - Línea de Tiempo</h2>
                </div>
                <a href="<?php echo e(route('admin.timeline.index')); ?>" class="btn btn-outline-primary fw-bold">← Volver</a>
            </div>
        </div>
    </div>

    <form action="<?php echo e(route('admin.timeline.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label>Año</label>
            <input type="number" name="year" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Título</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="is_public" class="form-check-input" id="is_public" checked>
            <label class="form-check-label" for="is_public">Visible públicamente</label>
        </div>
        <button class="btn btn-primary">Crear</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views\admin\timeline\create.blade.php ENDPATH**/ ?>