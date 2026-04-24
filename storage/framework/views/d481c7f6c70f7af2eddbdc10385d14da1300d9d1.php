

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Rectoría</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if($rector): ?>
        <div class="card">
            <div class="card-body">
                <h3><?php echo e($rector->name); ?></h3>
                <?php if(!empty($rector->position) || !empty($rector->academic_title)): ?>
                    <p class="text-muted">
                        <?php if(!empty($rector->position)): ?><strong><?php echo e($rector->position); ?></strong><?php endif; ?>
                        <?php if(!empty($rector->position) && !empty($rector->academic_title)): ?> — <?php endif; ?>
                        <?php if(!empty($rector->academic_title)): ?><?php echo e($rector->academic_title); ?><?php endif; ?>
                    </p>
                <?php endif; ?>
                <?php if($rector->image_path): ?>
                    <img src="<?php echo e(asset('storage/' . $rector->image_path)); ?>" alt="Rector" style="max-width:200px;">
                <?php endif; ?>
                <p><?php echo e(Str::limit($rector->message, 250)); ?></p>
                <a href="<?php echo e(route('admin.contents.rector.edit')); ?>" class="btn btn-primary">Editar</a>
            </div>
        </div>
    <?php else: ?>
        <p>No hay información del rector todavía.</p>
        <a href="<?php echo e(route('admin.contents.rector.create')); ?>" class="btn btn-primary">Crear</a>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views\admin\rector\index.blade.php ENDPATH**/ ?>