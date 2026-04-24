

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Editar Rector</h1>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.contents.rector.update')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>


        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $rector->name ?? '')); ?>">
        </div>

        <div class="form-group">
            <label>Cargo</label>
            <input type="text" name="position" class="form-control" value="<?php echo e(old('position', $rector->position ?? '')); ?>" placeholder="e.g. Rector, Director(a)">
        </div>

        <div class="form-group">
            <label>Título académico</label>
            <input type="text" name="academic_title" class="form-control" value="<?php echo e(old('academic_title', $rector->academic_title ?? '')); ?>" placeholder="e.g. Ph.D., MSc, Ing.">
        </div>

        <div class="form-group">
            <label>Mensaje (completo)</label>
            <textarea name="message" id="rector-message-editor" class="form-control" rows="6"><?php echo e(old('message', $rector->message ?? '')); ?></textarea>
        </div>

        <div class="form-group">
            <label>Imagen (jpg, png)</label>
            <?php if(!empty($rector->image_path)): ?>
                <div><img src="<?php echo e(asset('storage/' . $rector->image_path)); ?>" style="max-width:200px;"></div>
            <?php endif; ?>
            <input type="file" name="image" accept="image/*" class="form-control">
        </div>

        <div class="form-group">
            <label><input type="checkbox" name="is_active" value="1" <?php echo e((!empty($rector->is_active) ? 'checked' : '')); ?>> Mostrar en la página pública</label>
        </div>

        <button class="btn btn-primary">Guardar</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.tiny.cloud/1/<?php echo e(env('TINYMCE_API_KEY')); ?>/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#rector-message-editor',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        height: 300
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views\admin\rector\edit.blade.php ENDPATH**/ ?>