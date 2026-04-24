<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo e(is_array($content) ? ($content['description'] ?? '') : ($content->description ?? '')); ?>">
    <title><?php echo e(is_array($content) ? ($content['title'] ?? 'Contenido - ISTS') : ($content->title ?? 'Contenido - ISTS')); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="icon" type="image/png" href="<?php echo e(asset('assets/images/logoists.png')); ?>" sizes="32x32">
</head>
<body>
    <div style="padding-top: 90px;"></div>
    <?php echo $__env->make('public.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php
        $contentData = is_array($content) ? $content : (array) $content;
        $slug = $contentData['slug'] ?? null;
        $category = $contentData['category'] ?? null;
        $children = $children ?? [];
        $isTransparency = $category === 'transparency' || !empty($children);
        $isRendicion = $slug === 'rendicion-de-cuentas';
        $isOrganigrama = $slug === 'organigrama';

        $contentFile = $contentData['file_url'] ?? $contentData['url'] ?? null;
        if (!empty($contentFile)) {
            if (filter_var($contentFile, FILTER_VALIDATE_URL)) {
                $contentFileLink = $contentFile;
            } elseif (strpos($contentFile, '/uploads') === 0 || strpos($contentFile, 'uploads/') === 0) {
                $contentFileLink = asset(ltrim($contentFile, '/'));
            } else {
                $contentFileLink = asset('storage/' . ltrim($contentFile, '/'));
            }
        } else {
            $contentFileLink = null;
        }

        $imgPath = $contentData['image_url'] ?? $contentData['image_path'] ?? null;
        if (!empty($imgPath)) {
            if (filter_var($imgPath, FILTER_VALIDATE_URL)) {
                $imgSrc = $imgPath;
            } elseif (strpos($imgPath, '/uploads') === 0 && file_exists(public_path(ltrim($imgPath, '/')))) {
                $imgSrc = asset(ltrim($imgPath, '/'));
            } elseif (strpos($imgPath, 'uploads/') === 0 && file_exists(public_path($imgPath))) {
                $imgSrc = asset($imgPath);
            } elseif (strpos($imgPath, '/assets') === 0 || strpos($imgPath, 'assets/') === 0) {
                $imgSrc = asset(ltrim($imgPath, '/'));
            } elseif (strpos($imgPath, 'storage/') === 0) {
                $imgSrc = asset($imgPath);
            } else {
                $imgSrc = asset('storage/' . ltrim($imgPath, '/'));
            }
        } else {
            $imgSrc = asset('assets/img/institucional-placeholder.png');
        }
    ?>

    <section>
        <div class="container">
            <h1 class="detail-title"><?php echo e($contentData['title'] ?? 'Contenido'); ?></h1>
        </div>
    </section>

    <section class="about-content">
        <div class="container">
            <?php if(!$isTransparency): ?>
                <div class="content-intro-grid<?php echo e($isOrganigrama ? ' content-intro-grid--organigrama' : ''); ?>">
                    <div class="content-image-box">
                        <img src="<?php echo e($imgSrc); ?>" alt="<?php echo e($contentData['title'] ?? 'Imagen de contenido'); ?>">
                    </div>
                    <?php if(!$isOrganigrama || !empty(trim(strip_tags($contentData['content'] ?? '')))): ?>
                        <div class="content-text-box">
                            <?php echo $contentData['content'] ?? ''; ?>

                        </div>
                    <?php endif; ?>
                </div>

                <?php if($contentFileLink): ?>
                    <div class="content-file-download">
                        <a href="<?php echo e($contentFileLink); ?>" target="_blank" class="pdf-pro-link">Ver PDF</a>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <?php if(!$isRendicion && !empty($contentData['description'])): ?>
                    <p class="transparency-intro"><?php echo e($contentData['description']); ?></p>
                <?php endif; ?>

                <?php if($contentFileLink): ?>
                    <div class="content-file-download" style="margin-bottom: 1.25rem;">
                        <a href="<?php echo e($contentFileLink); ?>" target="_blank" class="pdf-pro-link">Abrir documento principal</a>
                    </div>
                <?php endif; ?>

                <?php if(!empty($children) && count($children) > 0): ?>
                    <div class="subreglamentos-list">
                        <h2 class="subreglamentos-title">Submenús y Documentos</h2>
                        <div class="transparency-level-grid">
                            <?php $__currentLoopData = $children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $childFile = $child['file_url'] ?? $child['url'] ?? null;
                                    if (!empty($childFile)) {
                                        if (filter_var($childFile, FILTER_VALIDATE_URL)) {
                                            $childFileLink = $childFile;
                                        } elseif (strpos($childFile, '/uploads') === 0 || strpos($childFile, 'uploads/') === 0) {
                                            $childFileLink = asset(ltrim($childFile, '/'));
                                        } else {
                                            $childFileLink = asset('storage/' . ltrim($childFile, '/'));
                                        }
                                    } else {
                                        $childFileLink = null;
                                    }
                                    $isChildFolder = !empty($child['children_count']);
                                    $childHref = ($childFileLink && !$isChildFolder) ? $childFileLink : route('content.show', $child['slug']);
                                    $childTarget = ($childFileLink && !$isChildFolder) ? '_blank' : '_self';
                                ?>
                                <a href="<?php echo e($childHref); ?>" target="<?php echo e($childTarget); ?>" class="transparency-level-card">
                                    <div class="level-card-head">
                                        <h3 class="level-card-title"><?php echo e($child['title']); ?></h3>
                                    </div>
                                    <div class="level-card-body">
                                        <?php if(!empty($child['description'])): ?>
                                            <p class="level-card-description"><?php echo e(\Illuminate\Support\Str::limit(strip_tags($child['description']), 120)); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>

    <?php echo $__env->make('public.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <style>
        .detail-title {
            margin-top: 0;
            margin-bottom: 1.5rem;
            color: #009e60;
        }

        .content-intro-grid {
            display: flex;
            gap: 2rem;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .content-image-box {
            flex: 0 0 320px;
            max-width: 320px;
            background: #f6f6f6;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
            padding: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .content-image-box img {
            max-width: 100%;
            max-height: 260px;
            border-radius: 8px;
            object-fit: cover;
        }

        .content-text-box {
            flex: 1;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            padding: 1.5rem;
        }

        .content-intro-grid--organigrama {
            display: grid;
            grid-template-columns: 1fr;
            justify-items: center;
            gap: 1.25rem;
        }

        .content-intro-grid--organigrama .content-image-box {
            width: min(860px, 100%);
            max-width: 860px;
            flex-basis: auto;
            padding: 1.15rem;
            background: #ffffff;
            border: 1px solid rgba(14, 165, 162, 0.14);
            box-shadow: 0 16px 38px rgba(15, 23, 42, 0.12);
        }

        .content-intro-grid--organigrama .content-image-box img {
            width: 100%;
            max-height: none;
            border-radius: 10px;
            object-fit: contain;
        }

        .content-intro-grid--organigrama .content-text-box {
            width: min(980px, 100%);
        }

        .content-file-download {
            text-align: center;
            margin-top: 2rem;
        }

        .transparency-intro {
            font-size: 1.05rem;
            color: #334155;
            margin: 0 0 1rem;
        }

        .subreglamentos-list {
            margin-bottom: 3.5rem;
            padding-bottom: 1.25rem;
        }

        .subreglamentos-title {
            color: #009e60;
            text-align: center;
            margin: 0 0 1rem;
        }

        .transparency-level-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 0.9rem;
            max-width: 980px;
            margin: 0 auto;
            text-align: left;
        }

        .transparency-level-card {
            border: 1px solid #93c5fd;
            border-radius: 10px;
            background: linear-gradient(180deg, #f7fbff 0%, #eef6ff 100%);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            min-height: 180px;
            text-decoration: none;
            transition: transform 0.16s ease, box-shadow 0.16s ease, border-color 0.16s ease;
        }

        .transparency-level-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(30, 64, 175, 0.14);
            border-color: #60a5fa;
        }

        .level-card-head {
            display: flex;
            align-items: flex-start;
            gap: 0.55rem;
            padding: 0.95rem 1rem;
            border-bottom: 1px solid #bfdbfe;
            background: #dbeafe;
        }

        .level-card-icon {
            width: 1.2rem;
            height: 1.2rem;
            margin-top: 0.1rem;
            flex-shrink: 0;
            color: #2563eb;
        }

        .level-card-icon svg {
            width: 100%;
            height: 100%;
        }

        .level-card-title {
            margin: 0;
            color: #0f172a;
            font-size: 1.1rem;
            line-height: 1.35;
            overflow-wrap: break-word;
            hyphens: auto;
        }

        .level-card-body {
            padding: 0.85rem 1rem 1rem;
            display: flex;
            flex-direction: column;
            gap: 0.7rem;
            flex: 1;
            position: relative;
            overflow: hidden;
        }

        .level-card-bg-icon {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0.14;
            pointer-events: none;
            user-select: none;
            color: #1d4ed8;
        }

        .level-card-bg-icon svg {
            width: 72%;
            height: 72%;
        }

        .level-card-description {
            margin: 0;
            color: #334155;
            font-size: 0.94rem;
            line-height: 1.45;
            position: relative;
            z-index: 1;
        }

        .level-card-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 0.4rem;
            margin-top: auto;
            position: relative;
            z-index: 1;
        }

        .level-chip {
            display: inline-flex;
            align-items: center;
            padding: 0.2rem 0.55rem;
            border-radius: 999px;
            font-size: 0.76rem;
            font-weight: 700;
            color: #1e3a8a;
            background: #dbeafe;
            border: 1px solid #93c5fd;
        }

        .level-chip--pdf {
            color: #0f4c5c;
            background: #dff5ff;
            border-color: #9edcf6;
        }

        .empty-level {
            text-align: center;
            color: #64748b;
        }

        @media (max-width: 1200px) {
            .transparency-level-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 900px) {
            .transparency-level-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 768px) {
            .content-intro-grid {
                flex-direction: column;
            }

            .content-image-box,
            .content-text-box {
                max-width: 100%;
                width: 100%;
            }
        }

        @media (max-width: 600px) {
            .transparency-level-grid {
                grid-template-columns: 1fr;
            }

            .subreglamentos-list {
                margin-bottom: 2.5rem;
                padding-bottom: 0.75rem;
            }
        }
    </style>
</body>
</html>
<?php /**PATH C:\workspace\ists\resources\views/public/content_detail.blade.php ENDPATH**/ ?>