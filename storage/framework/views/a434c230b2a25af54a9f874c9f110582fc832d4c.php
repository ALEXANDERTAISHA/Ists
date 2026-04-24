
<div class="table-responsive" style="margin-top:1.5rem;">
    <table class="table table-bordered table-hover align-middle" style="background:#fff; border-radius:12px; overflow:hidden;">
        <thead class="table-light">
            <tr style="background:#f3f6fd; color:#2563eb;">
                <th style="width:60px;">#</th>
                <th style="min-width:180px;">Nombre</th>
                <th style="min-width:150px;">Teléfono</th>
                <th style="min-width:180px;">Carrera</th>
                <th style="min-width:180px;">Fecha de Registro</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td style="text-align:center;font-weight:600;"><?php echo e($contact->id); ?></td>
                    <td style="text-transform:capitalize;">👤 <?php echo e(ucwords(strtolower($contact->nombre))); ?></td>
                    <td><span class="badge bg-success" style="font-size:1rem;letter-spacing:1px;"><?php echo e($contact->telefono); ?></span></td>
                    <td><?php echo e($contact->carrera); ?></td>
                    <td><span style="color:#1976d2;font-weight:500;"><?php echo e($contact->created_at->format('d/m/Y H:i')); ?></span></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center">No hay contactos registrados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<div class="mt-3">
    <?php echo e($contacts->links()); ?>

</div>
<?php /**PATH C:\workspace\ists\resources\views\admin\chatbot\contacts_table.blade.php ENDPATH**/ ?>