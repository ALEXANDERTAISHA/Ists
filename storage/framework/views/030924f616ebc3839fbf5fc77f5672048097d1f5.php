<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentos - ISTS Sucúa</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/harvard-style.css')); ?>">
    <link rel="icon" type="image/png" href="<?php echo e(asset('assets/images/logoists.png')); ?>" sizes="32x32">
</head>
<body>
    <header class="header">
        <nav class="main-navigation">
            <div class="container">
                <ul class="nav-menu">
                    <li class="nav-item"><a href="<?php echo e(route('home')); ?>" class="nav-link">Inicio</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main id="main-content" class="main-content">
        <section class="focus-section">
            <div class="container">
                <div class="focus-header">
                    <h1>Documentos Disponibles</h1>
                    <p>Encuentra información y guías sobre los documentos institucionales.</p>
                </div>

                <div class="focus-grid">
                    <?php if(isset($documentos) && !empty($documentos)): ?>
                        <?php $__currentLoopData = $documentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $documento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="focus-card">
                                <?php if(!empty($documento['image_url'])): ?>
                                    <div class="focus-image">
                                        <img src="<?php echo e(asset(htmlspecialchars($documento['image_url']))); ?>" alt="<?php echo e(htmlspecialchars($documento['title'])); ?>">
                                    </div>
                                <?php endif; ?>
                                <div class="focus-content">
                                    <?php
                                        $url = $documento['url'] ?? null;
                                        $file = $documento['file_url'] ?? null;
                                        $isExternalUrl = $url && filter_var($url, FILTER_VALIDATE_URL);
                                        $isFile = $file && !$isExternalUrl;
                                    ?>
                                    <?php if($isExternalUrl): ?>
                                        <h3>
                                            <a href="<?php echo e($url); ?>" target="_blank" class="text-primary underline"><?php echo e(htmlspecialchars($documento['title'])); ?></a>
                                        </h3>
                                    <?php elseif($isFile): ?>
                                        <h3>
                                            <a href="<?php echo e(asset($file)); ?>" target="_blank" class="text-primary underline"><?php echo e(htmlspecialchars($documento['title'])); ?></a>
                                        </h3>
                                    <?php else: ?>
                                        <h3><?php echo e(htmlspecialchars($documento['title'])); ?></h3>
                                    <?php endif; ?>
                                    <p><?php echo e(htmlspecialchars($documento['description'] ?? '')); ?></p>
                                    <div class="focus-actions">
                                        <?php if($isExternalUrl): ?>
                                            <a href="<?php echo e($url); ?>" target="_blank" class="btn btn-outline">Ir al documento</a>
                                        <?php elseif($isFile): ?>
                                            <a href="<?php echo e(asset($file)); ?>" target="_blank" class="btn btn-outline">Ir al documento</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <p>No hay documentos disponibles en este momento.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
<?php /**PATH C:\workspace\ists\resources\views\public\tramites.blade.php ENDPATH**/ ?>