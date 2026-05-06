

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

        .premium-main-desc-row.no-main-image {
            grid-template-columns: minmax(0, 1fr);
        }

        .premium-main-desc-row.no-main-image .main-desc-text,
        .premium-main-desc-row.no-main-image .main-desc-content {
            width: 100%;
        }

        .main-desc-content {
            color: #334155;
            font-size: 1.04rem;
            font-weight: 500;
            line-height: 1.72;
            overflow-wrap: break-word;
            hyphens: auto;
        }

        .main-desc-content :last-child {
            margin-bottom: 0;
        }

        .premium-secondary-desc-content p,
        .premium-secondary-desc-content div,
        .premium-secondary-desc-content li,
        .premium-secondary-desc-content span {
            max-width: 100% !important;
            width: auto !important;
            text-align: justify !important;
            text-justify: inter-word !important;
            white-space: normal !important;
        }

        .premium-main-desc-row.no-main-image .main-desc-content,
        .premium-main-desc-row.no-main-image .main-desc-content p,
        .premium-main-desc-row.no-main-image .main-desc-content div,
        .premium-main-desc-row.no-main-image .main-desc-content li,
        .premium-main-desc-row.no-main-image .main-desc-content span {
            text-align: justify !important;
            text-justify: inter-word !important;
            white-space: normal !important;
            max-width: 100% !important;
            width: auto !important;
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
            text-align: justify;
            text-justify: inter-word;
            overflow-wrap: break-word;
            hyphens: auto;
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
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 0.85rem;
        }

        .premium-folder-grid-item,
        .premium-pdf-col {
            min-width: 0;
        }

        .premium-folder-card,
        .premium-pdf-card {
            position: relative;
            display: flex;
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
            min-height: 192px;
            justify-content: space-between;
            padding: 1rem;
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
            width: 46px;
            height: 46px;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            color: #0f766e;
            background: rgba(240, 253, 250, 0.9);
            border: 1px solid rgba(20, 184, 166, 0.28);
        }

        .folder-svg {
            width: 34px;
            height: 28px;
        }

        .folder-title {
            color: #9a3412;
            font-size: 0.9rem;
            font-weight: 900;
            line-height: 1.22;
            word-break: break-word;
        }

        .folder-count {
            width: fit-content;
            color: #92400e;
            background: rgba(254, 243, 199, 0.95);
            border: 1px solid rgba(251, 191, 36, 0.38);
            border-radius: 999px;
            padding: 0.34rem 0.64rem;
            font-size: 0.68rem;
            font-weight: 800;
        }

        .premium-pdf-card {
            cursor: pointer;
            width: 86%;
            min-height: 146px;
            margin: 0 auto;
            padding: 0.7rem;
            gap: 0.38rem;
            background:
                linear-gradient(180deg, rgba(255, 248, 248, 0.95) 0%, rgba(255, 255, 255, 0.98) 28%, rgba(255, 245, 245, 0.96) 100%);
            border: 1px solid rgba(239, 68, 68, 0.16);
            box-shadow: 0 20px 50px rgba(127, 29, 29, 0.08);
        }

        .premium-pdf-card.is-word {
            background:
                linear-gradient(180deg, rgba(239, 246, 255, 0.97) 0%, rgba(255, 255, 255, 0.98) 28%, rgba(239, 246, 255, 0.96) 100%);
            border: 1px solid rgba(37, 99, 235, 0.18);
            box-shadow: 0 20px 50px rgba(30, 64, 175, 0.08);
        }

        .premium-pdf-card::before {
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 4px;
            background: linear-gradient(90deg, #dc2626, #f87171 48%, #fca5a5);
        }

        .premium-pdf-card.is-word::before {
            background: linear-gradient(90deg, #2563eb, #3b82f6 48%, #93c5fd);
        }

        .pdf-card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.45rem;
        }

        .pdf-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            color: #fff;
            background: linear-gradient(90deg, #d92d20, #ef4444);
            border-radius: 999px;
            padding: 0.3rem 0.7rem;
            font-size: 0.56rem;
            font-weight: 900;
            letter-spacing: 0.08em;
            box-shadow: 0 10px 22px rgba(239, 68, 68, 0.18);
        }

        .pdf-icon {
            display: inline-flex;
            width: 32px;
            height: 32px;
            align-items: center;
            justify-content: center;
            color: #c2410c;
            background: linear-gradient(180deg, rgba(255, 237, 237, 0.96), rgba(255, 245, 245, 0.98));
            border: 1px solid rgba(248, 113, 113, 0.22);
            border-radius: 8px;
            font-size: 0.88rem;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.9);
        }

        .pdf-badge.word {
            background: linear-gradient(90deg, #1d4ed8, #3b82f6);
            box-shadow: 0 10px 22px rgba(59, 130, 246, 0.18);
        }

        .pdf-icon.word {
            color: #1d4ed8;
            background: linear-gradient(180deg, rgba(219, 234, 254, 0.96), rgba(239, 246, 255, 0.98));
            border-color: rgba(96, 165, 250, 0.28);
        }

        .pdf-title {
            color: #111827;
            font-size: 0.78rem;
            font-weight: 900;
            line-height: 1.2;
            text-align: left;
            word-break: break-word;
        }

        .pdf-desc {
            color: #475569;
            font-size: 0.68rem;
            line-height: 1.35;
            font-weight: 500;
        }

        .pdf-date {
            margin-top: auto;
            color: #9f1239;
            font-size: 0.58rem;
            font-weight: 800;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .premium-pdf-card.is-word .pdf-date {
            color: #1d4ed8;
        }

        .pdf-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.45rem;
            width: 100%;
            margin-top: 0.2rem;
            color: #fff;
            background: linear-gradient(90deg, #b45353, #d97777 52%, #e79a9a);
            border-radius: 8px;
            padding: 0.5rem 0.7rem;
            font-size: 0.66rem;
            font-weight: 900;
            letter-spacing: 0.2px;
            text-decoration: none;
            position: relative;
            overflow: hidden;
            box-shadow: 0 16px 34px rgba(217, 119, 119, 0.2);
            transition: transform 0.22s ease, box-shadow 0.22s ease, filter 0.22s ease, background 0.22s ease;
        }

        .pdf-btn.word {
            background: linear-gradient(90deg, #2563eb, #3b82f6 52%, #60a5fa);
            box-shadow: 0 16px 34px rgba(59, 130, 246, 0.2);
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

        .pdf-btn.word:hover {
            background: linear-gradient(90deg, #1d4ed8, #2563eb 52%, #60a5fa);
            box-shadow: 0 24px 46px rgba(59, 130, 246, 0.28);
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

        #wordModalViewer {
            display: none;
            flex: 1;
            overflow: auto;
            background: linear-gradient(180deg, #eff6ff 0%, #ffffff 100%);
            padding: 1.4rem;
        }

        #wordModalViewer.active {
            display: block;
        }

        .word-preview-shell {
            max-width: 860px;
            margin: 0 auto;
            border-radius: 8px;
            background: #fff;
            border: 1px solid rgba(37, 99, 235, 0.12);
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
            padding: clamp(1.2rem, 3vw, 2rem);
        }

        .word-preview-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1rem;
            padding-bottom: 0.9rem;
            border-bottom: 1px solid rgba(37, 99, 235, 0.1);
        }

        .word-preview-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            color: #1d4ed8;
            background: rgba(219, 234, 254, 0.92);
            border: 1px solid rgba(96, 165, 250, 0.28);
            border-radius: 999px;
            padding: 0.45rem 0.82rem;
            font-size: 0.78rem;
            font-weight: 900;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .word-preview-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.7rem;
        }

        .word-preview-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 40px;
            padding: 0.72rem 1rem;
            border-radius: 8px;
            background: linear-gradient(90deg, #2563eb, #3b82f6);
            color: #fff;
            font-size: 0.9rem;
            font-weight: 800;
            text-decoration: none;
            box-shadow: 0 14px 30px rgba(59, 130, 246, 0.18);
        }

        .word-preview-link:hover {
            color: #fff;
        }

        .word-preview-content {
            color: #334155;
            font-size: 1rem;
            line-height: 1.75;
        }

        .word-preview-content p,
        .word-preview-content li {
            margin-bottom: 0.95rem;
        }

        .word-preview-empty {
            color: #475569;
            font-size: 0.98rem;
            line-height: 1.7;
            border-radius: 8px;
            background: rgba(239, 246, 255, 0.9);
            border: 1px dashed rgba(59, 130, 246, 0.28);
            padding: 1rem 1.1rem;
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

            .premium-folder-card {
                min-height: 176px;
            }

            .premium-pdf-card {
                width: 100%;
                min-height: 142px;
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
            <section class="premium-main-desc-row<?php echo e($mainDesign->main_image_path ? '' : ' no-main-image'); ?>">
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
                        <?php
                            $documentPath = ltrim($pdf->pdf_path, '/');
                            $documentUrl = asset('storage/' . $documentPath);
                            $documentExtension = \Illuminate\Support\Str::lower(pathinfo($documentPath, PATHINFO_EXTENSION));
                            $isWordDocument = in_array($documentExtension, ['doc', 'docx'], true);
                            $documentTypeLabel = $isWordDocument ? strtoupper($documentExtension) : 'PDF';
                            $previewMode = $documentExtension === 'docx' ? 'docx' : ($documentExtension === 'doc' ? 'doc' : 'pdf');
                        ?>
                        <div class="premium-pdf-col">
                            <div class="premium-pdf-card<?php echo e($isWordDocument ? ' is-word' : ''); ?>" tabindex="0" role="button" data-pdf-title="<?php echo e($pdf->title); ?>" data-pdf-url="<?php echo e($documentUrl); ?>" data-preview-mode="<?php echo e($previewMode); ?>" data-file-extension="<?php echo e($documentExtension); ?>">
                                <div class="pdf-card-top">
                                    <span class="pdf-badge<?php echo e($isWordDocument ? ' word' : ''); ?>"><?php echo e($documentTypeLabel); ?></span>
                                    <span class="pdf-icon<?php echo e($isWordDocument ? ' word' : ''); ?>"><i class="fa <?php echo e($isWordDocument ? 'fa-file-word-o' : 'fa-file-pdf-o'); ?>" aria-hidden="true"></i></span>
                                </div>
                                <div class="pdf-title"><?php echo e($pdf->title); ?></div>
                                <?php if($pdf->description): ?>
                                    <div class="pdf-desc"><?php echo e($pdf->description); ?></div>
                                <?php endif; ?>
                                <div class="pdf-date">Actualizado <?php echo e($pdf->updated_at ? $pdf->updated_at->format('d/m/Y') : ''); ?></div>
                                <a href="#" class="pdf-btn<?php echo e($isWordDocument ? ' word' : ''); ?> open-pdf-modal" data-pdf-url="<?php echo e($documentUrl); ?>" data-pdf-title="<?php echo e($pdf->title); ?>" data-preview-mode="<?php echo e($previewMode); ?>" data-file-extension="<?php echo e($documentExtension); ?>" onclick="event.preventDefault(); event.stopPropagation();">
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
                    <iframe id="pdfModalViewer" title="Vista previa de documento"></iframe>
                    <div id="wordModalViewer">
                        <div class="word-preview-shell">
                            <div class="word-preview-toolbar">
                                <span id="wordPreviewBadge" class="word-preview-badge">WORD</span>
                                <div class="word-preview-actions">
                                    <a id="wordPreviewOpenLink" class="word-preview-link" href="#" target="_blank" rel="noopener">Abrir documento</a>
                                </div>
                            </div>
                            <div id="wordPreviewContent" class="word-preview-content"></div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://unpkg.com/mammoth@1.8.0/mammoth.browser.min.js"></script>
            <script>
                function escapeHtml(value) {
                    return String(value || '')
                        .replace(/&/g, '&amp;')
                        .replace(/</g, '&lt;')
                        .replace(/>/g, '&gt;')
                        .replace(/"/g, '&quot;')
                        .replace(/'/g, '&#039;');
                }

                function resetDocumentPreviewState() {
                    const iframeViewer = document.getElementById('pdfModalViewer');
                    const wordViewer = document.getElementById('wordModalViewer');
                    const wordContent = document.getElementById('wordPreviewContent');

                    if (iframeViewer) {
                        iframeViewer.style.display = 'block';
                        iframeViewer.src = '';
                    }

                    if (wordViewer) {
                        wordViewer.classList.remove('active');
                    }

                    if (wordContent) {
                        wordContent.innerHTML = '';
                    }
                }

                function openPdfModal(url, title, previewMode, extension) {
                    const modal = document.getElementById('pdfModalBackdrop');
                    const titleNode = document.getElementById('pdfModalTitle');
                    const iframeViewer = document.getElementById('pdfModalViewer');
                    const wordViewer = document.getElementById('wordModalViewer');
                    const wordContent = document.getElementById('wordPreviewContent');
                    const wordLink = document.getElementById('wordPreviewOpenLink');
                    const wordBadge = document.getElementById('wordPreviewBadge');

                    if (!modal || !titleNode || !url) {
                        return;
                    }

                    resetDocumentPreviewState();
                    titleNode.textContent = title || 'Documento';

                    if (previewMode === 'docx' && wordViewer && wordContent) {
                        if (iframeViewer) {
                            iframeViewer.style.display = 'none';
                        }

                        wordViewer.classList.add('active');
                        wordBadge.textContent = 'DOCX';
                        wordLink.href = url;
                        wordContent.innerHTML = '<div class="word-preview-empty">Cargando vista previa del documento de Word...</div>';

                        fetch(url)
                            .then(function(response) {
                                if (!response.ok) {
                                    throw new Error('No se pudo cargar el documento.');
                                }
                                return response.arrayBuffer();
                            })
                            .then(function(arrayBuffer) {
                                if (!window.mammoth) {
                                    throw new Error('La librería de vista previa no está disponible.');
                                }

                                return window.mammoth.convertToHtml({ arrayBuffer: arrayBuffer });
                            })
                            .then(function(result) {
                                const html = result && result.value ? result.value : '';
                                wordContent.innerHTML = html || '<div class="word-preview-empty">No se encontraron bloques de contenido para mostrar en la vista previa.</div>';
                            })
                            .catch(function() {
                                wordContent.innerHTML = '<div class="word-preview-empty">No fue posible generar la vista previa de este archivo Word en este momento. Puedes abrirlo directamente con el botón superior.</div>';
                            });
                    } else if (previewMode === 'doc' && wordViewer && wordContent) {
                        if (iframeViewer) {
                            iframeViewer.style.display = 'none';
                        }

                        wordViewer.classList.add('active');
                        wordBadge.textContent = 'DOC';
                        wordLink.href = url;
                        wordContent.innerHTML =
                            '<div class="word-preview-empty">' +
                            'La vista previa completa para archivos <strong>.doc</strong> puede variar según el navegador. ' +
                            'Puedes abrir el documento directamente para revisarlo en una nueva pestaña.' +
                            '</div>';
                    } else if (iframeViewer) {
                        iframeViewer.style.display = 'block';
                        iframeViewer.src = url + '#toolbar=1&navpanes=0&view=FitH';
                    }

                    modal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                }

                function closePdfModal() {
                    const modal = document.getElementById('pdfModalBackdrop');

                    if (!modal) {
                        return;
                    }

                    modal.classList.remove('active');
                    resetDocumentPreviewState();
                    document.body.style.overflow = '';
                }

                document.querySelectorAll('.premium-pdf-card').forEach(function(card) {
                    card.addEventListener('click', function() {
                        openPdfModal(card.dataset.pdfUrl, card.dataset.pdfTitle, card.dataset.previewMode, card.dataset.fileExtension);
                    });

                    card.addEventListener('keydown', function(event) {
                        if (event.key === 'Enter' || event.key === ' ') {
                            event.preventDefault();
                            openPdfModal(card.dataset.pdfUrl, card.dataset.pdfTitle, card.dataset.previewMode, card.dataset.fileExtension);
                        }
                    });
                });

                document.querySelectorAll('.open-pdf-modal').forEach(function(button) {
                    button.addEventListener('click', function(event) {
                        event.preventDefault();
                        event.stopPropagation();
                        openPdfModal(button.dataset.pdfUrl, button.dataset.pdfTitle, button.dataset.previewMode, button.dataset.fileExtension);
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