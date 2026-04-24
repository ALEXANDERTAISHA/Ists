                        


<?php $__env->startSection('title', 'Crear Carrera'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Crear Nueva Carrera / Coordinación</h1>
        <a href="<?php echo e(route('admin.careers.index')); ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Volver
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(route('admin.careers.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="row">
                    <div class="col-md-8">

                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre de la Carrera *</label>
                            <input type="text"
                                   class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   id="name"
                                   name="name"
                                   value="<?php echo e(old('name')); ?>"
                                   required>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>


                        <div class="mb-3">
                            <label for="academic_section_id" class="form-label">Sección Académica</label>
                            <select class="form-select <?php $__errorArgs = ['academic_section_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="academic_section_id"
                                    name="academic_section_id">
                                <option value="">-- Seleccione una sección --</option>
                                <?php $__currentLoopData = $academicSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($section->id); ?>" <?php echo e(old('academic_section_id') == $section->id ? 'selected' : ''); ?>>
                                        <?php echo e($section->title); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['academic_section_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug (URL amigable)</label>
                            <input type="text"
                                   class="form-control <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   id="slug"
                                   name="slug"
                                   value="<?php echo e(old('slug')); ?>"
                                   placeholder="Se genera automáticamente si se deja vacío">
                            <small class="text-muted">Ejemplo: desarrollo-software, contabilidad</small>
                            <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Resumen</label>
                            <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                      id="description"
                                      name="description"
                                      rows="3"><?php echo e(old('description')); ?></textarea>
                            <small class="text-muted">Breve resumen que aparecerá en listados</small>
                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <label for="full_description" class="form-label">Descripción Completa</label>
                            <textarea class="form-control <?php $__errorArgs = ['full_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                      id="full_description"
                                      name="full_description"
                                      rows="6"><?php echo e(old('full_description')); ?></textarea>
                            <small class="text-muted">Descripción detallada que aparecerá en la página de la carrera</small>
                            <?php $__errorArgs = ['full_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <label for="professional_profile" class="form-label">Perfil Profesional</label>
                            <textarea class="form-control <?php $__errorArgs = ['professional_profile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                      id="professional_profile"
                                      name="professional_profile"
                                      rows="6"><?php echo e(old('professional_profile')); ?></textarea>
                            <small class="text-muted">Competencias y habilidades del egresado</small>
                            <?php $__errorArgs = ['professional_profile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="image" class="form-label">Imagen Principal (Sección 1)</label>
                            <div id="imagePreviewWrap1" class="mb-2 career-preview-frame d-none">
                                <img id="imagePreview1" src="" alt="Preview imagen principal" class="career-preview-img">
                            </div>
                            <div id="imageEmpty1" class="mb-2 career-preview-empty">Sin imagen principal</div>
                            <input type="file"
                                   class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   id="image"
                                   name="image"
                                   accept="image/*">
                            <small class="text-muted">JPG, PNG o WEBP. Máximo 2MB</small>
                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <label for="image_2" class="form-label">Imagen Secundaria (Sección 2)</label>
                            <div id="imagePreviewWrap2" class="mb-2 career-preview-frame d-none">
                                <img id="imagePreview2" src="" alt="Preview imagen secundaria" class="career-preview-img">
                            </div>
                            <div id="imageEmpty2" class="mb-2 career-preview-empty">Sin imagen secundaria</div>
                            <input type="file"
                                   class="form-control <?php $__errorArgs = ['image_2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   id="image_2"
                                   name="image_2"
                                   accept="image/*">
                            <small class="text-muted">JPG, PNG o WEBP. Máximo 2MB</small>
                            <?php $__errorArgs = ['image_2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <label for="curriculum_pdf" class="form-label">Malla Curricular (PDF)</label>
                            <input type="file"
                                   class="form-control <?php $__errorArgs = ['curriculum_pdf'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   id="curriculum_pdf"
                                   name="curriculum_pdf"
                                   accept="application/pdf">
                            <small class="text-muted">PDF. Máximo 5MB</small>
                            <div class="mt-2">
                                <span class="text-info small">La opción para ver o descargar el PDF estará disponible después de crear la carrera.</span>
                            </div>
                            <?php $__errorArgs = ['curriculum_pdf'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <label for="coordinator" class="form-label">Coordinador de Carrera</label>
                            <input type="text"
                                   class="form-control <?php $__errorArgs = ['coordinator'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   id="coordinator"
                                   name="coordinator"
                                   value="<?php echo e(old('coordinator')); ?>">
                            <?php $__errorArgs = ['coordinator'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <label for="coordinator_email" class="form-label">Email del Coordinador</label>
                            <input type="email"
                                   class="form-control <?php $__errorArgs = ['coordinator_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   id="coordinator_email"
                                   name="coordinator_email"
                                   value="<?php echo e(old('coordinator_email')); ?>">
                            <?php $__errorArgs = ['coordinator_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <label for="sort_order" class="form-label">Orden de visualización</label>
                            <input type="number"
                                   class="form-control <?php $__errorArgs = ['sort_order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   id="sort_order"
                                   name="sort_order"
                                   value="<?php echo e(old('sort_order', 0)); ?>"
                                   min="0">
                            <small class="text-muted">Menor número aparece primero</small>
                            <?php $__errorArgs = ['sort_order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input"
                                       type="checkbox"
                                       id="is_active"
                                       name="is_active"
                                       <?php echo e(old('is_active', true) ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="is_active">
                                    Carrera Activa
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="admin-action-buttons mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-1"></i> Crear Carrera
                    </button>
                    <a href="<?php echo e(route('admin.careers.index')); ?>" class="btn btn-secondary">
                        <i class="bi bi-x-circle me-1"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.tiny.cloud/1/tr5q9gaoe9ca3hwsq6nah42q8dqhrtqznrl0gd9523anjatx/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const bindImagePreview = (inputId, wrapId, imageId, emptyId) => {
            const input = document.getElementById(inputId);
            const wrap = document.getElementById(wrapId);
            const image = document.getElementById(imageId);
            const empty = document.getElementById(emptyId);

            if (!input || !wrap || !image || !empty) return;

            input.addEventListener('change', function() {
                if (!this.files || !this.files[0]) return;

                if (this.files[0].size > 2097152) {
                    alert('La imagen es muy grande. El tamaño máximo es 2MB.');
                    this.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    image.src = e.target.result;
                    wrap.classList.remove('d-none');
                    empty.classList.add('d-none');
                };
                reader.readAsDataURL(this.files[0]);
            });
        };

        bindImagePreview('image', 'imagePreviewWrap1', 'imagePreview1', 'imageEmpty1');
        bindImagePreview('image_2', 'imagePreviewWrap2', 'imagePreview2', 'imageEmpty2');

        tinymce.init({
            selector: '#description, #full_description, #professional_profile',
            plugins: 'lists link image table code fullscreen advlist',
            toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image table | code fullscreen',
            menubar: false,
            branding: false,
            height: 250,
            language: 'es',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
            setup: function (editor) {
                editor.on('init', function () {
                    editor.formatter.register('alignjustify', {
                        inline: 'span',
                        styles: { 'text-align': 'justify' },
                        selector: 'p,h1,h2,h3,h4,h5,h6,div',
                        classes: 'justificado'
                    });
                });
            },
            toolbar_mode: 'sliding',
            advlist_bullet_styles: 'default',
            advlist_number_styles: 'default',
        });
    });
</script>
<style>
    .career-preview-frame {
        width: 100%;
        max-width: 240px;
        height: 140px;
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid #d9e2ec;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        background: #f8fafc;
    }

    .career-preview-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        display: block;
    }

    .career-preview-empty {
        width: 100%;
        max-width: 240px;
        height: 140px;
        border: 1px dashed #c3ceda;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #64748b;
        font-size: 0.9rem;
        background: #f8fafc;
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views\admin\careers\create.blade.php ENDPATH**/ ?>