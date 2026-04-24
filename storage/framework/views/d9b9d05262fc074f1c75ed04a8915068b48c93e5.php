

<?php $__env->startSection('content'); ?>
<div class="admin-content">
    <div class="dashboard-section">
        <div class="section-header">
            <h2>Confirmar Eliminación</h2>
            <p>Esta acción no se puede deshacer</p>
        </div>

        <div style="padding: 2rem;">
            <div class="delete-warning">
                <div class="warning-icon">⚠️</div>
                <h3>¿Estás seguro de eliminar este contenido?</h3>
                <p>Esta acción eliminará permanentemente el contenido y no se puede deshacer.</p>
            </div>

            <div class="content-preview">
                <h4>Contenido a eliminar:</h4>
                <div class="preview-card">
                    <h5><?php echo e($content['title'] ?? 'Sin título'); ?></h5>
                    <p><strong>Categoría:</strong> <?php echo e(ucfirst(str_replace('-', ' ', $content['category'] ?? 'Sin categoría'))); ?></p>
                    <p><strong>Estado:</strong> 
                        <span class="badge badge-<?php echo e($content['status'] ?? 'draft'); ?>">
                            <?php echo e(ucfirst($content['status'] ?? 'draft')); ?>

                        </span>
                    </p>
                    <p><strong>Autor:</strong> <?php echo e($content['author_name'] ?? 'Admin'); ?></p>
                    <p><strong>Vistas:</strong> <?php echo e(number_format($content['views'] ?? 0)); ?></p>
                    <p><strong>Creado:</strong> <?php echo e(date('d/m/Y H:i', strtotime($content['created_at'] ?? ''))); ?></p>
                </div>
            </div>

            <form method="POST" action="<?php echo e(route('contents.delete', $content['id'] ?? '')); ?>" id="delete-form">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="confirm_delete" value="1">
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-danger" id="confirm-btn">
                        🗑️ Eliminar Definitivamente
                    </button>
                    <a href="<?php echo e(route('contents.index')); ?>" class="btn btn-secondary">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    document.getElementById('delete-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const confirmText = prompt('Para confirmar la eliminación, escribe "ELIMINAR" (en mayúsculas):');
        
        if (confirmText === 'ELIMINAR') {
            const confirmBtn = document.getElementById('confirm-btn');
            confirmBtn.textContent = 'Eliminando...';
            confirmBtn.disabled = true;
            this.submit();
        } else {
            alert('Eliminación cancelada. Debes escribir "ELIMINAR" para confirmar.');
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views\admin\crud\contents\delete.blade.php ENDPATH**/ ?>