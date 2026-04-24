<?php $__currentLoopData = $campusItem->contents()->where('is_active', true)->orderBy('date', 'desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="campus-content-block">
        <h3><?php echo e($content->title); ?></h3>
        <?php if($content->date): ?>
            <div class="meta">Fecha: <?php echo e($content->date); ?></div>
        <?php endif; ?>
        <div class="description"><?php echo $content->description; ?></div>
        <?php if($content->external_url): ?>
            <div><a href="<?php echo e($content->external_url); ?>" target="_blank" class="btn btn-outline-primary">Enlace externo</a></div>
        <?php endif; ?>
        <?php if($content->pdf_url): ?>
            <div><a href="<?php echo e(asset($content->pdf_url)); ?>" target="_blank" class="pdf-pro-link">Ver PDF</a></div>
        <?php endif; ?>
        <?php if($content->contact_name || $content->contact_email || $content->contact_phone): ?>
            <div class="contact-info">
                <strong>Contacto:</strong>
                <ul>
                    <?php if($content->contact_name): ?><li>Nombre: <?php echo e($content->contact_name); ?></li><?php endif; ?>
                    <?php if($content->contact_email): ?><li>Email: <a href="mailto:<?php echo e($content->contact_email); ?>"><?php echo e($content->contact_email); ?></a></li><?php endif; ?>
                    <?php if($content->contact_phone): ?><li>Teléfono: <?php echo e($content->contact_phone); ?></li><?php endif; ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if($content->form_html): ?>
            <div class="custom-form"><?php echo $content->form_html; ?></div>
        <?php endif; ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\workspace\ists\resources\views\public\campus\item_contents.blade.php ENDPATH**/ ?>