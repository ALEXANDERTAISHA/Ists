<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title ?? 'Planta Docente - ISTS Sucúa'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/harvard-style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/harvard-exact.css')); ?>">
    <link rel="icon" type="image/png" href="<?php echo e(asset('assets/images/logoists.png')); ?>" sizes="32x32">
    <style>
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(210px, 270px));
            gap: 1.25rem;
            justify-content: center;
            margin-top: 1.6rem;
        }
        .team-member-card {
            background: linear-gradient(135deg, #f8fafc 60%, #e0f7fa 100%);
            border-radius: 14px;
            box-shadow: 0 5px 18px rgba(16, 36, 58, 0.11), 0 1.5px 6px #0ea5a222;
            padding: 1rem 0.85rem 0.9rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.18s cubic-bezier(.4,2,.6,1), box-shadow 0.18s;
            position: relative;
            min-height: 285px;
            border: 1.5px solid #e0f2f1;
            max-width: 100%;
            margin: 0 auto;
            width: 100%;
        }
        .team-member-card:hover {
            transform: translateY(-4px) scale(1.015);
            box-shadow: 0 10px 26px rgba(14, 165, 162, 0.15), 0 2px 8px #0ea5a222;
            border-color: #0ea5a2;
        }
        .team-member-img {
            width: 100%;
            max-width: 205px;
            height: 205px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 2px 12px #0ea5a233;
            border: 3px solid #fff;
            margin-bottom: 0.75rem;
            background: #e0f2f1;
            display: block;
        }
        .team-member-info {
            text-align: center;
            width: 100%;
            flex: 1 1 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
        }
        .team-member-info h3 {
            font-size: 0.98rem;
            font-weight: 700;
            color: #0b3a66;
            margin-bottom: 0.35rem;
            letter-spacing: 0.01em;
        }
        .team-member-info .position {
            color: #0ea5a2;
            font-weight: 600;
            margin-bottom: 0.15rem;
            font-size: 0.86rem;
        }
        .team-member-info .department {
            color: #64748b;
            font-size: 0.82rem;
            margin-bottom: 0.35rem;
        }
        .team-member-card .pdf-pro-link {
            min-height: 36px;
            padding: 0.44rem 0.68rem 0.44rem 0.52rem;
            font-size: 0.82rem;
            gap: 0.46rem;
            margin-top: 0.45rem !important;
        }
        .team-member-card .pdf-pro-link::before {
            min-width: 36px;
            height: 21px;
            font-size: 0.62rem;
        }
        .team-member-card .pdf-pro-link::after {
            width: 20px;
            height: 20px;
            font-size: 0.82rem;
        }
        .pdf-pro-link {
            display: inline-flex;
            align-items: center;
            gap: 0.6em;
            cursor: pointer;
            background: linear-gradient(90deg, #e3f2fd 0%, #bbdefb 100%);
            color: #1565c0 !important;
            font-weight: 700;
            letter-spacing: 0.02em;
            border-radius: 12px;
            padding: 0.52rem 1.5rem 0.52rem 1.2rem;
            font-size: 1.08rem;
            box-shadow: 0 4px 18px 0 rgba(25, 118, 210, 0.13);
            border: 1.5px solid #90caf9;
            outline: none;
            text-decoration: none;
            transition: background 0.18s, box-shadow 0.18s, transform 0.18s, color 0.18s;
            display: inline-flex;
            align-items: center;
            gap: 0.6em;
            margin-top: 10px;
            position: relative;
            overflow: hidden;
            text-shadow: 0 1px 6px rgba(255,255,255,0.18), 0 0px 1px #90caf9;
            backdrop-filter: blur(2.5px);
        }
        .pdf-pro-link:hover {
            background: linear-gradient(90deg, #1976d2 0%, #42a5f5 100%);
            color: #fff !important;
            box-shadow: 0 6px 24px 0 rgba(25, 118, 210, 0.22);
            transform: translateY(-2px) scale(1.04);
            text-shadow: 0 2px 10px rgba(0,0,0,0.22), 0 0px 1px #1565c0;
            border-color: #1976d2;
        }
        .pdf-pro-link .pdf-icon {
            display: inline-block;
            width: 1.2em;
            height: 1.2em;
            margin-right: 0.1em;
        }
        .pdf-pro-link-premium {
            display: flex;
            align-items: center;
            gap: 1.1rem;
            background: linear-gradient(90deg, #d32f2f 0%, #e57373 100%);
            color: #fff;
            border-radius: 16px;
            padding: 1.1rem 2.1rem 1.1rem 1.5rem;
            font-size: 1.08rem;
            font-weight: 700;
            box-shadow: 0 4px 24px #d32f2f33;
            border: none;
            outline: none;
            text-decoration: none;
            position: relative;
            overflow: hidden;
            min-width: 270px;
            transition: box-shadow 0.18s, transform 0.18s;
        }
        .pdf-pro-link-premium:hover {
            box-shadow: 0 8px 32px #d32f2f44;
            transform: scale(1.045);
        }
        .pdf-pro-link-premium .pdf-icon {
            background: transparent;
            color: #fff;
            font-size: 2.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.1rem;
        }
        .pdf-pro-link-premium .pdf-label {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            flex: 1 1 auto;
            min-width: 0;
        }
        .pdf-pro-link-premium .pdf-label strong {
            font-size: 1.18rem;
            font-weight: 800;
            letter-spacing: 0.01em;
            margin-bottom: 0.1rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 170px;
        }
        .pdf-pro-link-premium .pdf-label small {
            font-size: 0.93rem;
            font-weight: 600;
            opacity: 0.85;
            margin-bottom: 0.1rem;
        }
        .pdf-pro-link-premium .pdf-label em {
            font-size: 0.93rem;
            font-style: normal;
            opacity: 0.8;
            margin-top: 0.1rem;
        }
        .pdf-pro-link-premium .pdf-badge {
            background: #fff;
            color: #d32f2f;
            border-radius: 999px;
            font-size: 1.01rem;
            font-weight: 800;
            padding: 0.22rem 0.9rem;
            margin-right: 0.2rem;
            box-shadow: 0 1px 4px #d32f2f22;
            margin-left: 0.2rem;
        }
        .pdf-pro-link-premium .pdf-arrow {
            color: #fff;
            font-size: 1.5rem;
            margin-left: 0.2rem;
            transition: transform 0.2s;
        }
        .pdf-pro-link-premium:hover .pdf-arrow {
            transform: translateX(7px);
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
        @media (max-width: 992px) {
            .team-grid {
                grid-template-columns: repeat(auto-fit, minmax(180px, 240px));
            }
        }
        @media (max-width: 640px) {
            .team-grid {
                grid-template-columns: repeat(auto-fit, minmax(180px, 240px));
                gap: 1rem;
            }
            .team-member-card {
                max-width: 240px;
                min-height: 250px;
                padding: 0.85rem 0.7rem;
            }
            .team-member-img {
                max-width: 170px;
                height: 170px;
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
</head>
<body>
    <?php echo $__env->make('public.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main class="main-content">
        <!-- Page Header -->
        <section class="about-page-header">
            <div class="container text-center">
                <h1 class="about-page-title">Planta Docente</h1>
            </div>
        </section>

        <!-- Content Section -->
        <section class="about-content-area">
            <div class="container">
                <div class="team-grid">
                    <?php if(isset($teachers) && count($teachers) > 0): ?>
                        <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="team-member-card">
                                <?php if($teacher->image_path): ?>
                                    <img src="<?php echo e(asset('storage/' . $teacher->image_path)); ?>" alt="<?php echo e($teacher->name); ?>" class="team-member-img">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('storage/uploads/images/profe.jpg')); ?>" alt="Imagen por defecto docente" class="team-member-img">
                                <?php endif; ?>
                                <div class="team-member-info">
                                    <h3><?php echo e($teacher->name); ?></h3>
                                    <p class="position"><?php echo e($teacher->title); ?></p>
                                    <p class="department"><?php echo e($teacher->department); ?></p>
                                    <?php if($teacher->pdf_path): ?>
                                        <button type="button" class="pdf-pro-link js-open-teacher-pdf" style="margin-top:10px;" data-pdf-url="<?php echo e(asset('storage/' . $teacher->pdf_path)); ?>" data-teacher-name="<?php echo e($teacher->name); ?>">
                                            Ver Currículum
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <p>No hay docentes para mostrar.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>

    <div id="teacherPdfPreview" class="pdf-preview-modal" aria-hidden="true">
        <div class="pdf-preview-dialog" role="dialog" aria-modal="true" aria-labelledby="teacherPdfPreviewTitle">
            <div class="pdf-preview-header">
                <p id="teacherPdfPreviewTitle" class="pdf-preview-title">Vista previa de hoja de vida</p>
                <button type="button" class="pdf-preview-close" aria-label="Cerrar vista previa">&times;</button>
            </div>
            <iframe id="teacherPdfFrame" class="pdf-preview-frame" title="Vista previa de hoja de vida"></iframe>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('teacherPdfPreview');
            const frame = document.getElementById('teacherPdfFrame');
            const title = document.getElementById('teacherPdfPreviewTitle');
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

            document.querySelectorAll('.js-open-teacher-pdf').forEach(function (button) {
                button.addEventListener('click', function () {
                    const pdfUrl = button.dataset.pdfUrl;
                    const teacherName = button.dataset.teacherName || 'docente';

                    if (!pdfUrl) {
                        return;
                    }

                    title.textContent = 'Hoja de vida - ' + teacherName;
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

    <?php echo $__env->make('public.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('public.acerca.partials.about-styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\workspace\ists\resources\views/public/planta-docente.blade.php ENDPATH**/ ?>