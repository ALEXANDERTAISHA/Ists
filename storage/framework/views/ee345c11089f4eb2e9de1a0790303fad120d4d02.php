<?php
    // Helper to safely get key/property from array or object
    $get = function ($src, $key, $default = null) {
        if (is_array($src)) {
            return array_key_exists($key, $src) ? $src[$key] : $default;
        }
        if (is_object($src)) {
            return isset($src->{$key}) ? $src->{$key} : $default;
        }
        return $default;
    };

    $c = $content ?? null;
    $title = $get($c, 'title', 'Contenido');
    $body = $get($c, 'body', $get($c, 'content', ''));
    $description = $get($c, 'description', null);
    $images = $get($c, 'images', null);
    $image_url = $get($c, 'image_url', null);
    $file_url = $get($c, 'file_url', null);
?>

<!-- Page Header (same as Acerca) -->
<section class="about-page-header">
    <div class="container text-center">
        <h1 class="about-page-title"><?php echo e($title); ?></h1>
        <?php if($description): ?>
            <p class="about-page-subtitle"><?php echo e($description); ?></p>
        <?php endif; ?>
        <?php if($file_url): ?>
            <?php
                $pdfs = json_decode($file_url, true);
                if (is_array($pdfs)) {
                    echo '<div class="pdf-download-links">';
                    foreach ($pdfs as $index => $pdf) {
                        $filename = basename($pdf);
                        echo '<div class="pdf-link-item">';
                        echo '<a href="' . asset($pdf) . '" target="_blank" class="pdf-pro-link">Ver Reglamento ' . ($index + 1) . '</a> ';
                        echo '<a href="' . asset($pdf) . '" download="' . $filename . '" class="pdf-pro-link pdf-pro-link--download">Descargar Reglamento ' . ($index + 1) . '</a>';
                        echo '</div>';
                    }
                    echo '</div>';
                } else {
                    echo '<div class="pdf-download-link">';
                    echo '<a href="' . asset($file_url) . '" target="_blank" class="pdf-pro-link">Ver PDF</a>';
                    echo '</div>';
                }
            ?>
        <?php endif; ?>
    </div>
</section>

<!-- Content Section (same layout as Acerca) -->
<section class="about-content-area">
    <div class="container">
        <article class="about-box">
            <div class="about-content-layout">
                <div class="about-text-content">
                    <?php echo $body; ?>

                </div>

                <?php if(!empty($images) && count((array)$images) > 0): ?>
                    <div class="about-image-container">
                        <div class="carousel-container">
                            <div class="carousel-slides">
                                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $imgPath = '';
                                        if (is_array($image)) {
                                            $imgPath = $image['image_path'] ?? $image['path'] ?? '';
                                        } elseif (is_object($image)) {
                                            $imgPath = $image->image_path ?? $image->path ?? '';
                                        }
                                    ?>
                                    <div class="carousel-slide">
                                        <?php
                                            $src = '';
                                            if ($imgPath) {
                                                // Full URL -> use as-is
                                                if (preg_match('/^https?:\/\//i', $imgPath)) {
                                                    $src = $imgPath;
                                                }
                                                // Legacy public uploads or assets (e.g. /uploads/... or uploads/...) -> asset(ltrim(path))
                                                elseif (preg_match('/^\/?uploads\//i', $imgPath) && file_exists(public_path(ltrim($imgPath, '/')))) {
                                                    $src = asset(ltrim($imgPath, '/'));
                                                }
                                                elseif (preg_match('/^\/?assets\//i', $imgPath)) {
                                                    $src = asset(ltrim($imgPath, '/'));
                                                }
                                                // Already references storage/... -> use asset(path)
                                                elseif (preg_match('/^storage\//i', $imgPath)) {
                                                    $src = asset($imgPath);
                                                }
                                                // Otherwise assume it's a storage path fragment and prefix with storage/
                                                else {
                                                    $src = asset('storage/' . ltrim($imgPath, '/'));
                                                }
                                            }
                                        ?>
                                        <img src="<?php echo e($src); ?>" alt="<?php echo e($title); ?>">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <button class="carousel-prev">&#10094;</button>
                            <button class="carousel-next">&#10095;</button>
                        </div>
                    </div>
                <?php elseif(!empty($image_url)): ?>
                    <div class="about-image-container">
                        <?php
                            $imgSrc = '';
                            if (!empty($image_url)) {
                                if (preg_match('/^https?:\/\//i', $image_url)) {
                                    $imgSrc = $image_url;
                                } elseif (preg_match('/^\/?uploads\//i', $image_url) && file_exists(public_path(ltrim($image_url, '/')))) {
                                    $imgSrc = asset(ltrim($image_url, '/'));
                                } elseif (preg_match('/^\/?assets\//i', $image_url)) {
                                    $imgSrc = asset(ltrim($image_url, '/'));
                                } elseif (preg_match('/^storage\//i', $image_url)) {
                                    $imgSrc = asset($image_url);
                                } else {
                                    $imgSrc = asset('storage/' . ltrim($image_url, '/'));
                                }
                            }
                        ?>
                        <img src="<?php echo e($imgSrc); ?>" alt="<?php echo e($title); ?>">
                    </div>
                <?php endif; ?>
            </div>
        </article>

        <?php if(isset($children) && !empty($children)): ?>
            <div class="children-section" id="documentos-relacionados">
                <h3 class="related-docs-title">Documentos Relacionados</h3>
                <ul class="children-list">
                    <?php $__currentLoopData = $children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li id="<?php echo e($child['slug']); ?>">
                            <?php
                                $link = route('transparencia.show', $child['slug']); // Fallback link
                                $target = '';
                                if (!empty($child['file_url'])) {
                                    $pdfs = json_decode($child['file_url'], true);
                                    if (is_array($pdfs) && !empty($pdfs[0])) {
                                        $link = asset($pdfs[0]);
                                        $target = '_blank';
                                    } elseif (is_string($child['file_url'])) {
                                        $link = asset($child['file_url']);
                                        $target = '_blank';
                                    }
                                }
                            ?>
                            <a href="<?php echo e($link); ?>" <?php if($target): ?> target="<?php echo e($target); ?>" <?php endif; ?>><?php echo e($child['title']); ?></a>
                            <?php if(!empty($child['description'])): ?>
                                <p><?php echo e($child['description']); ?></p>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php echo $__env->make('public.acerca.partials.about-styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\workspace\ists\resources\views\public\partials\about_content.blade.php ENDPATH**/ ?>