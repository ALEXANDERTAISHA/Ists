

<?php $__env->startSection('content'); ?>
<div class="admin-content">
    <div class="dashboard-header">
        <h1>📚 Configurar Enlace de Biblioteca</h1>
        <p>Configura el enlace externo que aparecerá en el menú Servicios del sitio público.</p>
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
            <form action="<?php echo e(route('admin.settings.biblioteca.update')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                
                <div class="form-group">
                    <label for="biblioteca_url">URL de la Biblioteca</label>
                    <input type="url" 
                           name="biblioteca_url" 
                           id="biblioteca_url" 
                           class="form-control" 
                           value="<?php echo e(old('biblioteca_url', $bibliotecaUrl ?? '')); ?>"
                           placeholder="https://biblioteca.ejemplo.com"
                           required>
                    <small class="form-text text-muted">
                        Ingresa la URL completa del sistema de biblioteca (debe comenzar con http:// o https://)
                    </small>
                </div>

                <div class="alert alert-info mt-3">
                    <strong>ℹ️ Nota:</strong> Este enlace se abrirá en una nueva pestaña cuando los usuarios hagan clic en "Biblioteca" desde el menú Servicios.
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">💾 Guardar Configuración</button>
                    <a href="<?php echo e(route('admin.dashboard')); ?>#seccion-servicios" class="btn btn-secondary">← Volver al Dashboard</a>
                </div>
            </form>
        </div>
    </div>

    <?php if($bibliotecaUrl): ?>
    <div class="card mt-3">
        <div class="card-body">
            <h4>Vista Previa</h4>
            <p>Enlace actual: <a href="<?php echo e($bibliotecaUrl); ?>" target="_blank" rel="noopener noreferrer"><?php echo e($bibliotecaUrl); ?> ↗</a></p>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views\admin\settings\biblioteca.blade.php ENDPATH**/ ?>