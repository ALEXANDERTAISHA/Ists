<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($title ?? 'ISTS Sucúa'); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/harvard-style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/harvard-exact.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php echo $__env->yieldPushContent('styles'); ?>
    <link rel="icon" type="image/png" href="<?php echo e(asset('assets/images/logoists.png')); ?>" sizes="32x32">
</head>
<body class="public-sticky-footer">
    <div class="public-page-shell">
    <?php echo $__env->make('public.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php if(isset($popup) && $popup && \Route::currentRouteName() === 'home'): ?>
        <style>
            .home-popup-overlay {
                position: fixed;
                inset: 0;
                display: flex;
                align-items: flex-start;
                justify-content: center;
                padding: 110px 18px 28px;
                background: rgba(8, 18, 32, 0.55);
                backdrop-filter: blur(6px);
                -webkit-backdrop-filter: blur(6px);
                z-index: 1150;
                animation: popupOverlayIn .22s ease-out;
            }

            .home-popup-dialog {
                position: relative;
                width: min(1120px, calc(100vw - 36px));
                border-radius: 20px;
                border: 1px solid rgba(255,255,255,0.45);
                background: rgba(255,255,255,0.98);
                box-shadow: 0 22px 46px rgba(7, 24, 44, 0.34);
                overflow: hidden;
                animation: popupDialogIn .32s cubic-bezier(.2,.7,.2,1);
            }

            .home-popup-close {
                position: absolute;
                right: 14px;
                top: 14px;
                width: 42px;
                height: 42px;
                border: none;
                border-radius: 999px;
                background: rgba(255,255,255,0.84);
                color: #22394f;
                font-size: 2rem;
                line-height: 1;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                z-index: 10;
                box-shadow: 0 6px 16px rgba(16, 36, 58, 0.25);
                cursor: pointer;
                transition: transform .2s ease, background .2s ease;
            }

            .home-popup-close:hover {
                transform: scale(1.05);
                background: #ffffff;
            }

            .home-popup-media,
            .home-popup-link {
                display: block;
                width: 100%;
                text-decoration: none;
            }

            .home-popup-media img {
                width: 100%;
                max-height: min(74vh, 740px);
                object-fit: contain;
                display: block;
                background: #f9fbff;
            }

            .home-popup-caption {
                margin: 0;
                padding: 0.85rem 1rem 1.05rem;
                text-align: center;
                font-size: 1.05rem;
                font-weight: 700;
                color: #114a7a;
                background: linear-gradient(180deg, #ffffff 0%, #f2f8ff 100%);
                border-top: 1px solid rgba(17, 74, 122, 0.12);
            }

            @keyframes popupOverlayIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }

            @keyframes popupDialogIn {
                from { opacity: 0; transform: translateY(14px) scale(0.985); }
                to { opacity: 1; transform: translateY(0) scale(1); }
            }

            @media (max-width: 768px) {
                .home-popup-overlay {
                    padding: 86px 10px 18px;
                }

                .home-popup-dialog {
                    width: calc(100vw - 20px);
                    border-radius: 14px;
                }

                .home-popup-close {
                    right: 10px;
                    top: 10px;
                    width: 36px;
                    height: 36px;
                    font-size: 1.7rem;
                }

                .home-popup-caption {
                    font-size: 0.94rem;
                    padding: 0.7rem 0.8rem 0.85rem;
                }
            }

            @media (prefers-reduced-motion: reduce) {
                .home-popup-overlay,
                .home-popup-dialog {
                    animation: none;
                }
            }
        </style>

        <div id="popupModal" class="home-popup-overlay" role="dialog" aria-modal="true" aria-label="PopUp destacado">
            <div class="home-popup-dialog" role="document">
                <button type="button" class="home-popup-close" aria-label="Cerrar" id="popupModalClose">×</button>
                <?php if($popup->link): ?>
                    <a href="<?php echo e($popup->link); ?>" target="_blank" rel="noopener" class="home-popup-link">
                        <div class="home-popup-media">
                            <img src="<?php echo e(asset('storage/' . $popup->image_path)); ?>" alt="PopUp destacado ISTS">
                        </div>
                    </a>
                <?php else: ?>
                    <div class="home-popup-media">
                        <img src="<?php echo e(asset('storage/' . $popup->image_path)); ?>" alt="PopUp destacado ISTS">
                    </div>
                <?php endif; ?>
                <?php if($popup->message): ?>
                    <p class="home-popup-caption"><?php echo e($popup->message); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <script>
            (function() {
                var modal = document.getElementById('popupModal');
                var closeBtn = document.getElementById('popupModalClose');

                if (!modal) {
                    return;
                }

                function closePopup() {
                    modal.style.display = 'none';
                }

                if (closeBtn) {
                    closeBtn.addEventListener('click', closePopup);
                }

                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        closePopup();
                    }
                });

                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && modal.style.display !== 'none') {
                        closePopup();
                    }
                });
            })();
        </script>
    <?php endif; ?>

    <main class="main-content public-page-main">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <div class="public-page-footer">
        <?php echo $__env->make('public.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('js/chatbot.js')); ?>?v=<?php echo e(time()); ?>" defer></script>
    <script src="<?php echo e(asset('js/dropdowns.js')); ?>"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var myCarousel = document.querySelector('#heroCarousel');
        if (myCarousel) {
            var carousel = new bootstrap.Carousel(myCarousel, {
                interval: 5000,
                ride: 'carousel',
                pause: false,
                wrap: true
            });
            console.log('Bootstrap Carousel inicializado:', carousel);
            // Forzar avance cada 5 segundos para depuración
            setInterval(function() {
                carousel.next();
                console.log('Forzando avance de slide');
            }, 5000);
        } else {
            console.log('Bootstrap Carousel: no encontrado en el DOM');
        }
    });
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>

    <?php echo $__env->make('public.partials.social_floating', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\workspace\ists\resources\views/layouts/public.blade.php ENDPATH**/ ?>