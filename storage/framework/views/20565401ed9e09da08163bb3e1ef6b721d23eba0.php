

<?php $__env->startSection('content'); ?>
<div class="admin-content">
    <div class="dashboard-section">
        <div class="section-header">
            <h2><?php echo e($title ?? 'Editar'); ?></h2>
        </div>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e($action_link . ($item['id'] ?? '')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <?php if($type === 'users'): ?>
                <div class="form-group">
                    <label for="username">Nombre de usuario</label>
                    <input type="text" id="username" name="username" class="form-control" value="<?php echo e($item['username'] ?? ''); ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?php echo e($item['email'] ?? ''); ?>" required>
                </div>

                <div class="form-group">
                    <label for="password">Nueva Contraseña (dejar en blanco para no cambiar)</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <label for="role">Rol</label>
                    <select id="role" name="role" class="form-control">
                        <option value="user" <?php echo e(($item['role'] ?? '') === 'user' ? 'selected' : ''); ?>>Usuario</option>
                        <option value="editor" <?php echo e(($item['role'] ?? '') === 'editor' ? 'selected' : ''); ?>>Editor</option>
                        <option value="admin" <?php echo e(($item['role'] ?? '') === 'admin' ? 'selected' : ''); ?>>Administrador</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Estado</label>
                    <select id="status" name="status" class="form-control">
                        <option value="active" <?php echo e(($item['status'] ?? '') === 'active' ? 'selected' : ''); ?>>Activo</option>
                        <option value="inactive" <?php echo e(($item['status'] ?? '') === 'inactive' ? 'selected' : ''); ?>>Inactivo</option>
                        <option value="suspended" <?php echo e(($item['status'] ?? '') === 'suspended' ? 'selected' : ''); ?>>Suspendido</option>
                    </select>
                </div>
            <?php elseif($type === 'contents'): ?>
                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" id="title" name="title" class="form-control" value="<?php echo e($item['title'] ?? ''); ?>" required>
                </div>

                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea id="description" name="description" class="form-control" rows="3" required><?php echo e($item['description'] ?? ''); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="content">Contenido</label>
                    <textarea id="content" name="content" class="form-control" rows="10" required><?php echo e($item['content'] ?? ''); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="category">Categoría</label>
                    <input type="text" id="category" name="category" class="form-control" value="<?php echo e($item['category'] ?? ''); ?>">
                </div>

                <div class="form-group">
                    <label for="status">Estado</label>
                    <select id="status" name="status" class="form-control">
                        <option value="draft" <?php echo e(($item['status'] ?? '') === 'draft' ? 'selected' : ''); ?>>Borrador</option>
                        <option value="published" <?php echo e(($item['status'] ?? '') === 'published' ? 'selected' : ''); ?>>Publicado</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="image_file">Subir Nueva Imagen (dejar en blanco para no cambiar)</label>
                    <input type="file" id="image_file" name="image_file" class="form-control">

                    <?php if(!empty($item['image_url'])): ?>
                        <div class="current-image">
                            <p>Imagen actual:</p>
                            <img src="<?php echo e($item['image_url']); ?>" alt="Imagen actual" style="max-width: 200px; margin-top: 10px;">
                        </div>
                    <?php endif; ?>
                </div>
            <?php elseif($type === 'news'): ?>
                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" id="title" name="title" class="form-control" value="<?php echo e($item['title'] ?? ''); ?>" required>
                </div>

                <div class="form-group">
                    <label for="summary">Resumen</label>
                    <textarea id="summary" name="summary" class="form-control" rows="3" required><?php echo e($item['summary'] ?? ''); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="content">Contenido</label>
                    <textarea id="content" name="content" class="form-control" rows="10" required><?php echo e($item['content'] ?? ''); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="image_file">Subir Nueva Imagen (dejar en blanco para no cambiar)</label>
                    <input type="file" id="image_file" name="image_file" class="form-control">

                    <?php if(!empty($item['image_url'])): ?>
                        <div class="current-image">
                            <p>Imagen actual:</p>
                            <img src="<?php echo e($item['image_url']); ?>" alt="Imagen actual" style="max-width: 200px; margin-top: 10px;">
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="<?php echo e($cancel_link); ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views\admin\crud\edit.blade.php ENDPATH**/ ?>