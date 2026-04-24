

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h1><?php echo e($title ?? 'Listado de Registros'); ?></h1>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <?php $__currentLoopData = $headers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th><?php echo e($header); ?></th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <?php $__currentLoopData = $record; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td><?php echo e($field); ?></td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <td>
                                    <a href="<?php echo e(url("/admin/$type/edit/" . $record['id'])); ?>" class="btn btn-sm btn-edit"><i class="bi bi-pencil-square"></i> Editar</a>
                                    <form action="<?php echo e(url("/admin/$type/delete/" . $record['id'])); ?>" method="POST" style="display:inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este registro?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="<?php echo e(count($headers) + 1); ?>" class="text-center">No hay registros disponibles.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views\admin\crud\list.blade.php ENDPATH**/ ?>