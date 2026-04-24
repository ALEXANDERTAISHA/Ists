

<?php $__env->startSection('content'); ?>
<style>
    .event-gallery-shell {
        position: relative;
        border-radius: 20px;
        padding: 0.75rem;
        background: linear-gradient(135deg, rgba(0, 121, 107, 0.15), rgba(13, 110, 253, 0.14));
        box-shadow: 0 18px 45px rgba(0, 121, 107, 0.18);
        overflow: hidden;
    }

    .event-gallery-shell::before {
        content: "";
        position: absolute;
        inset: -35% -55% auto;
        height: 220px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.55) 0%, rgba(255, 255, 255, 0) 70%);
        animation: galleryShimmer 6s linear infinite;
        pointer-events: none;
    }

    @keyframes galleryShimmer {
        from { transform: translateX(-35%) rotate(8deg); }
        to { transform: translateX(35%) rotate(8deg); }
    }

    .event-gallery-shell .carousel-inner {
        border-radius: 16px;
        overflow: hidden;
        background: #082f2d;
    }

    .event-gallery-image {
        width: 100%;
        height: clamp(260px, 45vw, 420px);
        object-fit: cover;
        transform: scale(1.02);
        transition: transform 0.7s ease, filter 0.7s ease;
        filter: saturate(1.05) contrast(1.03);
    }

    .event-gallery-shell:hover .event-gallery-image {
        transform: scale(1.08);
        filter: saturate(1.14) contrast(1.08);
    }

    .event-gallery-badge {
        position: absolute;
        left: 14px;
        top: 14px;
        z-index: 3;
        background: rgba(7, 59, 76, 0.8);
        color: #fff;
        font-size: 0.74rem;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        padding: 0.4rem 0.65rem;
        border-radius: 999px;
        border: 1px solid rgba(255, 255, 255, 0.35);
        backdrop-filter: blur(6px);
    }

    .event-gallery-hint {
        position: absolute;
        right: 14px;
        bottom: 14px;
        z-index: 3;
        margin: 0;
        font-size: 0.75rem;
        font-weight: 600;
        color: #fff;
        background: rgba(0, 0, 0, 0.45);
        padding: 0.3rem 0.6rem;
        border-radius: 10px;
        backdrop-filter: blur(4px);
    }

    @media (max-width: 767px) {
        .event-gallery-shell {
            margin-top: 1rem;
        }
    }
</style>

<div class="container py-4">
    <a href="<?php echo e(route('public.events.index')); ?>" class="btn btn-secondary mb-3">← Volver a eventos</a>
    <div class="row">
        <div class="col-md-8">
            <h1 style="margin-top:2cm; text-align:center; font-size:2.2rem; font-weight:800; color:#00796b; margin-bottom:1.2rem; letter-spacing:-1px;">
                <?php echo e($event->title); ?>

            </h1>
            <p><strong>Fecha:</strong> <?php echo e($event->date->format('d/m/Y')); ?></p>
            <p><strong>Lugar:</strong> <?php echo e($event->place); ?></p>
            <div class="mb-3"><?php echo $event->description; ?></div>
            <?php if($event->files->count()): ?>
                <h5>Archivos adjuntos</h5>
                <ul>
                    <?php $__currentLoopData = $event->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(asset('storage/' . $file->file_path)); ?>" target="_blank"><?php echo e($file->file_name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
            <?php if($event->links->count()): ?>
                <h5>Enlaces relacionados</h5>
                <ul>
                    <?php $__currentLoopData = $event->links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e($link->url); ?>" target="_blank"><?php echo e($link->label ?: $link->url); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <?php if($event->images->count()): ?>
                <div id="eventGallery" class="carousel slide mb-3 event-gallery-shell" data-bs-ride="carousel" data-bs-interval="3000">
                    <span class="event-gallery-badge">Galeria destacada</span>
                    <div class="carousel-inner">
                        <?php $__currentLoopData = $event->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="carousel-item <?php echo e($loop->first ? 'active' : ''); ?>">
                                <img src="<?php echo e(asset('storage/' . $img->image_path)); ?>" class="d-block w-100 event-gallery-image" alt="Imagen del evento <?php echo e($event->title); ?>">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <p class="event-gallery-hint">Pasa el cursor para resaltar</p>
                    
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const gallery = document.getElementById('eventGallery');
        if (!gallery) return;

        gallery.addEventListener('mousemove', function (e) {
            const rect = gallery.getBoundingClientRect();
            const x = ((e.clientX - rect.left) / rect.width) - 0.5;
            const y = ((e.clientY - rect.top) / rect.height) - 0.5;
            gallery.style.transform = `perspective(900px) rotateY(${x * 4}deg) rotateX(${y * -4}deg)`;
        });

        gallery.addEventListener('mouseleave', function () {
            gallery.style.transform = 'perspective(900px) rotateY(0deg) rotateX(0deg)';
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views/public/events/show.blade.php ENDPATH**/ ?>