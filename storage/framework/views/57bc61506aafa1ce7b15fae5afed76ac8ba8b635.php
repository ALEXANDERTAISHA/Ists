

<?php $__env->startSection('content'); ?>
<section class="academic-premium-page">
    <div class="academic-premium-bg" aria-hidden="true"></div>

    <div class="container" style="position:relative; z-index:1;">
        <header class="academic-premium-header">
            <span class="academic-kicker">Formación ISTS</span>
            <h1>Académicos</h1>
            <p>Descubre nuestras carreras tecnológicas y programas de educación continua en un ecosistema de aprendizaje orientado al futuro.</p>
        </header>

        <section class="academic-block">
            <div class="academic-block-head">
                <h2>Carreras</h2>
                <a href="<?php echo e(url('/carreras')); ?>" class="academic-inline-link">Ver catálogo completo</a>
            </div>

            <div class="academic-grid">
                <?php $__empty_1 = true; $__currentLoopData = $careers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $career): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $imgSrc = null;
                        if (!empty($career->image_path)) {
                            $imgSrc = asset('storage/' . ltrim($career->image_path, '/'));
                        } elseif (!empty($career->image_path_2)) {
                            $imgSrc = asset('storage/' . ltrim($career->image_path_2, '/'));
                        }
                    ?>
                    <article class="academic-card">
                        <div class="academic-card-media">
                            <?php if($imgSrc): ?>
                                <img src="<?php echo e($imgSrc); ?>" alt="<?php echo e($career->name); ?>">
                            <?php else: ?>
                                <div class="academic-media-fallback">Carrera</div>
                            <?php endif; ?>
                        </div>
                        <div class="academic-card-body">
                            <h3><?php echo e($career->name); ?></h3>
                            <p><?php echo e(\Illuminate\Support\Str::limit(strip_tags($career->description ?: 'Conoce el contenido, enfoque y perfil de egreso de esta carrera.'), 120)); ?></p>
                            <a href="<?php echo e(route('career.show', $career->slug)); ?>" class="academic-card-link">Ver carrera</a>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="academic-empty">No hay carreras activas por el momento.</div>
                <?php endif; ?>
            </div>
        </section>

        <section class="academic-block">
            <div class="academic-block-head">
                <h2>Educación Continua</h2>
            </div>

            <div class="academic-grid academic-grid--courses">
                <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $courseImage = $course->image_url ? asset($course->image_url) : null;
                        $courseUrl = $course->url ?: ($course->slug ? route('content.show', $course->slug) : '#');
                    ?>
                    <article class="academic-card academic-card--course">
                        <div class="academic-card-media">
                            <?php if($courseImage): ?>
                                <img src="<?php echo e($courseImage); ?>" alt="<?php echo e($course->title); ?>">
                            <?php else: ?>
                                <div class="academic-media-fallback">Curso</div>
                            <?php endif; ?>
                        </div>
                        <div class="academic-card-body">
                            <h3><?php echo e($course->title); ?></h3>
                            <p><?php echo e(\Illuminate\Support\Str::limit(strip_tags($course->description ?: 'Programa de formación continua disponible para nuestra comunidad.'), 120)); ?></p>
                            <a href="<?php echo e($courseUrl); ?>" class="academic-card-link" <?php if($course->url): ?> target="_blank" rel="noopener" <?php endif; ?>>
                                Ver curso
                            </a>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="academic-empty">No hay cursos publicados actualmente.</div>
                <?php endif; ?>
            </div>
        </section>
    </div>
</section>

<style>
    .academic-premium-page {
        --ap-primary: #0a3f6d;
        --ap-accent: #0ea5a2;
        --ap-ink: #193a58;
        --ap-soft: #edf7ff;
        position: relative;
        background: linear-gradient(175deg, #f8fcff 0%, #ecf5f2 100%);
        padding: 5.9rem 0 3rem;
        overflow: hidden;
    }

    .academic-premium-bg {
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at 8% 20%, rgba(14,165,162,0.18), transparent 35%),
            radial-gradient(circle at 86% 9%, rgba(10,63,109,0.16), transparent 35%),
            linear-gradient(120deg, rgba(255,255,255,0.45) 0%, transparent 44%);
    }

    .academic-premium-header {
        max-width: 900px;
        margin: 0 auto 1.55rem;
        text-align: center;
        background: rgba(255,255,255,0.72);
        border: 1px solid rgba(255,255,255,0.9);
        border-radius: 18px;
        padding: 1.25rem 1rem;
        box-shadow: 0 14px 30px rgba(9, 29, 61, 0.10);
    }

    .academic-kicker {
        display: inline-flex;
        border-radius: 999px;
        padding: 0.4rem 0.9rem;
        background: rgba(14,165,162,0.15);
        color: #0d7271;
        font-size: 0.74rem;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        font-weight: 700;
    }

    .academic-premium-header h1 {
        margin: 0.85rem 0 0.45rem;
        font-size: clamp(1.76rem, 3.4vw, 2.6rem);
        line-height: 1.08;
        color: var(--ap-primary);
        letter-spacing: -0.03em;
        font-weight: 900;
    }

    .academic-premium-header p {
        margin: 0;
        color: #4b6782;
        font-size: clamp(0.94rem, 1.1vw, 1rem);
        line-height: 1.56;
    }

    .academic-block {
        margin-top: 1.15rem;
    }

    .academic-block-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 0.8rem;
        margin-bottom: 0.85rem;
    }

    .academic-block-head h2 {
        margin: 0;
        color: var(--ap-ink);
        font-size: clamp(1.2rem, 1.8vw, 1.52rem);
        letter-spacing: -0.02em;
        font-weight: 800;
    }

    .academic-inline-link {
        color: #0c6770;
        text-decoration: none;
        font-weight: 700;
        font-size: 0.88rem;
    }

    .academic-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
        gap: 0.85rem;
    }

    .academic-card {
        position: relative;
        background: #fff;
        border-radius: 14px;
        overflow: hidden;
        border: 1px solid rgba(18, 36, 58, 0.08);
        box-shadow: 0 6px 16px rgba(17, 38, 63, 0.08);
        display: flex;
        flex-direction: column;
        transition: transform 0.26s ease, box-shadow 0.26s ease, border-color 0.26s ease;
        opacity: 0;
        transform: translateY(12px) scale(0.992);
        filter: blur(5px);
        animation: ap-card-in 0.54s cubic-bezier(.2,.65,.2,1) forwards;
        will-change: transform, opacity;
    }

    .academic-card:nth-child(1) { animation-delay: 0.03s; }
    .academic-card:nth-child(2) { animation-delay: 0.08s; }
    .academic-card:nth-child(3) { animation-delay: 0.13s; }
    .academic-card:nth-child(4) { animation-delay: 0.18s; }
    .academic-card:nth-child(5) { animation-delay: 0.23s; }
    .academic-card:nth-child(6) { animation-delay: 0.28s; }
    .academic-card:nth-child(n+7) { animation-delay: 0.33s; }

    .academic-card:hover {
        transform: translateY(-4px) scale(1.005);
        border-color: rgba(14,165,162,0.38);
        box-shadow: 0 14px 30px rgba(17, 38, 63, 0.15);
    }

    .academic-card-media {
        height: 136px;
        background: linear-gradient(140deg, #0a3f6d 0%, #0ea5a2 100%);
    }

    .academic-card-media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.36s ease;
    }

    .academic-card:hover .academic-card-media img {
        transform: scale(1.03);
    }

    .academic-media-fallback {
        width: 100%;
        height: 100%;
        display: grid;
        place-items: center;
        color: rgba(255,255,255,0.9);
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }

    .academic-card-body {
        padding: 0.7rem 0.74rem 0.78rem;
        display: grid;
        gap: 0.55rem;
        flex: 1;
    }

    .academic-card-body h3 {
        margin: 0;
        color: var(--ap-ink);
        font-size: 1.02rem;
        line-height: 1.2;
        font-weight: 800;
    }

    .academic-card-body p {
        margin: 0;
        color: #4f6880;
        font-size: 0.86rem;
        line-height: 1.45;
        min-height: 4.6em;
    }

    .academic-card-link {
        margin-top: auto;
        text-decoration: none;
        color: #0c6770;
        font-weight: 800;
        font-size: 0.88rem;
    }

    .academic-empty {
        grid-column: 1 / -1;
        padding: 1rem;
        text-align: center;
        border-radius: 14px;
        border: 1px dashed rgba(10,63,109,0.2);
        background: rgba(255,255,255,0.74);
        color: #4f6780;
    }

    @keyframes ap-card-in {
        from {
            opacity: 0;
            transform: translateY(12px) scale(0.992);
            filter: blur(5px);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
            filter: blur(0);
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .academic-card {
            animation: none;
            opacity: 1;
            transform: none;
            filter: none;
        }
    }

    @media (max-width: 768px) {
        .academic-premium-page {
            padding-top: 6.6rem;
        }

        .academic-premium-header {
            border-radius: 16px;
            padding: 1.25rem 1rem;
            margin-bottom: 1.3rem;
        }

        .academic-block-head {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views\public\academicos.blade.php ENDPATH**/ ?>