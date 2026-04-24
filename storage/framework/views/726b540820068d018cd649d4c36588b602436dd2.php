

<?php $__env->startSection('content'); ?>
<div class="admin-container">
    <div class="admin-content">
        <div class="dashboard-header">
            <h1>👥 Crear Nuevo Usuario</h1>
            <p>Completa el formulario para agregar un nuevo usuario al sistema.</p>
        </div>

        <div class="form-container">
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('users.create')); ?>" class="styled-form">
                <?php echo csrf_field(); ?>

                <div class="form-card">
                    <div class="form-group">
                        <label for="username">Nombre de usuario</label>
                        <input type="text" id="username" name="username" class="form-control" value="<?php echo e(old('username')); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Rol</label>
                        <select id="role" name="role" class="form-control">
                            <option value="user" <?php echo e(old('role') === 'user' ? 'selected' : ''); ?>>Usuario</option>
                            <option value="editor" <?php echo e(old('role') === 'editor' ? 'selected' : ''); ?>>Editor</option>
                            <option value="admin" <?php echo e(old('role') === 'admin' ? 'selected' : ''); ?>>Administrador</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Estado</label>
                        <select id="status" name="status" class="form-control">
                            <option value="active" <?php echo e(old('status') === 'active' ? 'selected' : ''); ?>>Activo</option>
                            <option value="inactive" <?php echo e(old('status') === 'inactive' ? 'selected' : ''); ?>>Inactivo</option>
                            <option value="suspended" <?php echo e(old('status') === 'suspended' ? 'selected' : ''); ?>>Suspendido</option>
                        </select>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Crear Usuario</button>
                    <a href="<?php echo e(route('users.index')); ?>" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views\admin\crud\create.blade.php ENDPATH**/ ?>