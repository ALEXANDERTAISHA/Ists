

<?php $__env->startSection('content'); ?>
<div class="admin-content">
    <div class="dashboard-header">
        <h1>🎓 Configurar Seguimiento a Graduados</h1>
        <p>Configura el enlace externo del sistema de seguimiento a graduados que aparecerá en el menú Servicios.</p>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(route('admin.settings.graduados.update')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                
                <div class="form-group">
                    <label for="seguimiento_graduados_url">URL del Sistema de Seguimiento a Graduados</label>
                    <input type="url" 
                           name="seguimiento_graduados_url" 
                           id="seguimiento_graduados_url" 
                           class="form-control" 
                           value="<?php echo e(old('seguimiento_graduados_url', $graduadosUrl ?? '')); ?>"
                           placeholder="https://graduados.ejemplo.com"
                           required>
                    <small class="form-text text-muted">
                        Ingresa la URL completa del sistema de seguimiento a graduados (debe comenzar con http:// o https://)
                    </small>
                </div>

                <div class="alert alert-info mt-3">
                    <strong>ℹ️ Nota:</strong> Este enlace se abrirá en una nueva pestaña cuando los usuarios hagan clic en "Seguimiento a Graduados" desde el menú Servicios.
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">💾 Guardar Configuración</button>
                    <a href="<?php echo e(route('admin.dashboard')); ?>#seccion-servicios" class="btn btn-secondary">← Volver al Dashboard</a>
                </div>
            </form>
        </div>
    </div>

    <?php if($graduadosUrl): ?>
    <div class="card mt-3">
        <div class="card-body">
            <h4>Vista Previa</h4>
            <p>Enlace actual: <a href="<?php echo e($graduadosUrl); ?>" target="_blank" rel="noopener noreferrer"><?php echo e($graduadosUrl); ?> ↗</a></p>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views\admin\settings\graduados.blade.php ENDPATH**/ ?>