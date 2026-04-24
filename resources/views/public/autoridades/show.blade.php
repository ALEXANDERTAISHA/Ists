@extends('public.layout')

@section('header')
    @include('public.partials.header')
@endsection

@section('content')
<main class="main-content py-5">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('autoridades') }}">Autoridades</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $autoridad->nombre }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-4 text-center">
                @if($autoridad->foto_url)
                    <img src="{{ $autoridad->foto_url }}" class="img-fluid rounded-circle mb-3" alt="Foto de {{ $autoridad->nombre }}" style="max-width: 250px; height: auto; object-fit: cover;">
                @else
                    <img src="{{ asset('images/default_avatar.png') }}" class="img-fluid rounded-circle mb-3" alt="Foto por defecto" style="max-width: 250px; height: auto; object-fit: cover;">
                @endif
                <h2 class="mt-3">{{ $autoridad->nombre }}</h2>
                <h4 class="text-muted">{{ $autoridad->cargo }}</h4>
                <p class="text-muted">Categoría: {{ $autoridad->categoria }}</p>
                @if($autoridad->pdf_path)
                    <button type="button" class="pdf-pro-link js-open-authority-pdf" data-pdf-url="{{ asset('storage/' . $autoridad->pdf_path) }}" data-authority-name="{{ $autoridad->nombre }}">Ver Currículum PDF</button>
                @endif
            </div>
            <div class="col-md-8">
                    <div class="card shadow-sm p-4">
                        <h3 class="mb-4">Biografía</h3>
                        @if($autoridad->biografia)
                            <div class="biography-content">
                                {!! $autoridad->biografia !!}
                            </div>
                        @else
                            <p>No hay biografía disponible para {{ $autoridad->nombre }}.</p>
                        @endif
                    </div>
                </div>
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

    <!-- Footer público -->
    @include('public.partials.footer')

    <style>
        /* Estilos básicos para la página de detalle de autoridad */
        .main-content {
            padding-top: 100px; /* Ajusta según la altura de tu header fijo */
        }
        .rounded-circle {
            border-radius: 50% !important;
            border: 5px solid #eee; /* Borde suave */
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15); /* Sombra para destacar */
        }
        .breadcrumb {
            background-color: transparent;
            padding: 0.75rem 0;
            margin-bottom: 2rem;
        }
        .breadcrumb-item a {
            color: #007bff;
            text-decoration: none;
        }
        .breadcrumb-item.active {
            color: #6c757d;
        }
        .card {
            border: 1px solid rgba(0,0,0,.125);
            border-radius: .5rem;
        }
        .card.shadow-sm {
            box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
        }
        .biography-content {
            line-height: 1.7;
            font-size: 1.05rem;
        }
        .biography-content img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 1rem;
            margin-bottom: 1rem;
            display: block;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }
        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
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
        @media (max-width: 600px) {
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
</body>
</html>
