

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <h1 class="mb-4">Índice A-Z</h1>
    <ul class="nav nav-tabs mb-4" id="azTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="personas-tab" data-bs-toggle="tab" data-bs-target="#personas" type="button" role="tab">Personas</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="areas-tab" data-bs-toggle="tab" data-bs-target="#areas" type="button" role="tab">Áreas/Servicios</button>
        </li>
    </ul>
    <div class="tab-content" id="azTabsContent">
        <div class="tab-pane fade show active" id="personas" role="tabpanel">
            <h3 class="mb-3">Personas</h3>
            <input type="text" class="form-control mb-3" placeholder="Buscar persona...">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $personas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($p->name ?? ($p->first_name . ' ' . $p->last_name)); ?></td>
                            <td><?php echo e($p->email); ?></td>
                            <td><?php echo e($p->role ?? '-'); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="areas" role="tabpanel">
            <h3 class="mb-3">Áreas y Servicios</h3>
            <input type="text" class="form-control mb-3" placeholder="Buscar área o servicio...">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Nombre/Título</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $carreras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>Carrera</td>
                            <td><?php echo e($c->name); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $secciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>Sección Académica</td>
                            <td><?php echo e($s->name); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $srv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>Servicio</td>
                            <td><?php echo e($srv->title); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views\admin\azindex\index.blade.php ENDPATH**/ ?>