

<?php $__env->startSection('content'); ?>
<?php
    $folderCount = isset($childrenWithPdfs) ? $childrenWithPdfs->count() : 0;
    $documentCount = $pdfs->count();
?>

<main class="main-content menu-designs-premium">
    <style>
        .menu-designs-premium {
            background:
                linear-gradient(180deg, rgba(240, 253, 250, 0.95) 0%, rgba(248, 250, 252, 1) 46%, rgba(239, 246, 255, 1) 100%);
            min-height: 100vh;
            padding: 42px 0 70px;
        }

        .menu-designs-shell {
            max-width: 1180px;
            margin: 0 auto;
            padding: 0 18px;
        }

        .menu-hero {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            background:
                linear-gradient(135deg, rgba(8, 91, 102, 0.96), rgba(10, 165, 168, 0.9) 52%, rgba(34, 197, 94, 0.82));
            color: #fff;
            padding: clamp(2rem, 4vw, 3.5rem);
            box-shadow: 0 24px 70px rgba(15, 23, 42, 0.16);
            border: 1px solid rgba(255, 255, 255, 0.35);
        }

        .menu-hero::after {
            content: "";
            position: absolute;
            inset: auto 0 0 0;
            height: 46%;
            background: linear-gradient(180deg, transparent, rgba(2, 44, 34, 0.18));
            pointer-events: none;
        }

        .menu-hero-content {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto;
            gap: 2rem;
            align-items: end;
        }

        .menu-hero-eyebrow {
            margin: 0 0 0.65rem;
            color: rgba(255, 255, 255, 0.82);
            font-size: 0.78rem;
            font-weight: 800;
            letter-spacing: 2.5px;
            text-transform: uppercase;
        }

        .menu-hero-title {
            margin: 0;
            max-width: 820px;
            color: #fff;
            font-size: clamp(1.7rem, 3.35vw, 3rem);
            font-weight: 900;
            line-height: 1.02;
        }

        .menu-hero-metrics {
            display: grid;
            grid-template-columns: repeat(2, minmax(126px, 1fr));
            gap: 0.8rem;
        }

        .menu-hero-metric {
            background: rgba(255, 255, 255, 0.14);
            border: 1px solid rgba(255, 255, 255, 0.32);
            border-radius: 8px;
            padding: 1rem 1.05rem;
            backdrop-filter: blur(14px);
        }

        .menu-hero-number {
            display: block;
            font-size: 2rem;
            font-weight: 900;
            line-height: 1;
        }

        .menu-hero-label {
            display: block;
            margin-top: 0.35rem;
            color: rgba(255, 255, 255, 0.78);
            font-size: 0.78rem;
            font-weight: 800;
            letter-spacing: 1.4px;
            text-transform: uppercase;
        }

        .premium-main-desc-row {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(240px, 360px);
            gap: 1.4rem;
            align-items: stretch;
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid rgba(14, 165, 168, 0.22);
            border-radius: 8px;
            box-shadow: 0 18px 55px rgba(15, 23, 42, 0.09);
            padding: clamp(1.1rem, 3vw, 1.7rem);
            margin: 1.35rem 0 2rem;
        }

        .main-desc-text {
            display: flex;
            align-items: center;
            min-width: 0;
        }

        .main-desc-content {
            color: #334155;
            font-size: 1.04rem;
            font-weight: 500;
            line-height: 1.72;
        }

        .main-desc-content :last-child {
            margin-bottom: 0;
        }

        .main-desc-block + .main-desc-block {
            margin-top: 1rem;
        }

        .main-desc-img {
            display: flex;
            min-height: 220px;
            overflow: hidden;
            border-radius: 8px;
            background: #e0f2fe;
            border: 1px solid rgba(14, 165, 168, 0.25);
        }

        .main-desc-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .premium-secondary-desc-card {
            margin-top: -0.55rem;
            margin-bottom: 2rem;
            padding: clamp(1.1rem, 3vw, 1.6rem);
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.96);
            border: 1px solid rgba(14, 165, 168, 0.18);
            box-shadow: 0 16px 44px rgba(15, 23, 42, 0.08);
        }

        .premium-secondary-desc-content {
            color: #334155;
            font-size: 1rem;
            font-weight: 500;
            line-height: 1.72;
        }

        .premium-secondary-desc-content :last-child {
            margin-bottom: 0;
        }

        .premium-section {
            margin-top: 2rem;
        }

        .premium-section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .premium-section-title {
            margin: 0;
            color: #087f83;
            font-size: clamp(1.35rem, 2.4vw, 1.85rem);
            font-weight: 900;
            line-height: 1.1;
        }

        .premium-section-pill {
            flex: none;
            color: #0f766e;
            background: rgba(204, 251, 241, 0.82);
            border: 1px solid rgba(20, 184, 166, 0.24);
            border-radius: 999px;
            padding: 0.42rem 0.8rem;
            font-size: 0.78rem;
            font-weight: 800;
        }

        .premium-folder-grid,
        .premium-pdf-row {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1.1rem;
        }

        .premium-folder-grid-item,
        .premium-pdf-col {
            min-width: 0;
        }

        .premium-folder-card,
        .premium-pdf-card {
            position: relative;
            display: flex;
            min-height: 226px;
            height: 100%;
            flex-direction: column;
            overflow: hidden;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.96);
            border: 1px solid rgba(14, 165, 168, 0.24);
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
            text-decoration: none;
            transition: transform 0.22s ease, box-shadow 0.22s ease, border-color 0.22s ease;
        }

        .premium-folder-card {
            justify-content: space-between;
            padding: 1.25rem;
            background: linear-gradient(145deg, #fffaf0 0%, #ffffff 58%, #ecfeff 100%);
        }

        .premium-folder-card:hover,
        .premium-pdf-card:hover {
            transform: translateY(-5px);
            border-color: rgba(14, 165, 168, 0.62);
            box-shadow: 0 26px 70px rgba(15, 23, 42, 0.14);
        }

        .folder-icon {
            display: inline-flex;
            width: 58px;
            height: 58px;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            color: #0f766e;
            background: rgba(240, 253, 250, 0.9);
            border: 1px solid rgba(20, 184, 166, 0.28);
        }

        .folder-svg {
            width: 44px;
            height: 36px;
        }

        .folder-title {
            color: #9a3412;
            font-size: 1.25rem;
            font-weight: 900;
            line-height: 1.18;
            word-break: break-word;
        }

        .folder-count {
            width: fit-content;
            color: #92400e;
            background: rgba(254, 243, 199, 0.95);
            border: 1px solid rgba(251, 191, 36, 0.38);
            border-radius: 999px;
            padding: 0.42rem 0.75rem;
            font-size: 0.9rem;
            font-weight: 800;
        }

        .premium-pdf-card {
            cursor: pointer;
            padding: 1.25rem;
            gap: 0.8rem;
            background:
                linear-gradient(180deg, rgba(255, 248, 248, 0.95) 0%, rgba(255, 255, 255, 0.98) 28%, rgba(255, 245, 245, 0.96) 100%);
            border: 1px solid rgba(239, 68, 68, 0.16);
            box-shadow: 0 20px 50px rgba(127, 29, 29, 0.08);
        }

        .premium-pdf-card::before {
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 4px;
            background: linear-gradient(90deg, #dc2626, #f87171 48%, #fca5a5);
        }

        .pdf-card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.7rem;
        }

        .pdf-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            color: #fff;
            background: linear-gradient(90deg, #d92d20, #ef4444);
            border-radius: 999px;
            padding: 0.44rem 0.92rem;
            font-size: 0.78rem;
            font-weight: 900;
            letter-spacing: 1px;
            box-shadow: 0 10px 22px rgba(239, 68, 68, 0.18);
        }

        .pdf-icon {
            display: inline-flex;
            width: 48px;
            height: 48px;
            align-items: center;
            justify-content: center;
            color: #c2410c;
            background: linear-gradient(180deg, rgba(255, 237, 237, 0.96), rgba(255, 245, 245, 0.98));
            border: 1px solid rgba(248, 113, 113, 0.22);
            border-radius: 8px;
            font-size: 1.35rem;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.9);
        }

        .pdf-title {
            color: #111827;
            font-size: 1.22rem;
            font-weight: 900;
            line-height: 1.22;
            text-align: left;
            word-break: break-word;
        }

        .pdf-desc {
            color: #475569;
            font-size: 0.95rem;
            line-height: 1.55;
            font-weight: 500;
        }

        .pdf-date {
            margin-top: auto;
            color: #9f1239;
            font-size: 0.82rem;
            font-weight: 800;
            letter-spacing: 0.8px;
            text-transform: uppercase;
        }

        .pdf-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.55rem;
            width: 100%;
            margin-top: 0.3rem;
            color: #fff;
            background: linear-gradient(90deg, #b45353, #d97777 52%, #e79a9a);
            border-radius: 8px;
            padding: 0.82rem 1rem;
            font-size: 0.96rem;
            font-weight: 900;
            letter-spacing: 0.2px;
            text-decoration: none;
            position: relative;
            overflow: hidden;
            box-shadow: 0 16px 34px rgba(217, 119, 119, 0.2);
            transition: transform 0.22s ease, box-shadow 0.22s ease, filter 0.22s ease, background 0.22s ease;
        }

        .pdf-btn::before {
            content: "";
            position: absolute;
            top: 0;
            left: -140%;
            width: 65%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.32), transparent);
            transform: skewX(-22deg);
            transition: left 0.55s ease;
            pointer-events: none;
        }

        .pdf-btn i {
            transition: transform 0.22s ease;
        }

        .pdf-btn:hover {
            color: #fff;
            background: linear-gradient(90deg, #c16363, #de8787 52%, #efb1b1);
            transform: translateY(-2px) scale(1.01);
            filter: saturate(1.08);
            box-shadow: 0 24px 46px rgba(217, 119, 119, 0.28);
        }

        .pdf-btn:hover::before {
            left: 150%;
        }

        .pdf-btn:hover i {
            transform: translateX(4px);
        }

        .menu-empty-state {
            border-radius: 8px;
            background: #fff;
            border: 1px solid rgba(14, 165, 168, 0.22);
            color: #475569;
            padding: 1.2rem 1.4rem;
            box-shadow: 0 14px 34px rgba(15, 23, 42, 0.07);
        }

        #pdfModalBackdrop {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 24px;
            background: rgba(15, 23, 42, 0.58);
            backdrop-filter: blur(8px);
        }

        #pdfModalBackdrop.active {
            display: flex;
        }

        #pdfModal {
            display: flex;
            flex-direction: column;
            width: min(1120px, 96vw);
            height: min(86vh, 820px);
            overflow: hidden;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 32px 90px rgba(15, 23, 42, 0.34);
        }

        #pdfModalHeader {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1rem 1.2rem;
            color: #fff;
            background: linear-gradient(90deg, #0f766e, #0ea5a8);
            font-size: 1rem;
            font-weight: 900;
        }

        #pdfModalClose {
            flex: none;
            width: 38px;
            height: 38px;
            border: 1px solid rgba(255, 255, 255, 0.32);
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.16);
            color: #fff;
            font-size: 1.5rem;
            line-height: 1;
            cursor: pointer;
        }

        #pdfModalViewer {
            width: 100%;
            flex: 1;
            border: 0;
            background: #f8fafc;
        }

        @media (max-width: 992px) {
            .menu-hero-content {
                grid-template-columns: 1fr;
            }

            .menu-hero-metrics {
                max-width: 360px;
            }

            .premium-main-desc-row {
                grid-template-columns: 1fr;
            }

            .premium-folder-grid,
            .premium-pdf-row {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 640px) {
            .menu-designs-premium {
                padding-top: 24px;
            }

            .menu-hero {
                padding: 1.35rem;
            }

            .menu-hero-metrics,
            .premium-folder-grid,
            .premium-pdf-row {
                grid-template-columns: 1fr;
            }

            .premium-section-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .premium-folder-card,
            .premium-pdf-card {
                min-height: 196px;
            }

            #pdfModalBackdrop {
                padding: 10px;
            }

            #pdfModal {
                width: 100%;
                height: 82vh;
            }
        }
    </style>

    <div class="menu-designs-shell">
        <section class="menu-hero">
            <div class="menu-hero-content">
                <div>
                    <p class="menu-hero-eyebrow">Documentos institucionales</p>
                    <h1 class="menu-hero-title"><?php echo e($menuItem->title); ?></h1>
                </div>

                <div class="menu-hero-metrics" aria-label="Resumen de contenidos">
                    <div class="menu-hero-metric">
                        <span class="menu-hero-number"><?php echo e($folderCount); ?></span>
                        <span class="menu-hero-label">Carpetas</span>
                    </div>
                    <div class="menu-hero-metric">
                        <span class="menu-hero-number"><?php echo e($documentCount); ?></span>
                        <span class="menu-hero-label">Documentos</span>
                    </div>
                </div>
            </div>
        </section>

        <?php if(isset($mainDesign) && ($mainDesign->main_description || $mainDesign->main_image_path)): ?>
            <section class="premium-main-desc-row">
                <?php if($mainDesign->main_description): ?>
                    <div class="main-desc-text">
                        <div class="main-desc-content">
                            <div class="main-desc-block"><?php echo $mainDesign->main_description; ?></div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if($mainDesign->main_image_path): ?>
                    <div class="main-desc-img">
                        <img src="<?php echo e(asset('storage/' . ltrim($mainDesign->main_image_path, '/'))); ?>" alt="<?php echo e($menuItem->title); ?>">
                    </div>
                <?php endif; ?>
            </section>
        <?php endif; ?>

        <?php if(isset($mainDesign) && $mainDesign->main_description_2): ?>
            <section class="premium-secondary-desc-card">
                <div class="premium-secondary-desc-content"><?php echo $mainDesign->main_description_2; ?></div>
            </section>
        <?php endif; ?>

        <?php if(isset($childrenWithPdfs) && $childrenWithPdfs->count()): ?>
            <section class="premium-section">
                <div class="premium-section-heading">
                    <h2 class="premium-section-title">Carpetas</h2>
                    <span class="premium-section-pill"><?php echo e($folderCount); ?> carpeta(s)</span>
                </div>

                <div class="premium-folder-grid">
                    <?php $__currentLoopData = $childrenWithPdfs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="premium-folder-grid-item">
                            <a href="<?php echo e(route('public.menu-designs.show', $child->id)); ?>" class="premium-folder-card">
                                <span class="folder-icon">
                                    <svg class="folder-svg" viewBox="0 0 60 48" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <rect x="2" y="14" width="56" height="30" rx="6" fill="currentColor" fill-opacity="0.14"/>
                                        <path d="M6 14V10a4 4 0 0 1 4-4h12l4 6h24a4 4 0 0 1 4 4v2" fill="currentColor" fill-opacity="0.26"/>
                                        <rect x="2" y="14" width="56" height="30" rx="6" stroke="currentColor" stroke-width="2"/>
                                        <path d="M6 14V10a4 4 0 0 1 4-4h12l4 6h24a4 4 0 0 1 4 4v2" stroke="currentColor" stroke-width="2"/>
                                    </svg>
                                </span>
                                <div class="folder-title"><?php echo e($child->title); ?></div>
                                <div class="folder-count"><?php echo e($child->visiblePdfCountRecursive()); ?> documento(s)</div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </section>
        <?php endif; ?>

        <?php if($pdfs->count()): ?>
            <section class="premium-section">
                <div class="premium-section-heading">
                    <h2 class="premium-section-title">Documentos de <?php echo e($menuItem->title); ?></h2>
                    <span class="premium-section-pill"><?php echo e($documentCount); ?> documento(s)</span>
                </div>

                <div class="premium-pdf-row">
                    <?php $__currentLoopData = $pdfs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pdf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="premium-pdf-col">
                            <div class="premium-pdf-card" tabindex="0" role="button" data-pdf-title="<?php echo e($pdf->title); ?>" data-pdf-url="<?php echo e(asset('storage/' . ltrim($pdf->pdf_path, '/'))); ?>">
                                <div class="pdf-card-top">
                                    <span class="pdf-badge">PDF</span>
                                    <span class="pdf-icon"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
                                </div>
                                <div class="pdf-title"><?php echo e($pdf->title); ?></div>
                                <?php if($pdf->description): ?>
                                    <div class="pdf-desc"><?php echo e($pdf->description); ?></div>
                                <?php endif; ?>
                                <div class="pdf-date">Actualizado <?php echo e($pdf->updated_at ? $pdf->updated_at->format('d/m/Y') : ''); ?></div>
                                <a href="#" class="pdf-btn open-pdf-modal" data-pdf-url="<?php echo e(asset('storage/' . ltrim($pdf->pdf_path, '/'))); ?>" data-pdf-title="<?php echo e($pdf->title); ?>" onclick="event.preventDefault(); event.stopPropagation();">
                                    Ver documento <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </section>

            <div id="pdfModalBackdrop">
                <div id="pdfModal">
                    <div id="pdfModalHeader">
                        <span id="pdfModalTitle"></span>
                        <button id="pdfModalClose" type="button" aria-label="Cerrar">&times;</button>
                    </div>
                    <iframe id="pdfModalViewer" title="Vista previa de documento PDF"></iframe>
                </div>
            </div>

            <script>
                function openPdfModal(url, title) {
                    const modal = document.getElementById('pdfModalBackdrop');
                    const viewer = document.getElementById('pdfModalViewer');
                    const titleNode = document.getElementById('pdfModalTitle');

                    if (!modal || !viewer || !titleNode || !url) {
                        return;
                    }

                    viewer.src = url + '#toolbar=1&navpanes=0&view=FitH';
                    titleNode.textContent = title || 'Documento';
                    modal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                }

                function closePdfModal() {
                    const modal = document.getElementById('pdfModalBackdrop');
                    const viewer = document.getElementById('pdfModalViewer');

                    if (!modal || !viewer) {
                        return;
                    }

                    modal.classList.remove('active');
                    viewer.src = '';
                    document.body.style.overflow = '';
                }

                document.querySelectorAll('.premium-pdf-card').forEach(function(card) {
                    card.addEventListener('click', function() {
                        openPdfModal(card.dataset.pdfUrl, card.dataset.pdfTitle);
                    });

                    card.addEventListener('keydown', function(event) {
                        if (event.key === 'Enter' || event.key === ' ') {
                            event.preventDefault();
                            openPdfModal(card.dataset.pdfUrl, card.dataset.pdfTitle);
                        }
                    });
                });

                document.querySelectorAll('.open-pdf-modal').forEach(function(button) {
                    button.addEventListener('click', function(event) {
                        event.preventDefault();
                        event.stopPropagation();
                        openPdfModal(button.dataset.pdfUrl, button.dataset.pdfTitle);
                    });
                });

                const closeButton = document.getElementById('pdfModalClose');
                const backdrop = document.getElementById('pdfModalBackdrop');

                if (closeButton) {
                    closeButton.addEventListener('click', closePdfModal);
                }

                if (backdrop) {
                    backdrop.addEventListener('click', function(event) {
                        if (event.target === backdrop) {
                            closePdfModal();
                        }
                    });
                }

                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Escape') {
                        closePdfModal();
                    }
                });
            </script>
        <?php endif; ?>
    </div>
</main>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views/public/menu_designs/show.blade.php ENDPATH**/ ?>