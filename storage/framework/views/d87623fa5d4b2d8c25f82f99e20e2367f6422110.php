

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('public.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main class="main-content py-5">
    <div class="container">
        <h1 class="autoridades-title">Nuestras Autoridades</h1>
        <div class="autoridades-grid fade-in">
            <?php $__empty_1 = true; $__currentLoopData = $autoridades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $autoridad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    $isRector = \Illuminate\Support\Str::contains(
                        \Illuminate\Support\Str::lower($autoridad->cargo ?? ''),
                        'rector'
                    );
                ?>
                <div class="autoridad-card<?php echo e($isRector ? ' autoridad-card--rector' : ''); ?>">
                    <div class="autoridad-img-wrap">
                        <?php if($autoridad->foto_url): ?>
                            <img src="<?php echo e($autoridad->foto_url); ?>" alt="Foto de <?php echo e($autoridad->nombre); ?>" class="autoridad-img">
                        <?php else: ?>
                            <div class="autoridad-img autoridad-img-placeholder">Sin foto</div>
                        <?php endif; ?>
                    </div>
                    <div class="autoridad-info">
                        <h3 class="autoridad-nombre"><?php echo e($autoridad->nombre); ?></h3>
                        <div class="autoridad-cargo"><?php echo e($autoridad->cargo); ?></div>
                        <div class="autoridad-categoria"><?php echo e($autoridad->categoria); ?></div>
                        <?php if($autoridad->biografia): ?>
                            <div class="autoridad-bio"><?php echo $autoridad->biografia; ?></div>
                        <?php endif; ?>
                        <?php if($autoridad->pdf_path): ?>
                            <button type="button" class="pdf-pro-link js-open-authority-pdf" data-pdf-url="<?php echo e(asset('storage/' . $autoridad->pdf_path)); ?>" data-authority-name="<?php echo e($autoridad->nombre); ?>">Ver Currículum PDF</button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="alert alert-info text-center" role="alert">
                    No hay autoridades registradas en este momento.
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<div id="authorityPdfPreview" class="pdf-preview-modal" aria-hidden="true">
    <div class="pdf-preview-dialog" role="dialog" aria-modal="true" aria-labelledby="authorityPdfPreviewTitle">
        <div class="pdf-preview-header">
            <p id="authorityPdfPreviewTitle" class="pdf-preview-title">Vista previa de hoja de vida</p>
            <button type="button" class="pdf-preview-close" aria-label="Cerrar vista previa">&times;</button>
        </div>
        <iframe id="authorityPdfFrame" class="pdf-preview-frame" title="Vista previa de hoja de vida"></iframe>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('authorityPdfPreview');
        const frame = document.getElementById('authorityPdfFrame');
        const title = document.getElementById('authorityPdfPreviewTitle');
        const closeButton = modal ? modal.querySelector('.pdf-preview-close') : null;

        if (!modal || !frame || !title) {
            return;
        }

        function closePreview() {
            modal.classList.remove('is-open');
            modal.setAttribute('aria-hidden', 'true');
            frame.removeAttribute('src');
            document.body.style.overflow = '';
        }

        document.querySelectorAll('.js-open-authority-pdf').forEach(function (button) {
            button.addEventListener('click', function () {
                const pdfUrl = button.dataset.pdfUrl;
                const authorityName = button.dataset.authorityName || 'autoridad';

                if (!pdfUrl) {
                    return;
                }

                title.textContent = 'Hoja de vida - ' + authorityName;
                frame.setAttribute('src', pdfUrl + '#toolbar=1&navpanes=0&view=FitH');
                modal.classList.add('is-open');
                modal.setAttribute('aria-hidden', 'false');
                document.body.style.overflow = 'hidden';
            });
        });

        if (closeButton) {
            closeButton.addEventListener('click', closePreview);
        }

        modal.addEventListener('click', function (event) {
            if (event.target === modal) {
                closePreview();
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && modal.classList.contains('is-open')) {
                closePreview();
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
body {
    font-family: 'Montserrat', 'Segoe UI', Arial, sans-serif;
    background: #f4f8fb;
}
.autoridades-title {
    text-align: center;
    font-size: 2.35rem;
    font-weight: 900;
    margin-bottom: 1.75rem;
    color: #00796b;
    letter-spacing: 1px;
    text-shadow: 0 2px 8px rgba(44,62,80,0.08);
}
.autoridades-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(220px, 300px));
    gap: 1.45rem;
    align-items: stretch;
    justify-content: center;
}
.autoridad-card {
    background: #fff;
    border-radius: 1.05rem;
    box-shadow: 0 5px 20px rgba(44,62,80,0.09), 0 1.5px 4px rgba(0,0,0,0.04);
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 1.45rem 1.15rem 1.2rem;
    transition: box-shadow 0.2s, transform 0.2s;
    min-height: 330px;
    border: 1.5px solid #e0e7ef;
    position: relative;
}
.autoridad-card--rector {
    grid-column: 1 / -1;
    width: min(340px, 100%);
    justify-self: center;
    border-color: rgba(0, 121, 107, 0.28);
    box-shadow: 0 14px 34px rgba(0, 121, 107, 0.11), 0 1.5px 4px rgba(0,0,0,0.04);
}
.autoridad-card--rector::before {
    content: 'MÁXIMA AUTORIDAD';
    position: absolute;
    top: 0.78rem;
    left: 50%;
    transform: translateX(-50%);
    padding: 0.2rem 0.56rem;
    border-radius: 999px;
    background: linear-gradient(135deg, rgba(0, 121, 107, 0.12), rgba(25, 118, 210, 0.12));
    color: #00695c;
    font-size: 0.58rem;
    font-weight: 900;
    letter-spacing: 0.08em;
}
.autoridad-card--rector .autoridad-img-wrap {
    margin-top: 0.92rem;
}
.autoridad-card:hover {
    box-shadow: 0 10px 28px rgba(44,62,80,0.14), 0 2px 8px rgba(0,0,0,0.07);
    transform: translateY(-4px) scale(1.012);
    border-color: #b2dfdb;
}
.autoridad-img-wrap {
    width: 108px;
    height: 108px;
    margin-bottom: 0.9rem;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #e0f7fa 0%, #f7faff 100%);
    border-radius: 50%;
    overflow: hidden;
    box-shadow: 0 2px 12px rgba(44,62,80,0.10);
    border: 3px solid #b2dfdb;
}
.autoridad-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}
.autoridad-img-placeholder {
    color: #aaa;
    font-size: 1.1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    background: #f0f0f0;
    border-radius: 50%;
}
.autoridad-info {
    text-align: center;
    margin-top: 0.25rem;
}
.autoridad-nombre {
    font-size: 1.18rem;
    font-weight: 800;
    margin-bottom: 0.3rem;
    color: #00796b;
    letter-spacing: 0.5px;
}
.autoridad-cargo {
    font-size: 0.98rem;
    font-weight: 600;
    color: #1976d2;
    margin-bottom: 0.2rem;
}
.autoridad-categoria {
    font-size: 0.86rem;
    color: #888;
    margin-bottom: 0.7rem;
}
.autoridad-bio {
    font-size: 0.88rem;
    color: #444;
    margin-bottom: 0.7rem;
    text-align: justify;
}
.autoridad-card .pdf-pro-link {
    min-height: 38px;
    padding: 0.48rem 0.72rem 0.48rem 0.55rem;
    font-size: 0.84rem;
    gap: 0.48rem;
}
.autoridad-card .pdf-pro-link::before {
    min-width: 38px;
    height: 22px;
    font-size: 0.64rem;
}
.autoridad-card .pdf-pro-link::after {
    width: 21px;
    height: 21px;
    font-size: 0.86rem;
}
.pdf-preview-modal {
    position: fixed;
    inset: 0;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 1.25rem;
    background: rgba(8, 18, 32, 0.72);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    z-index: 1300;
}
.pdf-preview-modal.is-open {
    display: flex;
}
.pdf-preview-dialog {
    width: min(980px, 96vw);
    height: min(780px, 88vh);
    border-radius: 16px;
    overflow: hidden;
    background: #0f172a;
    box-shadow: 0 26px 60px rgba(2, 8, 23, 0.38);
    border: 1px solid rgba(255,255,255,0.18);
    display: flex;
    flex-direction: column;
}
.pdf-preview-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    padding: 0.78rem 0.95rem;
    background: linear-gradient(135deg, #0f766e, #1565c0);
    color: #fff;
}
.pdf-preview-title {
    margin: 0;
    font-size: 0.95rem;
    font-weight: 800;
    line-height: 1.25;
}
.pdf-preview-close {
    width: 34px;
    height: 34px;
    border: 1px solid rgba(255,255,255,0.35);
    border-radius: 999px;
    background: rgba(255,255,255,0.14);
    color: #fff;
    font-size: 1.35rem;
    line-height: 1;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}
.pdf-preview-frame {
    flex: 1 1 auto;
    width: 100%;
    border: 0;
    background: #fff;
}
.autoridad-cv-btn {
    display: inline-block;
    background: linear-gradient(90deg,#1abc9c,#3498db);
    color: #fff;
    border: none;
    padding: 0.5rem 1.2rem;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 700;
    margin-top: 0.7rem;
    transition: background 0.2s, box-shadow 0.2s;
    box-shadow: 0 2px 8px rgba(44,62,80,0.08);
    letter-spacing: 0.5px;
}
.autoridad-cv-btn:hover {
    background: linear-gradient(90deg,#3498db,#1abc9c);
    box-shadow: 0 4px 16px rgba(44,62,80,0.13);
}
.fade-in {
    animation: fadeIn 1.2s cubic-bezier(0.23, 1, 0.32, 1);
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: none; }
}
@media (max-width: 1100px) {
    .autoridades-grid {
        grid-template-columns: repeat(2, minmax(220px, 300px));
    }
}
@media (max-width: 600px) {
    .main-content {
        padding-top: 70px;
    }
    .autoridades-title {
        font-size: 1.5rem;
    }
    .autoridades-grid {
        gap: 1rem;
        grid-template-columns: 1fr;
    }
    .autoridad-card--rector {
        width: 100%;
    }
    .autoridad-card--rector::before {
        top: 0.72rem;
        font-size: 0.6rem;
    }
    .autoridad-card {
        padding: 1.05rem 0.8rem 0.95rem;
        min-height: 290px;
    }
    .autoridad-img-wrap {
        width: 86px;
        height: 86px;
    }
    .autoridad-nombre {
        font-size: 1.1rem;
    }
    .pdf-preview-modal {
        padding: 0.6rem;
    }
    .pdf-preview-dialog {
        width: 100%;
        height: 86vh;
        border-radius: 12px;
    }
}
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views/public/autoridades/index.blade.php ENDPATH**/ ?>