

<?php $__env->startSection('content'); ?>
<!-- Page Header -->
<section class="visit-page-header">
    <div class="container text-center">
        <h1 class="visit-page-title"><?php echo e($section->title); ?></h1>
    </div>
</section>

<!-- Content Section -->
<section class="visit-content-area">
    <div class="container">
        <div class="visit-box">
            <div class="visit-text-content">
                <?php if($section->mission): ?>
                <h2 class="section-title">Nuestra Misión</h2>
                <p><?php echo e($section->mission); ?></p>
                <?php endif; ?>

                <?php if($section->functions && count($section->functions) > 0): ?>
                <h3 class="section-subtitle">Funciones Principales</h3>
                <ul class="feature-list">
                    <?php $__currentLoopData = $section->functions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $function): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($function); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <?php endif; ?>

                <?php if($section->additional_info): ?>
                <div class="mt-4">
                    <p><?php echo e($section->additional_info); ?></p>
                </div>
                <?php endif; ?>

                <?php if($section->schedule || $section->location || $section->phone || $section->email): ?>
                <h3 class="section-subtitle">Información de Contacto</h3>
                <div class="contact-info">
                    <?php if($section->schedule): ?>
                        <p><strong>Horario de Atención:</strong> <?php echo e($section->schedule); ?></p>
                    <?php endif; ?>
                    <?php if($section->location): ?>
                        <p><strong>Ubicación:</strong> <?php echo e($section->location); ?></p>
                    <?php endif; ?>
                    <?php if($section->phone): ?>
                        <p><strong>Teléfono:</strong> <?php echo e($section->phone); ?></p>
                    <?php endif; ?>
                    <?php if($section->email): ?>
                        <p><strong>Email:</strong> <?php echo e($section->email); ?></p>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php echo $__env->make('public.visitar.partials.visit-styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views\public\visitar\section.blade.php ENDPATH**/ ?>