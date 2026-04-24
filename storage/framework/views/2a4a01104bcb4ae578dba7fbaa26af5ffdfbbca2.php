

<?php $__env->startSection('title', 'Crear Elemento del Menú - ISTS Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-0">
    <div class="card" style="border:1px solid #dbe7f7; border-radius:16px; box-shadow:0 10px 24px rgba(15,23,42,0.08);">
        <div class="card-body p-4 p-md-5">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4" style="gap:0.7rem;">
                <div>
                    <h3 class="mb-1" style="font-weight:800; color:#0f172a;">Crear Elemento del Menú</h3>
                    <p class="mb-0" style="color:#64748b;">Puedes crear menús principales o submenús.</p>
                </div>
                <a href="<?php echo e(route('admin.menu-items.index')); ?>" class="btn" style="background:#e2e8f0; color:#0f172a; font-weight:700; border-radius:10px;">Volver</a>
            </div>

            <form action="<?php echo e(route('admin.menu-items.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <label for="title" class="form-label" style="font-weight:700;">Título</label>
                        <input type="text" name="title" id="title" class="form-control" value="<?php echo e(old('title')); ?>" required>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="system_key" class="form-label" style="font-weight:700;">Clave del sistema (opcional)</label>
                        <input type="text" name="system_key" id="system_key" class="form-control" value="<?php echo e(old('system_key')); ?>" placeholder="Ej: DOCUMENTOS">
                        <small style="color:#94a3b8;">Recomendado para claves especiales como ACERCA, ACADEMICOS, DOCUMENTOS.</small>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="pdf_file" class="form-label" style="font-weight:700;">Archivo PDF (opcional)</label>
                        <input type="file" name="pdf_file" id="pdf_file" class="form-control" accept="application/pdf">
                        <small style="color:#94a3b8;">Puedes adjuntar un archivo PDF para este menú.</small>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="url" class="form-label" style="font-weight:700;">URL</label>
                        <input type="text" name="url" id="url" class="form-control" value="<?php echo e(old('url')); ?>" placeholder="Ej: /acerca">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="parent_id" class="form-label" style="font-weight:700;">Menú padre (opcional)</label>
                        <select name="parent_id" id="parent_id" class="form-select">
                            <option value="">Ninguno (menú principal)</option>
                            <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($parent['id']); ?>" <?php echo e((string) old('parent_id', $selectedParentId) === (string) $parent['id'] ? 'selected' : ''); ?>><?php echo e($parent['label']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="order" class="form-label" style="font-weight:700;">Orden</label>
                        <input type="number" name="order" id="order" class="form-control" value="<?php echo e(old('order', 0)); ?>">
                    </div>

                    <div class="col-12 col-md-6 d-flex align-items-end">
                        <div class="form-check form-switch" style="padding-left:2.5rem;">
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" <?php echo e(old('is_active', true) ? 'checked' : ''); ?>>
                            <label for="is_active" class="form-check-label" style="font-weight:700;">Activo</label>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="career_id" class="form-label" style="font-weight:700;">Vincular a carrera (opcional)</label>
                        <select name="career_id" id="career_id" class="form-select">
                            <option value="">Ninguna</option>
                            <?php $__currentLoopData = $careers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $career): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($career->id); ?>" <?php echo e(old('career_id') == $career->id ? 'selected' : ''); ?>><?php echo e($career->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <small style="color:#94a3b8;">Puedes vincular este menú a una carrera específica.</small>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="category" class="form-label" style="font-weight:700;">Categoría (opcional)</label>
                        <input type="text" name="category" id="category" class="form-control" value="<?php echo e(old('category')); ?>" placeholder="Ej: Institucional, Académico, Servicios">
                        <small style="color:#94a3b8;">Puedes agrupar los menús por categoría para una mejor organización.</small>
                    </div>
                </div>

                <div class="admin-action-buttons mt-4">
                    <a href="<?php echo e(route('admin.menu-items.index')); ?>" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views\admin\crud\menu_items\create.blade.php ENDPATH**/ ?>