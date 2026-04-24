<?php $__env->startSection('title', 'Agregar Diseño al Menú'); ?>
<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="card premium-shadow" style="border-radius:18px;">
        <div class="card-body p-5">
            <h2 class="mb-4" style="font-weight:800; color:#0f172a;">Agregar Diseño a: <span style="color:#0ea5a8"><?php echo e($menuItem->title); ?></span></h2>
            <form action="<?php echo e(route('admin.menu-items.designs.store', $menuItem->id)); ?>" method="POST" enctype="multipart/form-data" id="designForm">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Título del diseño</label>
                    <input type="text" name="title" id="title" class="form-control form-control-lg" required>
                </div>
                <div class="mb-3">
                    <label for="main_description" class="form-label fw-bold">Resumen</label>
                    <textarea name="main_description" id="main_description" class="form-control form-control-lg"></textarea>
                    <div class="form-text">Breve resumen que aparecerá en listados</div>
                </div>
                <div class="mb-3">
                    <label for="main_description_2" class="form-label fw-bold">Resumen 2</label>
                    <textarea name="main_description_2" id="main_description_2" class="form-control form-control-lg"></textarea>
                    <div class="form-text">Segundo bloque de contenido para mostrar en la vista pública</div>
                </div>
                <div class="mb-3">
                    <label for="main_image" class="form-label fw-bold">Imagen Principal</label>
                    <input type="file" name="main_image" id="main_image" class="form-control form-control-lg" accept="image/*">
                    <div class="form-text">Opcional. Imagen destacada para la vista principal</div>
                </div>
                <div class="mb-3">
                    <label for="parent_id" class="form-label fw-bold">Menú o Submenú destino</label>
                    <select name="parent_id" id="parent_id" class="form-select form-select-lg" required>
                        <option value="">Seleccione menú o submenú</option>
                        <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($parent['id']); ?>" <?php echo e($parent['id'] == $menuItem->id ? 'selected' : ''); ?>><?php echo e($parent['label']); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pdf_files" class="form-label fw-bold">Subir PDFs (puedes seleccionar varios)</label>
                    <input type="file" name="pdf_files[]" id="pdf_files" class="form-control form-control-lg" accept="application/pdf" multiple onchange="previewPDFs(event)">
                    <div class="form-text">Opcional. Puedes guardar el diseño aunque no subas PDFs.</div>
                </div>
                <div class="mb-3 form-check form-switch">
                    <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" checked>
                    <label for="is_active" class="form-check-label">Activo</label>
                </div>
                <div id="pdf-preview-list" class="mb-4"></div>
                <div class="d-flex gap-3 mt-4">
                    <button type="submit" class="btn btn-lg" style="background:linear-gradient(135deg,#0ea5a8,#2563eb); color:#fff; font-weight:700; border-radius:12px; box-shadow:0 8px 20px rgba(37,99,235,0.18);">Guardar Diseño(s)</button>
                    <a href="<?php echo e(route('admin.menu-items.index')); ?>" class="btn btn-lg btn-secondary" style="border-radius:12px;">Cancelar</a>
                </div>
            </form>
            <?php echo $__env->make('admin.crud.menu_items.designs.partials.tinymce', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div id="pdf-preview-modal" style="display:none;">
                <iframe id="pdf-preview-frame" style="width:100%;height:600px;border-radius:12px;border:2px solid #e0e7ef;"></iframe>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
function previewPDFs(event) {
    const files = event.target.files;
    const previewList = document.getElementById('pdf-preview-list');
    previewList.innerHTML = '';
    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const fileDiv = document.createElement('div');
        fileDiv.className = 'mb-2 d-flex align-items-center gap-2';
        fileDiv.innerHTML = `<span class='badge bg-gradient' style='background:linear-gradient(135deg,#6366f1,#0ea5a8);color:#fff;font-size:1rem;'>${file.name}</span> <button type='button' class='btn btn-sm btn-outline-primary' onclick='showPDFPreview(${i})'>Vista previa</button>`;
        previewList.appendChild(fileDiv);
    }
    window.pdfFiles = files;
}
function showPDFPreview(index) {
    const file = window.pdfFiles[index];
    const reader = new FileReader();
    reader.onload = function(e) {
        const modal = document.getElementById('pdf-preview-modal');
        const frame = document.getElementById('pdf-preview-frame');
        frame.src = e.target.result;
        modal.style.display = 'block';
        frame.scrollIntoView({behavior:'smooth'});
    };
    reader.readAsDataURL(file);
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views\admin\crud\menu_items\designs\create.blade.php ENDPATH**/ ?>