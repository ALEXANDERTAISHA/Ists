

<?php $__env->startSection('content'); ?>
<div class="admin-content">
    <h2>Envíos de formulario para: <?php echo e($content->title); ?></h2>
    <?php if($submissions->count() === 0): ?>
        <p>No hay envíos registrados.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombres</th>
                    <th>Cédula</th>
                    <th>Carrera</th>
                    <th>Ciclo</th>
                    <th>Nivel</th>
                    <th>Institución</th>
                    <th>PDF</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $submissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($submission->nombres); ?></td>
                    <td><?php echo e($submission->cedula); ?></td>
                    <td><?php echo e($submission->carrera); ?></td>
                    <td><?php echo e($submission->ciclo); ?></td>
                    <td><?php echo e($submission->nivel); ?></td>
                    <td><?php echo e($submission->institucion); ?></td>
                    <td>
                        <?php if($submission->pdf_path): ?>
                            <a href="<?php echo e(asset($submission->pdf_path)); ?>" target="_blank" class="pdf-pro-link">Ver PDF</a>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($submission->created_at->format('d/m/Y H:i')); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views\admin\campus-item-contents\submissions.blade.php ENDPATH**/ ?>