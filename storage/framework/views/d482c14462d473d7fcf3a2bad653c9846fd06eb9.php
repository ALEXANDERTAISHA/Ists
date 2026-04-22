

<?php $__env->startSection('title', 'ISTS Sucúa - Instituto Superior Tecnológico Sucúa'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    /* En la home, el hero arranca desde arriba del todo (header es fixed encima) */
    .public-page-main { padding-top: 0 !important; }
    .hero-section { margin-bottom: 0 !important; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php $heroGlassMode = config('app.hero_glass_mode', 'light'); ?>
    <!-- Hero Section - Premium -->
    <section class="hero-section p-0 m-0" style="position:relative; height:100vh; min-height:500px; overflow:hidden; margin-top:0; margin-bottom:0;">
        <?php if(isset($heroSlides) && $heroSlides->count() > 0): ?>
            <div id="heroCarousel" class="carousel slide" style="position:absolute; inset:0; width:100%; height:100%;" data-bs-ride="carousel" data-bs-interval="5500">
                <div class="carousel-inner" style="width:100%; height:100%;">
                    <?php $__currentLoopData = $heroSlides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($slide->image_path): ?>
                        <div class="carousel-item <?php echo e($index === 0 ? 'active' : ''); ?>"
                             style="position:absolute; inset:0; width:100%; height:100%; background:url('<?php echo e($slide->image_url); ?>') center center / cover no-repeat;">
                                
                                <div class="hero-overlay-gradient"></div>
                                
                                <div class="hero-caption-wrap">
                                    <div class="hero-caption-inner <?php echo e($heroGlassMode === 'dark' ? 'hero-caption-inner--dark' : 'hero-caption-inner--light'); ?>">
                                        <span class="hero-eyebrow">Instituto Superior Tecnológico Sucúa</span>
                                        <?php if($slide->title): ?>
                                        <h1 class="hero-main-title"><?php echo e($slide->title); ?></h1>
                                        <?php endif; ?>
                                        <?php if($slide->subtitle): ?>
                                        <p class="hero-subtitle"><?php echo e($slide->subtitle); ?></p>
                                        <?php endif; ?>
                                        <div class="hero-ctas">
                                            <a href="<?php echo e(url('/carreras')); ?>" class="hero-btn-primary">
                                                Ver carreras
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                                            </a>
                                            <a href="<?php echo e(url('/noticias')); ?>" class="hero-btn-secondary">Noticias</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    
                    <div class="hero-indicators">
                        <?php $__currentLoopData = $heroSlides->where('is_active', true)->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="<?php echo e($index); ?>"
                                class="hero-indicator <?php echo e($index === 0 ? 'active' : ''); ?>"
                                aria-label="Slide <?php echo e($index + 1); ?>"></button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    
                    <button class="hero-arrow hero-arrow-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" width="22" height="22"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
                    </button>
                    <button class="hero-arrow hero-arrow-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" width="22" height="22"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                    </button>
                </div>

                
                <div class="hero-scroll-hint">
                    <span>Descubre más</span>
                    <div class="hero-scroll-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" width="18" height="18"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/></svg>
                    </div>
                </div>

                
                <div class="hero-stats-bar">
                    <div class="hero-stat">
                        <strong>+25</strong><span>años formando<br>profesionales</span>
                    </div>
                    <div class="hero-stat-divider"></div>
                    <div class="hero-stat">
                        <strong>4</strong><span>carreras<br>acreditadas</span>
                    </div>
                    <div class="hero-stat-divider"></div>
                    <div class="hero-stat">
                        <strong>100%</strong><span>compromiso<br>social</span>
                    </div>
                    <div class="hero-stat-divider"></div>
                    <div class="hero-stat">
                        <strong>SNNA</strong><span>admisión<br>oficial</span>
                    </div>
                </div>
            <?php else: ?>
                <div class="d-flex justify-content-center align-items-center h-100"
                     style="background:linear-gradient(135deg,#0a1628,#0f2c1e);">
                    <div class="text-center text-white">
                        <h1 style="font-size:3rem;font-weight:900;">Bienvenido al ISTS Sucúa</h1>
                        <p class="lead" style="opacity:0.7;">Formando profesionales de excelencia</p>
                    </div>
                </div>
            <?php endif; ?>
        </section>

        <style>
        /* ── Hero Premium ── */
        .hero-section {
            display: block !important; /* override harvard-style flex */
        }
        #heroCarousel {
            position: absolute !important;
            inset: 0 !important;
            width: 100% !important;
            height: 100% !important;
        }
        #heroCarousel .carousel-inner {
            width: 100% !important;
            height: 100% !important;
            position: relative !important;
        }
        .carousel-item {
            position: absolute !important;
            inset: 0 !important;
            width: 100% !important;
            height: 100% !important;
            display: block !important; /* always block, visibility via opacity */
            opacity: 0;
            transition: opacity 0.8s ease !important;
            z-index: 0;
        }
        .carousel-item.active {
            opacity: 1 !important;
            z-index: 1;
        }
        .carousel-item-next.carousel-item-start,
        .carousel-item-prev.carousel-item-end {
            opacity: 1 !important;
            z-index: 1;
        }
        .carousel-item-next,
        .carousel-item-prev {
            opacity: 0;
            z-index: 1;
        }

        .hero-overlay-gradient {
            position:absolute; inset:0;
            background:
                linear-gradient(to right, rgba(10,22,40,0.72) 0%, rgba(10,22,40,0.38) 55%, transparent 100%),
                linear-gradient(to top, rgba(5,15,28,0.65) 0%, transparent 50%);
            z-index:1;
        }

        .hero-caption-wrap {
            position:absolute; inset:0; z-index:2;
            display:flex; align-items:center; justify-content:center;
            padding: 0 0 100px;
        }
        .hero-caption-inner {
            width: min(1100px, calc(100vw - 44px));
            min-height: clamp(350px, 46vh, 530px);
            padding: clamp(1rem, 1.6vw, 1.2rem) clamp(1.2rem, 2.8vw, 2.4rem) clamp(1.2rem, 2.6vw, 1.7rem);
            text-align: center;
            position: relative;
            border-radius: 26px;
            isolation: isolate;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            gap: clamp(0.65rem, 1.2vw, 0.95rem);
        }
        .hero-caption-inner::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 26px;
            z-index: 0;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }
        .hero-caption-inner > * {
            position: relative;
            z-index: 1;
        }
        .hero-caption-inner--light::before {
            background:
                linear-gradient(145deg, rgba(14, 66, 82, 0.28) 0%, rgba(9, 34, 52, 0.14) 62%, rgba(9, 34, 52, 0.10) 100%),
                radial-gradient(circle at 14% 0%, rgba(255,255,255,0.24), transparent 42%);
            border: 1px solid rgba(255,255,255,0.32);
            box-shadow:
                0 18px 42px rgba(3, 10, 24, 0.25),
                inset 0 1px 0 rgba(255,255,255,0.28);
        }
        .hero-caption-inner--dark::before {
            background:
                linear-gradient(145deg, rgba(3, 12, 28, 0.64) 0%, rgba(3, 12, 28, 0.42) 58%, rgba(3, 12, 28, 0.30) 100%),
                radial-gradient(circle at 14% 0%, rgba(255,255,255,0.12), transparent 40%);
            border: 1px solid rgba(255,255,255,0.18);
            box-shadow:
                0 20px 48px rgba(0, 0, 0, 0.40),
                inset 0 1px 0 rgba(255,255,255,0.14);
        }
        .hero-eyebrow {
            display:inline-block;
            font-size:1rem; font-weight:700; letter-spacing:3px; text-transform:uppercase;
            color:#fff;
            background:rgba(255,255,255,0.15);
            border:1.5px solid rgba(255,255,255,0.34);
            padding:0.55rem 1.6rem; border-radius:50px;
            margin-bottom:0;
            backdrop-filter:blur(10px);
            text-shadow: 0 1px 8px rgba(0,0,0,0.3);
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        }
        .hero-main-title {
            font-size:clamp(2rem, 5.2vw, 4.4rem);
            font-weight:900;
            color:#fff;
            letter-spacing:-1.5px;
            line-height:1.08;
            margin:0;
            max-width: min(20ch, 96vw);
            margin-left: auto;
            margin-right: auto;
            text-wrap: balance;
            display: block;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            overflow: hidden;
            min-height: calc(1.08em * 2);
            text-shadow:
                0 4px 30px rgba(0,0,0,0.42),
                0 2px 10px rgba(0,0,0,0.28);
        }
        .hero-subtitle {
            font-size:clamp(1rem, 2vw, 1.3rem);
            color:rgba(255,255,255,0.78);
            line-height:1.55;
            margin:0;
            max-width: 58ch;
            margin-left: auto;
            margin-right: auto;
            text-align: justify;
            text-justify: inter-word;
            text-align-last: center;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            overflow: hidden;
            min-height: calc(1.55em * 3);
        }
        .hero-ctas {
            display:flex;
            gap:1rem;
            flex-wrap:wrap;
            justify-content:center;
            margin-top: auto;
            padding-top: clamp(0.5rem, 1vw, 0.95rem);
        }
        .hero-btn-primary {
            display:inline-flex; align-items:center; gap:0.55rem;
            background:linear-gradient(135deg,#00796b,#1abc9c);
            color:#fff !important; text-decoration:none !important;
            font-size:0.92rem; font-weight:700;
            padding:0.85rem 2rem; border-radius:50px;
            box-shadow:0 8px 24px rgba(0,150,136,0.45);
            transition:transform 0.28s ease, box-shadow 0.28s ease, gap 0.22s ease;
        }
        .hero-btn-primary:hover { transform:translateY(-3px); box-shadow:0 14px 36px rgba(0,150,136,0.55); gap:0.9rem; }
        .hero-btn-secondary {
            display:inline-flex; align-items:center;
            background:rgba(255,255,255,0.12);
            backdrop-filter:blur(8px);
            border:1.5px solid rgba(255,255,255,0.3);
            color:#fff !important; text-decoration:none !important;
            font-size:0.92rem; font-weight:600;
            padding:0.85rem 1.8rem; border-radius:50px;
            transition:background 0.25s ease, border-color 0.25s ease;
        }
        .hero-btn-secondary:hover { background:rgba(255,255,255,0.22); border-color:rgba(255,255,255,0.5); }

        /* Custom indicators */
        .hero-indicators {
            position:absolute; bottom:110px; left:50%; transform:translateX(-50%); z-index:10;
            display:flex; gap:0.5rem; align-items:center;
        }
        .hero-indicator {
            width:28px; height:4px; border-radius:2px;
            background:rgba(255,255,255,0.35); border:none;
            padding:0; cursor:pointer;
            transition:width 0.35s ease, background 0.35s ease;
        }
        .hero-indicator.active { width:52px; background:#1abc9c; }

        /* Custom arrows */
        .hero-arrow {
            position:absolute; top:50%; transform:translateY(-50%); z-index:10;
            width:48px; height:48px; border-radius:50%;
            background:rgba(255,255,255,0.1); backdrop-filter:blur(8px);
            border:1.5px solid rgba(255,255,255,0.2);
            color:#fff; display:flex; align-items:center; justify-content:center;
            transition:background 0.25s ease, transform 0.25s ease;
            cursor:pointer;
        }
        .hero-arrow:hover { background:rgba(0,150,136,0.65); transform:translateY(-50%) scale(1.08); border-color:transparent; }
        .hero-arrow-prev { left:2rem; }
        .hero-arrow-next { right:2rem; }

        /* Scroll hint */
        .hero-scroll-hint {
            position:absolute; bottom:36px; left:50%; transform:translateX(-50%); z-index:10;
            display:flex; flex-direction:column; align-items:center; gap:0.3rem;
            color:rgba(255,255,255,0.5); font-size:0.7rem; letter-spacing:2px; text-transform:uppercase;
            animation:hero-bounce 2.2s ease-in-out infinite;
        }
        .hero-scroll-arrow { color:rgba(255,255,255,0.45); }
        @keyframes hero-bounce {
            0%,100%{ transform:translateX(-50%) translateY(0); }
            50%{ transform:translateX(-50%) translateY(6px); }
        }

        /* Stats bar */
        .hero-stats-bar {
            position:absolute; bottom:0; left:0; right:0; z-index:10;
            background:rgba(255,255,255,0.96);
            backdrop-filter:blur(12px);
            border-top:1px solid rgba(15,23,42,0.08);
            display:flex; align-items:center; justify-content:center;
            gap:0; height:72px;
            box-shadow:0 -4px 20px rgba(15,23,42,0.1);
        }
        .hero-stat {
            display:flex; align-items:center; gap:0.75rem;
            padding:0 2.5rem;
        }
        .hero-stat strong {
            font-size:1.65rem; font-weight:900; line-height:1;
            background:linear-gradient(135deg,#00796b,#1abc9c);
            -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
        }
        .hero-stat span {
            font-size:0.7rem; font-weight:600; color:#64748b;
            letter-spacing:0.3px; line-height:1.3; text-transform:uppercase;
        }
        .hero-stat-divider {
            width:1px; height:36px;
            background:rgba(15,23,42,0.12);
        }
        @media(max-width:768px) {
            .hero-caption-inner {
                width: min(96vw, 740px);
                min-height: auto;
                padding: 0.95rem 1.1rem 1.25rem;
                border-radius: 18px;
                gap: 0.65rem;
            }
            .hero-caption-inner::before {
                border-radius: 18px;
                backdrop-filter: blur(6px);
                -webkit-backdrop-filter: blur(6px);
            }
            .hero-main-title {
                max-width: 100%;
                font-size: clamp(1.7rem, 9vw, 2.8rem);
                letter-spacing: -0.9px;
                line-height: 1.12;
                -webkit-line-clamp: 3;
                min-height: calc(1.12em * 2);
            }
            .hero-subtitle {
                max-width: 95%;
                -webkit-line-clamp: 3;
                min-height: calc(1.5em * 2);
            }
            .hero-stat-divider:nth-child(6) { display:none; }
            .hero-stat:last-child { display:none; }
            .hero-stats-bar { padding:0; }
            .hero-stat { padding:0 1.2rem; }
            .hero-stat strong { font-size:1.3rem; }
        }
        </style>




        <!-- Misión y Visión Section (reemplaza Enfoque) -->
        <?php echo $__env->make('public.partials.home_mision_vision', ['content' => $misionVision ?? null], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Últimas actualizaciones multimedia -->
        <?php echo $__env->make('public.partials.updates', ['updates' => $updates ?? []], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Academic Programs Section - Premium -->
        <section class="hc-section">
            <div class="hc-bg-deco" aria-hidden="true">
                <div class="hc-deco-blob hc-deco-blob--1"></div>
                <div class="hc-deco-blob hc-deco-blob--2"></div>
            </div>
            <div class="container" style="position:relative;z-index:1;">

                
                <div class="hc-header">
                    <span class="hc-badge">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" width="13" height="13"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"/></svg>
                        Oferta Académica
                    </span>
                    <h2 class="hc-title">¡Tenemos una <span class="hc-title-accent">carrera</span> para ti!</h2>
                    <p class="hc-subtitle">Elige tu futuro entre nuestras carreras tecnológicas de alto impacto, diseñadas para el mundo que viene.</p>
                </div>

                
                <div class="hc-grid">
                    <?php
                        $careerMeta = [
                            'desarrollo-software' => [
                                'grad'  => 'linear-gradient(145deg,#1e3a8a,#2563eb)',
                                'glow'  => 'rgba(37,99,235,0.5)',
                                'tag'   => 'Tecnología',
                                'tag_color' => '#93c5fd',
                                'tag_bg'    => 'rgba(37,99,235,0.25)',
                                'svg'   => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor" width="52" height="52"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/></svg>',
                            ],
                            'agroecologia' => [
                                'grad'  => 'linear-gradient(145deg,#14532d,#16a34a)',
                                'glow'  => 'rgba(22,163,74,0.5)',
                                'tag'   => 'Agropecuaria',
                                'tag_color' => '#86efac',
                                'tag_bg'    => 'rgba(22,163,74,0.25)',
                                'svg'   => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor" width="52" height="52"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3C7.5 3 3 7.5 3 12c4.5 0 9-4.5 9-9zm0 0c4.5 0 9 4.5 9 9-4.5 0-9-4.5-9-9zm0 0v18"/></svg>',
                            ],
                            'contabilidad-y-asesoria-tributaria' => [
                                'grad'  => 'linear-gradient(145deg,#78350f,#d97706)',
                                'glow'  => 'rgba(217,119,6,0.5)',
                                'tag'   => 'Empresarial',
                                'tag_color' => '#fcd34d',
                                'tag_bg'    => 'rgba(217,119,6,0.25)',
                                'svg'   => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor" width="52" height="52"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/></svg>',
                            ],
                            'educacion-inicial' => [
                                'grad'  => 'linear-gradient(145deg,#581c87,#9333ea)',
                                'glow'  => 'rgba(147,51,234,0.5)',
                                'tag'   => 'Educación',
                                'tag_color' => '#d8b4fe',
                                'tag_bg'    => 'rgba(147,51,234,0.25)',
                                'svg'   => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor" width="52" height="52"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"/></svg>',
                            ],
                        ];
                        $defaultMeta = [
                            'grad'  => 'linear-gradient(145deg,#1e293b,#475569)',
                            'glow'  => 'rgba(71,85,105,0.5)',
                            'tag'   => 'Carrera',
                            'tag_color' => '#cbd5e1',
                            'tag_bg'    => 'rgba(71,85,105,0.25)',
                            'svg'   => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor" width="52" height="52"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/></svg>',
                        ];
                    ?>

                    <?php $__currentLoopData = $careers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $career): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $meta   = $careerMeta[$career->slug] ?? $defaultMeta;
                            $img1Ok = $career->image_path  && file_exists(public_path('storage/' . $career->image_path));
                            $img2Ok = $career->image_path_2 && file_exists(public_path('storage/' . $career->image_path_2));
                            $hasImg = $img1Ok || $img2Ok;
                            $imgSrc = $img1Ok ? asset('storage/' . $career->image_path) : ($img2Ok ? asset('storage/' . $career->image_path_2) : null);
                        ?>
                        <a href="<?php echo e(route('career.show', $career->slug)); ?>" class="hc-card" style="--hc-grad:<?php echo e($meta['grad']); ?>;--hc-glow:<?php echo e($meta['glow']); ?>;">
                            
                            <div class="hc-card-visual">
                                <?php if($hasImg): ?>
                                    <img src="<?php echo e($imgSrc); ?>" alt="<?php echo e($career->name); ?>" class="hc-card-img">
                                <?php endif; ?>
                                <div class="hc-card-overlay" style="background:<?php echo e($meta['grad']); ?>;"></div>
                                <div class="hc-card-icon-wrap">
                                    <?php echo $meta['svg']; ?>

                                </div>
                                
                                <span class="hc-card-tag" style="color:<?php echo e($meta['tag_color']); ?>;background:<?php echo e($meta['tag_bg']); ?>;"><?php echo e($meta['tag']); ?></span>
                            </div>

                            
                            <div class="hc-card-body">
                                <h3 class="hc-card-title"><?php echo e($career->name); ?></h3>
                                <?php if($career->description): ?>
                                    <p class="hc-card-desc"><?php echo e(Str::limit(strip_tags($career->description), 90)); ?></p>
                                <?php endif; ?>
                                <div class="hc-card-cta">
                                    <span class="hc-cta-text">Ver carrera</span>
                                    <span class="hc-cta-arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"/></svg>
                                    </span>
                                </div>
                            </div>

                            
                            <div class="hc-card-glow-border"></div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </div>
        </section>

        <style>
        /* ── Careers Premium Section ── */
        .hc-section {
            position: relative;
            padding: 3.5rem 0 3rem;
            background: linear-gradient(160deg, #f8faff 0%, #eef6f4 50%, #f0f9ff 100%);
            overflow: hidden;
        }
        .hc-bg-deco { position:absolute;inset:0;pointer-events:none;overflow:hidden; }
        .hc-deco-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.45;
        }
        .hc-deco-blob--1 {
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(0,150,136,0.18), transparent 70%);
            top: -120px; left: -100px;
        }
        .hc-deco-blob--2 {
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(59,130,246,0.14), transparent 70%);
            bottom: -80px; right: -80px;
        }

        /* Header */
        .hc-header {
            text-align: center;
            margin-bottom: 2.2rem;
        }
        .hc-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: linear-gradient(90deg,rgba(0,150,136,0.12),rgba(59,130,246,0.10));
            border: 1px solid rgba(0,150,136,0.25);
            color: #00796b;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 0.35rem 1rem;
            border-radius: 50px;
            margin-bottom: 1rem;
        }
        .hc-title {
            font-size: clamp(1.6rem,3vw,2.3rem);
            font-weight: 900;
            color: #0f172a;
            letter-spacing: -1.5px;
            margin: 0 0 0.5rem;
            line-height: 1.1;
        }
        .hc-title-accent {
            background: linear-gradient(90deg,#00796b,#1abc9c,#3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .hc-subtitle {
            color: #475569;
            font-size: 0.95rem;
            max-width: 100%;
            white-space: nowrap;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Grid */
        .hc-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
        }
        @media (max-width: 1100px) { .hc-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 600px)  { .hc-grid { grid-template-columns: 1fr; } }

        /* Card */
        .hc-card {
            position: relative;
            border-radius: 22px;
            overflow: hidden;
            text-decoration: none !important;
            background: #fff;
            display: flex;
            flex-direction: column;
            border: 1px solid rgba(15,23,42,0.07);
            box-shadow: 0 4px 24px rgba(15,23,42,0.08);
            transition: transform 0.38s cubic-bezier(0.22,1,0.36,1),
                        box-shadow 0.38s cubic-bezier(0.22,1,0.36,1);
            /* stagger via nth-child */
        }
        .hc-card:nth-child(1) { animation: hc-rise 0.7s 0.05s both; }
        .hc-card:nth-child(2) { animation: hc-rise 0.7s 0.15s both; }
        .hc-card:nth-child(3) { animation: hc-rise 0.7s 0.25s both; }
        .hc-card:nth-child(4) { animation: hc-rise 0.7s 0.35s both; }
        @keyframes hc-rise {
            from { opacity:0; transform:translateY(28px) scale(0.97); }
            to   { opacity:1; transform:translateY(0)    scale(1); }
        }
        .hc-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 28px 60px var(--hc-glow,rgba(0,0,0,0.2)), 0 4px 16px rgba(15,23,42,0.12);
        }

        /* Visual */
        .hc-card-visual {
            position: relative;
            height: 155px;
            overflow: hidden;
            flex-shrink: 0;
        }
        .hc-card-img {
            width: 100%; height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
            transition: transform 0.55s cubic-bezier(0.22,1,0.36,1);
        }
        .hc-card:hover .hc-card-img { transform: scale(1.08); }
        .hc-card-overlay {
            position: absolute;
            inset: 0;
            opacity: 0.82;
            transition: opacity 0.4s ease;
        }
        /* When no image, overlay is full. With image, overlay is partial at bottom */
        .hc-card-img ~ .hc-card-overlay {
            opacity: 0;
            background: var(--hc-grad) !important;
        }
        .hc-card:hover .hc-card-img ~ .hc-card-overlay { opacity: 0.72; }

        /* Icon centered in visual */
        .hc-card-icon-wrap {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255,255,255,0.92);
            transition: transform 0.4s ease, opacity 0.4s ease;
            pointer-events: none;
        }
        .hc-card-icon-wrap svg { filter: drop-shadow(0 4px 12px rgba(0,0,0,0.3)); }
        /* When image exists, hide icon unless hovering */
        .hc-card-img ~ .hc-card-overlay ~ .hc-card-icon-wrap { opacity: 0; transform: scale(0.8); }
        .hc-card:hover .hc-card-icon-wrap { opacity: 1 !important; transform: scale(1) !important; }

        /* Tag badge */
        .hc-card-tag {
            position: absolute;
            top: 12px; left: 12px;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 0.22rem 0.7rem;
            border-radius: 50px;
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,0.15);
        }

        /* Body */
        .hc-card-body {
            padding: 1rem 1.1rem 1.1rem;
            display: flex;
            flex-direction: column;
            flex: 1;
            gap: 0.3rem;
        }
        .hc-card-title {
            font-size: 0.95rem;
            font-weight: 800;
            color: #0f172a;
            margin: 0;
            line-height: 1.3;
            letter-spacing: -0.3px;
        }
        .hc-card-desc {
            font-size: 0.845rem;
            color: #64748b;
            margin: 0;
            line-height: 1.55;
            flex: 1;
        }

        /* CTA */
        .hc-card-cta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 0.6rem;
            padding-top: 0.9rem;
            border-top: 1px solid rgba(15,23,42,0.07);
        }
        .hc-cta-text {
            font-size: 0.85rem;
            font-weight: 700;
            color: #00796b;
            letter-spacing: 0.2px;
            transition: color 0.25s ease;
        }
        .hc-card:hover .hc-cta-text { color: #004d40; }
        .hc-cta-arrow {
            width: 32px; height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg,#00796b,#1abc9c);
            display: flex; align-items: center; justify-content: center;
            color: #fff;
            box-shadow: 0 4px 12px rgba(0,150,136,0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            flex-shrink: 0;
        }
        .hc-card:hover .hc-cta-arrow {
            transform: translate(3px,-3px) scale(1.1);
            box-shadow: 0 8px 20px rgba(0,150,136,0.45);
        }

        /* Glow border */
        .hc-card-glow-border {
            position: absolute;
            inset: -1px;
            border-radius: 23px;
            background: var(--hc-grad);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.35s ease;
        }
        .hc-card:hover .hc-card-glow-border { opacity: 1; }
        </style>
        <!-- News Section - Premium -->
        <section class="gac-section">
            <div class="container" style="position:relative;z-index:1;">

                
                <div class="gac-header">
                    <div class="gac-eyebrow">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" width="13" height="13"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/></svg>
                        Noticias &amp; Eventos
                    </div>
                    <h2 class="gac-title"><span class="gac-accent">Noticias</span> del ISTS</h2>
                    <p class="gac-subtitle">Noticias, eventos y comunicados oficiales de nuestra institución</p>
                </div>

                <?php
                    $featuredItem = $gacetaList->first();
                    $restItems    = $gacetaList->skip(1)->take(2);
                    $getGacetaImg = function ($n) {
                        if(is_array($n->images) && count($n->images) > 0)
                            return asset('storage/' . ltrim($n->images[0], '/'));
                        if($n->is_event && isset($n->image_path) && $n->image_path)
                            return asset('storage/uploads/images/' . $n->image_path);
                        return null;
                    };
                    $getGacetaUrl = function ($n) {
                        if($n->is_event) return url('/eventos/' . $n->id);
                        return route('noticias.show', $n->slug);
                    };
                    $getGacetaTag = function ($n) {
                        return $n->is_event ? 'Evento' : ucfirst($n->category ?? 'Noticia');
                    };
                    $getGacetaTagClass = function ($n) {
                        return $n->is_event ? 'gac-tag--event' : 'gac-tag--news';
                    };
                    $getGacetaDate = function ($n) {
                        $raw = $n->is_event ? ($n->date ?? null) : ($n->published_at ?? null);
                        if(!$raw) return '';
                        try { return \Carbon\Carbon::parse($raw)->locale('es')->isoFormat('D MMM YYYY'); } catch(\Exception $e){ return ''; }
                    };
                ?>

                <?php if($featuredItem): ?>
                <div class="gac-layout">

                    
                    <a href="<?php echo e($getGacetaUrl($featuredItem)); ?>" class="gac-featured">
                        <div class="gac-featured-img-wrap">
                            <?php $fImg = $getGacetaImg($featuredItem); ?>
                            <?php if($fImg): ?>
                                <img src="<?php echo e($fImg); ?>" alt="<?php echo e($featuredItem->title); ?>" class="gac-featured-img">
                            <?php else: ?>
                                <div class="gac-featured-img-fallback">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3" stroke="rgba(255,255,255,0.5)" width="64" height="64"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/></svg>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="gac-featured-body">
                            <div class="gac-featured-meta-row">
                                <span class="gac-tag <?php echo e($getGacetaTagClass($featuredItem)); ?>"><?php echo e($getGacetaTag($featuredItem)); ?></span>
                                <?php $fd = $getGacetaDate($featuredItem); ?>
                                <?php if($fd): ?><span class="gac-featured-date"><?php echo e($fd); ?></span><?php endif; ?>
                            </div>
                            <h3 class="gac-featured-title"><?php echo e($featuredItem->title); ?></h3>
                            <p class="gac-featured-excerpt"><?php echo e(\Illuminate\Support\Str::limit(strip_tags(html_entity_decode($featuredItem->summary)), 170)); ?></p>
                            <span class="gac-featured-cta">
                                Leer nota completa
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" width="15" height="15"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"/></svg>
                            </span>
                        </div>
                    </a>

                    
                    <div class="gac-side">
                        <?php $__currentLoopData = $restItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $sImg = $getGacetaImg($n); ?>
                        <a href="<?php echo e($getGacetaUrl($n)); ?>" class="gac-card">
                            <div class="gac-card-img-wrap">
                                <?php if($sImg): ?>
                                    <img src="<?php echo e($sImg); ?>" alt="<?php echo e($n->title); ?>" class="gac-card-img">
                                <?php else: ?>
                                    <div class="gac-card-img-fallback"></div>
                                <?php endif; ?>
                            </div>
                            <div class="gac-card-body">
                                <div class="gac-card-meta">
                                    <span class="gac-tag <?php echo e($getGacetaTagClass($n)); ?>"><?php echo e($getGacetaTag($n)); ?></span>
                                    <?php $sd = $getGacetaDate($n); ?>
                                    <?php if($sd): ?><span class="gac-card-date"><?php echo e($sd); ?></span><?php endif; ?>
                                </div>
                                <h4 class="gac-card-title"><?php echo e($n->title); ?></h4>
                                <p class="gac-card-excerpt"><?php echo e(\Illuminate\Support\Str::limit(strip_tags(html_entity_decode($n->summary)), 90)); ?></p>
                                <span class="gac-card-link">Leer más <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" width="12" height="12"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg></span>
                            </div>
                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </div>
                <?php endif; ?>

                
                <div class="gac-actions">
                    <a href="<?php echo e(url('/noticias')); ?>" class="gac-btn-all">
                        Ver todas las noticias
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </a>
                </div>

            </div>
        </section>

        <style>
        /* ── Gaceta Section ── */
        .gac-section {
            position: relative;
            background: linear-gradient(160deg,#f8faff 0%,#ffffff 50%,#f0fdf8 100%);
            padding: 3.5rem 0 3rem;
            overflow: hidden;
        }
        .gac-section::before {
            content:'';
            position:absolute;
            top:-100px; right:-100px;
            width:400px; height:400px;
            background: radial-gradient(circle, rgba(0,150,136,0.07) 0%, transparent 70%);
            pointer-events:none;
        }

        /* Header */
        .gac-header { text-align:center; margin-bottom:2rem; }
        .gac-eyebrow {
            display:inline-flex; align-items:center; gap:0.45rem;
            font-size:0.72rem; font-weight:700; letter-spacing:2.5px; text-transform:uppercase;
            color:#00796b;
            background:rgba(0,150,136,0.08);
            border:1px solid rgba(0,150,136,0.2);
            padding:0.35rem 1rem; border-radius:50px; margin-bottom:1.1rem;
        }
        .gac-title {
            font-size:clamp(1.6rem,3vw,2.2rem);
            font-weight:900; color:#0f172a;
            letter-spacing:-1.5px; line-height:1.1;
            margin:0 0 0.5rem;
        }
        .gac-accent {
            background:linear-gradient(90deg,#00796b,#1abc9c);
            -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
        }
        .gac-subtitle { color:#64748b; font-size:0.9rem; margin:0 auto; max-width:480px; line-height:1.6; }

        /* Layout */
        .gac-layout {
            display:grid;
            grid-template-columns: 1fr 360px;
            gap:1.4rem;
            align-items:stretch;
        }
        @media(max-width:900px) { .gac-layout { grid-template-columns:1fr; } }

        /* Featured card */
        .gac-featured {
            display:grid;
            grid-template-columns:minmax(320px, 1.08fr) minmax(280px, 0.92fr);
            text-decoration:none !important;
            border-radius:28px;
            overflow:hidden;
            position:relative;
            border:1px solid rgba(15,23,42,0.07);
            background:rgba(255,255,255,0.9);
            backdrop-filter:blur(10px);
            box-shadow:0 16px 50px rgba(15,23,42,0.10);
            transition:transform 0.38s cubic-bezier(0.22,1,0.36,1), box-shadow 0.38s ease;
            height:100%;
        }
        .gac-featured:hover {
            transform:translateY(-6px);
            box-shadow:0 28px 70px rgba(0,150,136,0.16);
        }
        .gac-featured-img-wrap {
            position:relative;
            min-height:320px;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:1rem;
            background:
                radial-gradient(circle at top, rgba(255,255,255,0.96) 0%, rgba(255,255,255,0.82) 30%, transparent 62%),
                linear-gradient(180deg,#f8fafc 0%,#edf4fb 100%);
            border-right:1px solid rgba(15,23,42,0.06);
        }
        .gac-featured-img {
            width:100%; height:100%;
            object-fit:contain; object-position:center;
            display:block;
            max-height:300px;
            transition:transform 0.55s cubic-bezier(0.22,1,0.36,1);
            filter:drop-shadow(0 12px 20px rgba(15,23,42,0.12));
        }
        .gac-featured:hover .gac-featured-img { transform:scale(1.05); }
        .gac-featured-img-fallback {
            width:100%; height:100%;
            background:linear-gradient(135deg,#00796b,#1abc9c);
            display:flex; align-items:center; justify-content:center;
        }
        .gac-featured-body {
            display:flex;
            flex-direction:column;
            justify-content:flex-start;
            padding:1.5rem 1.5rem;
            background:
                linear-gradient(180deg, rgba(255,255,255,0.92) 0%, rgba(248,250,252,0.96) 100%);
        }
        .gac-featured-meta-row {
            display:flex;
            align-items:center;
            gap:0.7rem;
            flex-wrap:wrap;
            margin-bottom:0.95rem;
        }
        .gac-featured-date {
            display:inline-flex;
            align-items:center;
            font-size:0.72rem; font-weight:600;
            color:#64748b;
            letter-spacing:1px; text-transform:uppercase;
        }
        .gac-featured-title {
            font-size:clamp(1.2rem,1.7vw,1.6rem); font-weight:900;
            color:#0f172a; margin:0 0 0.5rem;
            line-height:1.16; letter-spacing:-0.5px;
        }
        .gac-featured-excerpt {
            color:#475569;
            font-size:0.98rem; line-height:1.78;
            margin:0 0 1.35rem;
            display:-webkit-box;
            -webkit-line-clamp:4;
            -webkit-box-orient:vertical;
            overflow:hidden;
        }
        .gac-featured-cta {
            display:inline-flex; align-items:center; gap:0.4rem;
            width:fit-content;
            font-size:0.88rem; font-weight:800;
            color:#00796b;
            border-bottom:1px solid rgba(26,188,156,0.4);
            padding-bottom:1px;
            transition:color 0.2s ease, gap 0.2s ease;
        }
        .gac-featured:hover .gac-featured-cta { color:#004d40; gap:0.7rem; }

        /* Tags */
        .gac-tag {
            display:inline-block;
            font-size:0.65rem; font-weight:700;
            letter-spacing:1.5px; text-transform:uppercase;
            padding:0.22rem 0.75rem; border-radius:50px;
            margin-bottom:0.6rem;
        }
        .gac-tag--news  { background:rgba(0,150,136,0.18); color:#00796b; }
        .gac-tag--event { background:rgba(37,99,235,0.15); color:#1d4ed8; }
        /* On dark overlay */
        .gac-featured-body .gac-tag--news  { background:rgba(15,118,110,0.12); color:#0f766e; }
        .gac-featured-body .gac-tag--event { background:rgba(37,99,235,0.12); color:#1d4ed8; }

        /* Side column */
        .gac-side {
            display:grid;
            grid-template-rows:repeat(2, minmax(0, 1fr));
            gap:1rem;
            height:100%;
        }

        /* Side card */
        .gac-card {
            display:flex; gap:1rem;
            text-decoration:none !important;
            background:rgba(255,255,255,0.92);
            border-radius:18px;
            border:1.5px solid rgba(15,23,42,0.07);
            box-shadow:0 2px 16px rgba(15,23,42,0.06);
            overflow:hidden;
            transition:transform 0.32s cubic-bezier(0.22,1,0.36,1),
                        box-shadow 0.32s ease, border-color 0.22s ease;
            height:100%;
            min-height:0;
        }
        .gac-card:hover {
            transform:translateY(-4px) translateX(3px);
            box-shadow:0 12px 36px rgba(0,150,136,0.13);
            border-color:rgba(0,150,136,0.2);
        }
        .gac-card-img-wrap {
            width:110px; min-width:110px; height:110px;
            flex-shrink:0; overflow:hidden;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:0.6rem;
            background:
                radial-gradient(circle at top, rgba(255,255,255,0.96) 0%, rgba(255,255,255,0.8) 28%, transparent 60%),
                linear-gradient(180deg, #f8fafc 0%, #edf4fb 100%);
            border-right:1px solid rgba(15,23,42,0.06);
        }
        .gac-card-img {
            width:100%; height:100%;
            object-fit:contain; object-position:center;
            max-width:100%; max-height:100%;
            transition:transform 0.45s ease;
            filter:drop-shadow(0 10px 18px rgba(15,23,42,0.12));
        }
        .gac-card:hover .gac-card-img { transform:scale(1.08); }
        .gac-card-img-fallback {
            width:100%; height:100%;
            background:linear-gradient(135deg,rgba(0,150,136,0.12),rgba(59,130,246,0.10));
        }
        .gac-card-body {
            padding:0.75rem 0.9rem 0.75rem 0;
            display:flex; flex-direction:column; justify-content:center;
            flex:1;
        }
        .gac-card-meta { display:flex; align-items:center; gap:0.6rem; margin-bottom:0.4rem; flex-wrap:wrap; }
        .gac-card-date { font-size:0.68rem; color:#94a3b8; font-weight:500; }
        .gac-card-title {
            font-size:1rem; font-weight:800;
            color:#0f172a; margin:0 0 0.35rem;
            line-height:1.34; letter-spacing:-0.25px;
            display:-webkit-box;
            -webkit-line-clamp:2;
            -webkit-box-orient:vertical;
            overflow:hidden;
        }
        .gac-card-excerpt {
            font-size:0.83rem; color:#64748b;
            line-height:1.58; margin:0 0 0.55rem;
            display:-webkit-box;
            -webkit-line-clamp:3;
            -webkit-box-orient:vertical;
            overflow:hidden;
        }
        .gac-card-link {
            display:inline-flex; align-items:center; gap:0.3rem;
            font-size:0.78rem; font-weight:700; color:#00796b;
            transition:gap 0.2s ease, color 0.2s ease;
        }
        .gac-card:hover .gac-card-link { gap:0.55rem; color:#004d40; }

        /* CTA */
        .gac-actions { display:flex; justify-content:center; margin-top:2rem; }
        .gac-btn-all {
            display:inline-flex; align-items:center; gap:0.6rem;
            background:linear-gradient(135deg,#00796b,#1abc9c);
            color:#fff !important;
            font-size:0.92rem; font-weight:700;
            padding:0.85rem 2.2rem;
            border-radius:50px;
            text-decoration:none !important;
            box-shadow:0 6px 20px rgba(0,150,136,0.32);
            transition:transform 0.28s ease, box-shadow 0.28s ease, gap 0.22s ease;
        }
        .gac-btn-all:hover {
            transform:translateY(-3px);
            box-shadow:0 14px 36px rgba(0,150,136,0.42);
            gap:0.9rem;
        }

        @media(max-width:1100px) {
            .gac-featured {
                grid-template-columns:1fr;
            }
            .gac-featured-img-wrap {
                min-height:340px;
                border-right:none;
                border-bottom:1px solid rgba(15,23,42,0.06);
            }
            .gac-side {
                grid-template-rows:unset;
                display:flex;
                flex-direction:column;
                height:auto;
            }
        }

        @media(max-width:640px) {
            .gac-featured {
                border-radius:22px;
            }
            .gac-featured-img-wrap {
                min-height:280px;
                padding:0.9rem;
            }
            .gac-featured-body {
                padding:1.35rem 1.1rem 1.25rem;
            }
            .gac-card {
                flex-direction:column;
            }
            .gac-card-img-wrap {
                width:100%;
                min-width:0;
                height:220px;
                border-right:none;
                border-bottom:1px solid rgba(15,23,42,0.06);
            }
            .gac-card-body {
                padding:1rem 1rem 1.1rem;
            }
        }
        </style>

        <!-- Quick Links Section -->
        <?php echo $__env->make('public.partials.quick_links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Chatbot Widget -->
    <div id="chatbot-widget" class="chatbot-widget">
        <button id="chatbot-toggle" class="chatbot-toggle" aria-label="Abrir Chatbot">
            <span class="chatbot-label">¿Necesitas ayuda?</span>
            <div class="chatbot-avatar-wrap">
                <img src="<?php echo e(asset('assets/images/chatbot-avatar.gif')); ?>" alt="Chatbot ISTS" class="chatbot-avatar">
            </div>
            <span class="chatbot-online-dot" title="En línea"></span>
        </button>

        <div id="chatbot-window" class="chatbot-window" style="display: none;">
            <div class="chatbot-header" style="display: flex; align-items: center; justify-content: space-between;">
                <h3 style="margin:0;">Asistente Virtual ISTS</h3>
                <div style="display: flex; gap: 8px;">
                    <button id="chatbot-clear-history" title="Eliminar historial" style="background: none; border: none; color: #fff; font-size: 18px; cursor: pointer;">🗑️</button>
                    <button id="chatbot-close" aria-label="Cerrar Chatbot">✕</button>
                </div>
            </div>

            <div id="chatbot-messages" class="chatbot-messages">
                <div class="bot-message">
                    <p>¡Hola! 👋 Soy el asistente virtual del ISTS. ¿En qué puedo ayudarte?</p>
                </div>
            </div>

            <form id="chatbot-form" class="chatbot-form">
                <input type="hidden" id="chat-session-id" value="">
                <?php echo csrf_field(); ?>
                <input type="text" id="chatbot-input" name="message" placeholder="Escribe tu pregunta..."
                    maxlength="500" required>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>


    <!-- Redes sociales flotantes lado izquierdo -->
    <style>
        /* === PREMIUM SOCIAL WIDGET === */
        #social-widget {
            filter: drop-shadow(0 8px 32px rgba(0,0,0,0.10));
        }
        .sw-link {
            position: relative;
            border-radius: 50%;
            width: 48px; height: 48px;
            display: flex; align-items: center; justify-content: center;
            text-decoration: none;
            transition: transform 0.35s cubic-bezier(0.22,1,0.36,1),
                        box-shadow 0.35s ease,
                        filter 0.35s ease;
            overflow: visible;
        }
        .sw-link-inner {
            width: 48px; height: 48px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            background: var(--sw-bg);
            position: relative;
            overflow: hidden;
            box-shadow:
                0 4px 16px var(--sw-glow, rgba(0,0,0,0.2)),
                inset 0 1px 2px rgba(255,255,255,0.35),
                inset 0 -1px 2px rgba(0,0,0,0.15);
            border: 1.5px solid rgba(255,255,255,0.25);
            transition: box-shadow 0.35s ease, transform 0.35s cubic-bezier(0.22,1,0.36,1);
        }
        /* Glass sheen on icon */
        .sw-link-inner::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 45%;
            background: linear-gradient(180deg, rgba(255,255,255,0.32) 0%, transparent 100%);
            border-radius: 50%;
            pointer-events: none;
        }
        .sw-link-inner svg {
            position: relative;
            z-index: 1;
            filter: drop-shadow(0 1px 4px rgba(0,0,0,0.18));
            transition: transform 0.35s cubic-bezier(0.22,1,0.36,1);
        }
        /* Tooltip label */
        .sw-tooltip {
            position: absolute;
            left: calc(100% + 12px);
            top: 50%;
            transform: translateY(-50%) translateX(6px);
            background: rgba(15,23,42,0.9);
            color: #fff;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: capitalize;
            padding: 0.3rem 0.75rem;
            border-radius: 8px;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.22s ease, transform 0.22s ease;
            backdrop-filter: blur(8px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.18);
        }
        .sw-tooltip::before {
            content: '';
            position: absolute;
            right: 100%;
            top: 50%;
            transform: translateY(-50%);
            border: 5px solid transparent;
            border-right-color: rgba(15,23,42,0.9);
        }
        .sw-link:hover .sw-tooltip {
            opacity: 1;
            transform: translateY(-50%) translateX(0);
        }
        .sw-link:hover .sw-link-inner {
            transform: scale(1.14);
            box-shadow:
                0 8px 28px var(--sw-glow, rgba(0,0,0,0.35)),
                inset 0 1px 2px rgba(255,255,255,0.45),
                inset 0 -1px 2px rgba(0,0,0,0.1);
        }
        .sw-link:hover .sw-link-inner svg { transform: scale(1.12) rotate(-5deg); }

        /* Pulse ring on hover */
        .sw-link::after {
            content: '';
            position: absolute;
            inset: -4px;
            border-radius: 50%;
            border: 2px solid var(--sw-glow, rgba(255,255,255,0.3));
            opacity: 0;
            transform: scale(0.88);
            transition: opacity 0.35s ease, transform 0.35s ease;
        }
        .sw-link:hover::after {
            opacity: 1;
            transform: scale(1);
        }

        /* === PREMIUM EVENTOS FAB === */
        @keyframes pulse-eventos {
            0%   { box-shadow: 0 0 0 0 rgba(16,185,129,0.4), 0 6px 24px rgba(16,185,129,0.25); }
            70%  { box-shadow: 0 0 0 12px rgba(16,185,129,0.0), 0 6px 24px rgba(16,185,129,0.25); }
            100% { box-shadow: 0 0 0 0 rgba(16,185,129,0.4), 0 6px 24px rgba(16,185,129,0.25); }
        }
        #eventos-fab {
            position: relative;
            border-radius: 50%;
            width: 58px; height: 58px;
            display: flex; align-items: center; justify-content: center;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            box-shadow:
                0 6px 24px rgba(16,185,129,0.35),
                inset 0 1px 2px rgba(255,255,255,0.4),
                inset 0 -1px 2px rgba(0,0,0,0.15);
            border: 1.5px solid rgba(255,255,255,0.25);
            animation: pulse-eventos 2s infinite;
            transition: transform 0.35s cubic-bezier(0.22,1,0.36,1), box-shadow 0.35s ease;
            overflow: visible;
            margin-top: 8px;
            text-decoration: none;
        }
        #eventos-fab::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 45%;
            background: linear-gradient(180deg, rgba(255,255,255,0.28) 0%, transparent 100%);
            border-radius: 50%;
            pointer-events: none;
        }
        #eventos-fab svg {
            filter: drop-shadow(0 2px 6px rgba(0,0,0,0.2));
            transition: transform 0.35s cubic-bezier(0.22,1,0.36,1);
        }
        #eventos-fab:hover {
            transform: scale(1.1) rotate(-4deg);
            box-shadow: 0 10px 32px rgba(16,185,129,0.5), inset 0 1px 2px rgba(255,255,255,0.5);
        }
        #eventos-fab:hover svg { transform: scale(1.08) rotate(5deg); }
        .eventos-fab-label {
            position: absolute;
            bottom: -30px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(15,23,42,0.88);
            color: #10b981;
            font-weight: 800;
            font-size: 0.7rem;
            letter-spacing: 1px;
            border-radius: 8px;
            padding: 3px 10px;
            white-space: nowrap;
            box-shadow: 0 3px 10px rgba(0,0,0,0.15);
            backdrop-filter: blur(6px);
        }
    </style>

    <div id="social-widget"
         style="position:fixed; bottom:7.5rem; left:1.5rem; z-index:2147483646; display:flex; flex-direction:column; gap:10px; align-items:center;">
        <?php
            $socialLinks = \App\Models\SocialLink::where('active', true)->orderBy('id')->get();
        ?>
        <?php $__currentLoopData = $socialLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($link->url); ?>" target="_blank" rel="noopener" title="<?php echo e(ucfirst($link->name)); ?>"
               class="sw-link"
               style="--sw-bg:<?php echo e($link->bg_color); ?>; --sw-glow: rgba(0,0,0,0.25);">
                <div class="sw-link-inner">
                    <?php echo $link->icon_svg; ?>

                </div>
                <span class="sw-tooltip"><?php echo e(ucfirst($link->name)); ?></span>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <!-- Widget flotante de eventos, premium -->
        <a href="<?php echo e(url('/eventos')); ?>" id="eventos-fab" title="Ver eventos ISTS">
            <svg width="28" height="28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 4v2.5M19 4v2.5M4 10.5h20M6 6.5h16a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-13a2 2 0 0 1 2-2z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <rect x="8.5" y="14.5" width="3" height="3" rx="0.5" fill="#fff" opacity="0.85"/>
                <rect x="12.5" y="14.5" width="3" height="3" rx="0.5" fill="#fff" opacity="0.85"/>
                <rect x="16.5" y="14.5" width="3" height="3" rx="0.5" fill="#fff" opacity="0.85"/>
                <rect x="8.5" y="18.5" width="3" height="3" rx="0.5" fill="#fff" opacity="0.65"/>
                <rect x="12.5" y="18.5" width="3" height="3" rx="0.5" fill="#fff" opacity="0.65"/>
            </svg>
            <span class="eventos-fab-label">EVENTOS</span>
        </a>
    </div>
        
        
        </style>

<?php $__env->stopSection(); ?>

<script>
document.addEventListener('DOMContentLoaded', function() {

    // ── Hero indicators sync ──
    const heroCarouselEl = document.getElementById('heroCarousel');
    if (heroCarouselEl) {
        heroCarouselEl.addEventListener('slide.bs.carousel', function(e) {
            const indicators = document.querySelectorAll('.hero-indicator');
            indicators.forEach(function(btn, i) {
                btn.classList.toggle('active', i === e.to);
            });
        });
    }

    const socialWidget = document.getElementById('social-widget');
    const chatbotWidget = document.getElementById('chatbot-widget');
    const footer = document.querySelector('footer'); // Ajusta el selector si tu footer tiene otro tag o clase

    function checkFooterVisibility() {
        if (!footer) return;
        const footerRect = footer.getBoundingClientRect();
        // Si el footer está visible en la ventana
        if (footerRect.top < window.innerHeight) {
            if (socialWidget) socialWidget.style.display = 'none';
            if (chatbotWidget) chatbotWidget.style.display = 'none';
        } else {
            if (socialWidget) socialWidget.style.display = '';
            if (chatbotWidget) chatbotWidget.style.display = '';
        }
    }

    window.addEventListener('scroll', checkFooterVisibility);
    window.addEventListener('resize', checkFooterVisibility);
    checkFooterVisibility();
});
</script>
<?php echo $__env->make('layouts.public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views/public/home.blade.php ENDPATH**/ ?>