@extends('layouts.site')

@section('header')
    @include('public.partials.header')
@endsection

@section('content')
@php
    $heroImage = null;
    if (!empty($career->image_path)) {
        $heroImage = \Illuminate\Support\Str::startsWith($career->image_path, '/')
            ? asset(ltrim($career->image_path, '/'))
            : asset('storage/' . ltrim($career->image_path, '/'));
    }

    $secondaryImage = null;
    if (!empty($career->image_path_2)) {
        $secondaryImage = \Illuminate\Support\Str::startsWith($career->image_path_2, '/')
            ? asset(ltrim($career->image_path_2, '/'))
            : asset('storage/' . ltrim($career->image_path_2, '/'));
    }

    $pdfUrl = null;
    $pdfUpdatedLabel = null;
    $pdfSizeLabel = null;
    if (!empty($career->curriculum_pdf)) {
        $pdfUrl = \Illuminate\Support\Str::startsWith($career->curriculum_pdf, '/')
            ? asset(ltrim($career->curriculum_pdf, '/'))
            : asset('storage/' . ltrim($career->curriculum_pdf, '/'));

        if (!empty($career->updated_at)) {
            $pdfUpdatedLabel = $career->updated_at->format('d/m/Y');
        }

        if (!\Illuminate\Support\Str::startsWith($career->curriculum_pdf, ['http://', 'https://'])) {
            $storagePath = ltrim($career->curriculum_pdf, '/');
            if (\Illuminate\Support\Str::startsWith($storagePath, 'storage/')) {
                $storagePath = ltrim(substr($storagePath, strlen('storage/')), '/');
            }

            try {
                $disk = \Illuminate\Support\Facades\Storage::disk('public');
                if ($disk->exists($storagePath)) {
                    $sizeBytes = (int) $disk->size($storagePath);
                    $sizeMb = $sizeBytes / 1048576;
                    $pdfSizeLabel = $sizeMb >= 1
                        ? number_format($sizeMb, 1) . ' MB'
                        : number_format($sizeBytes / 1024, 0) . ' KB';
                }
            } catch (\Throwable $e) {
                $pdfSizeLabel = null;
            }
        }
    }


@endphp

<section class="career-detail-page">
    <div class="career-hero" @if($heroImage) style="background-image: url('{{ $heroImage }}')" @endif>
        <div class="career-hero-overlay"></div>
        <div class="container career-hero-content">
            <a href="{{ url('/carreras') }}" class="career-back-link">Volver a carreras</a>
            <h1>{{ $career->name }}</h1>
            <p>{{ $career->description ?: 'Conoce todos los detalles académicos y el perfil de formación de esta carrera.' }}</p>
        </div>
    </div>



    <div class="container">
        <div class="career-main-grid">
            <div class="career-main-col">
                <article class="career-panel">
                    <div class="career-panel-head">
                        <span>Descripción Integral</span>
                        <h2>¿De qué trata esta carrera?</h2>
                    </div>
                    <div class="career-panel-body">
                        <div class="career-copy">{!! $career->full_description ?: '<p>Pronto publicaremos el detalle completo de esta carrera.</p>' !!}</div>
                        @if($heroImage)
                            <img src="{{ $heroImage }}" alt="{{ $career->name }}" class="career-image-card">
                        @endif
                    </div>
                </article>

                <article class="career-panel career-panel--alt">
                    <div class="career-panel-head">
                        <span>Perfil de Egreso</span>
                        <h2>Capacidades profesionales que desarrollarás</h2>
                    </div>
                    <div class="career-panel-body career-panel-body--reverse">
                        <div class="career-copy">{!! $career->professional_profile ?: '<p>Estamos preparando el perfil profesional detallado para esta carrera.</p>' !!}</div>
                        @if($secondaryImage)
                            <img src="{{ $secondaryImage }}" alt="Perfil {{ $career->name }}" class="career-image-card">
                        @elseif($heroImage)
                            <img src="{{ $heroImage }}" alt="{{ $career->name }}" class="career-image-card">
                        @endif
                    </div>
                </article>
            </div>

            <aside class="career-side-col">
                <div class="career-side-card">
                    <h3>Información clave</h3>

                    @if($career->coordinator)
                        <div class="career-side-item">
                            <span>Coordinación</span>
                            <strong>{{ $career->coordinator }}</strong>
                        </div>
                    @endif

                    @if($career->coordinator_email)
                        <div class="career-side-item">
                            <span>Contacto</span>
                            <a href="mailto:{{ $career->coordinator_email }}">{{ $career->coordinator_email }}</a>
                        </div>
                    @endif

                    @if($pdfUrl)
                        <a href="{{ $pdfUrl }}" target="_blank" rel="noopener noreferrer" class="career-pdf-cta" aria-label="Abrir malla curricular en PDF">
                            <span class="career-pdf-cta__icon" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" width="16" height="16">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 2H8a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V8z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 2v6h6"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.5 14.5h5M9.5 17.5h3.5"/>
                                </svg>
                            </span>
                            <span class="career-pdf-cta__text">
                                <small>Documento oficial</small>
                                <strong>Ver malla curricular</strong>
                                @if($pdfUpdatedLabel || $pdfSizeLabel)
                                    <em>
                                        @if($pdfUpdatedLabel)
                                            Actualizado {{ $pdfUpdatedLabel }}
                                        @endif
                                        @if($pdfUpdatedLabel && $pdfSizeLabel)
                                            ·
                                        @endif
                                        @if($pdfSizeLabel)
                                            {{ $pdfSizeLabel }}
                                        @endif
                                    </em>
                                @endif
                            </span>
                            <span class="career-pdf-cta__badge">PDF</span>
                            <span class="career-pdf-cta__arrow" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" width="15" height="15"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </span>
                        </a>
                    @endif

                    <a href="{{ url('/carreras') }}" class="career-outline-cta">Explorar más carreras</a>
                </div>
            </aside>
        </div>
    </div>
</section>

<style>
    .career-detail-page {
        --cd-primary: #0b335c;
        --cd-accent: #0ea5a2;
        --cd-bg: #f2f8ff;
        --cd-ink: #132e49;
        background: linear-gradient(180deg, #f8fbff 0%, #eef6f4 100%);
        padding-bottom: 2.8rem;
    }

    .career-hero {
        margin-top: 0;
        min-height: 250px;
        position: relative;
        background: linear-gradient(135deg, #0b335c 0%, #0e4c7f 55%, #0ea5a2 100%);
        background-size: cover;
        background-position: center;
        overflow: hidden;
    }

    .career-hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(110deg, rgba(9,22,40,0.84) 0%, rgba(9,22,40,0.42) 58%, rgba(9,22,40,0.66) 100%);
    }

    .career-hero-content {
        position: relative;
        z-index: 1;
        padding: 2.35rem 0 1.85rem;
        color: #fff;
        max-width: 920px;
    }

    .career-back-link {
        display: inline-flex;
        margin-bottom: 0.8rem;
        color: #b8edf2;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 600;
        letter-spacing: 0.03em;
    }

    .career-hero-content h1 {
        margin: 0;
        font-size: clamp(1.8rem, 3.5vw, 2.95rem);
        line-height: 1.05;
        letter-spacing: -0.03em;
        font-weight: 900;
        text-wrap: balance;
    }

    .career-hero-content p {
        margin: 1rem 0 0;
        color: rgba(255,255,255,0.86);
        font-size: clamp(0.95rem, 1.2vw, 1.02rem);
        line-height: 1.58;
        max-width: 68ch;
    }

    .career-main-grid {
        margin-top: 1.1rem;
        display: grid;
        grid-template-columns: minmax(0, 1fr) 286px;
        gap: 0.95rem;
        align-items: start;
    }

    .career-main-col {
        display: grid;
        gap: 0.95rem;
    }

    .career-panel {
        background: #fff;
        border: 1px solid rgba(10, 38, 64, 0.09);
        border-radius: 16px;
        box-shadow: 0 6px 16px rgba(10, 30, 58, 0.08);
        padding: 0.82rem;
        transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
        opacity: 0;
        transform: translateY(10px) scale(0.994);
        filter: blur(4px);
        animation: cd-rise-in 0.5s cubic-bezier(.2,.65,.2,1) forwards;
    }

    .career-panel:nth-child(1) { animation-delay: 0.05s; }
    .career-panel:nth-child(2) { animation-delay: 0.13s; }

    .career-panel:hover {
        transform: translateY(-2px);
        border-color: rgba(14,165,162,0.34);
        box-shadow: 0 16px 30px rgba(10, 30, 58, 0.13);
    }

    .career-panel--alt {
        background: linear-gradient(180deg, #ffffff 0%, #f7fbff 100%);
    }

    .career-panel-head span {
        display: inline-flex;
        padding: 0.32rem 0.72rem;
        border-radius: 999px;
        background: rgba(14,165,162,0.14);
        color: #0e6d75;
        font-size: 0.74rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .career-panel-head h2 {
        margin: 0.8rem 0 0;
        color: var(--cd-primary);
        font-size: clamp(1.16rem, 1.7vw, 1.48rem);
        line-height: 1.2;
        font-weight: 800;
        letter-spacing: -0.02em;
    }

    .career-panel-body {
        margin-top: 0.78rem;
        display: grid;
        grid-template-columns: minmax(0, 1fr) minmax(200px, 290px);
        gap: 0.78rem;
        align-items: start;
    }

    .career-panel-body--reverse {
        grid-template-columns: minmax(200px, 290px) minmax(0, 1fr);
    }

    .career-copy {
        color: #2f4964;
        font-size: 0.9rem;
        line-height: 1.54;
    }

    .career-copy p:last-child {
        margin-bottom: 0;
    }

    .career-image-card {
        width: 100%;
        max-height: 235px;
        object-fit: cover;
        border-radius: 12px;
        border: 1px solid rgba(10, 38, 64, 0.12);
        box-shadow: 0 10px 22px rgba(12, 34, 60, 0.16);
    }

    .career-side-col {
        position: sticky;
        top: 84px;
    }

    .career-side-card {
        background: #fff;
        border: 1px solid rgba(10, 38, 64, 0.1);
        border-radius: 16px;
        box-shadow: 0 8px 18px rgba(11, 36, 64, 0.09);
        padding: 0.82rem;
        display: grid;
        gap: 0.58rem;
        opacity: 0;
        transform: translateY(10px) scale(0.994);
        filter: blur(4px);
        animation: cd-rise-in 0.5s cubic-bezier(.2,.65,.2,1) 0.18s forwards;
        transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    }

    .career-side-card:hover {
        transform: translateY(-2px);
        border-color: rgba(14,165,162,0.34);
        box-shadow: 0 16px 30px rgba(11, 36, 64, 0.14);
    }

    .career-side-card h3 {
        margin: 0;
        color: var(--cd-primary);
        font-size: 1.1rem;
        font-weight: 800;
    }

    .career-side-item {
        padding: 0.58rem;
        border-radius: 10px;
        border: 1px solid rgba(10, 38, 64, 0.08);
        background: var(--cd-bg);
    }

    .career-side-item span {
        display: block;
        color: #67809b;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        margin-bottom: 0.2rem;
    }

    .career-side-item strong,
    .career-side-item a {
        color: var(--cd-ink);
        font-size: 0.9rem;
        font-weight: 700;
        text-decoration: none;
        word-break: break-word;
    }

    .career-pdf-cta {
        display: grid;
        grid-template-columns: auto 1fr auto auto;
        align-items: center;
        column-gap: 0.62rem;
        border-radius: 14px;
        padding: 0.62rem 0.72rem;
        text-decoration: none;
        font-weight: 700;
        color: #fff;
        background: linear-gradient(120deg, #d32f2f 0%, #9b1c1c 100%);
        border: 1px solid rgba(255,255,255,0.2);
        box-shadow: 0 9px 18px rgba(125, 23, 23, 0.3);
        position: relative;
        isolation: isolate;
        transition: transform 0.22s ease, box-shadow 0.22s ease, filter 0.22s ease;
    }

    .career-pdf-cta::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: inherit;
        background: linear-gradient(120deg, rgba(255,255,255,0.16), rgba(255,255,255,0));
        z-index: -1;
    }

    .career-pdf-cta:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 24px rgba(125, 23, 23, 0.36);
        filter: saturate(1.06);
    }

    .career-pdf-cta:focus-visible {
        outline: 2px solid #fca5a5;
        outline-offset: 2px;
    }

    .career-pdf-cta__icon {
        width: 28px;
        height: 28px;
        border-radius: 8px;
        display: grid;
        place-items: center;
        background: rgba(255,255,255,0.18);
        border: 1px solid rgba(255,255,255,0.24);
    }

    .career-pdf-cta__text {
        display: grid;
        gap: 0.1rem;
        min-width: 0;
    }

    .career-pdf-cta__text small {
        font-size: 0.58rem;
        letter-spacing: 0.11em;
        text-transform: uppercase;
        color: rgba(255, 236, 236, 0.94);
        line-height: 1.15;
    }

    .career-pdf-cta__text strong {
        font-size: 0.89rem;
        font-weight: 800;
        color: #ffffff;
        line-height: 1.2;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .career-pdf-cta__text em {
        margin: 0;
        font-style: normal;
        font-size: 0.62rem;
        line-height: 1.2;
        color: rgba(255, 236, 236, 0.95);
        letter-spacing: 0.02em;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .career-pdf-cta__badge {
        font-size: 0.62rem;
        font-weight: 900;
        letter-spacing: 0.08em;
        border-radius: 999px;
        padding: 0.16rem 0.4rem;
        color: #7f1d1d;
        background: linear-gradient(180deg, #fff6f6 0%, #ffe0e0 100%);
        border: 1px solid rgba(255,255,255,0.4);
    }

    .career-pdf-cta__arrow {
        display: grid;
        place-items: center;
        color: rgba(255,255,255,0.95);
    }

    .career-outline-cta {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        border-radius: 12px;
        padding: 0.85rem 1rem;
        text-decoration: none;
        font-weight: 700;
        color: var(--cd-primary);
        border: 1.4px solid rgba(11,51,92,0.2);
        background: #fff;
    }

    @media (max-width: 480px) {
        .career-pdf-cta {
            grid-template-columns: auto 1fr auto;
            row-gap: 0.32rem;
        }

        .career-pdf-cta__arrow {
            display: none;
        }
    }

    @keyframes cd-rise-in {
        from {
            opacity: 0;
            transform: translateY(10px) scale(0.994);
            filter: blur(4px);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
            filter: blur(0);
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .career-panel,
        .career-side-card {
            animation: none;
            opacity: 1;
            transform: none;
            filter: none;
        }
    }

    @media (max-width: 1100px) {
        .career-main-grid {
            grid-template-columns: 1fr;
        }

        .career-side-col {
            position: static;
        }
    }

    @media (max-width: 768px) {
        .career-detail-page {
            padding-bottom: 1.6rem;
        }

        .career-hero {
            min-height: 260px;
            background-position: center top;
        }

        .career-hero-content {
            padding: 2.25rem 1rem 2rem;
        }

        .career-main-grid {
            margin-top: 0.8rem;
            gap: 0.8rem;
        }

        .career-main-col {
            gap: 0.8rem;
        }

        .career-panel {
            border-radius: 14px;
            padding: 0.9rem;
            box-shadow: 0 8px 18px rgba(10, 30, 58, 0.08);
        }

        .career-panel-body,
        .career-panel-body--reverse {
            grid-template-columns: 1fr;
            gap: 0.75rem;
        }

        .career-panel-body--reverse .career-copy {
            order: 1;
        }

        .career-panel-body--reverse .career-image-card {
            order: 2;
        }

        .career-copy {
            font-size: 0.92rem;
            line-height: 1.58;
            overflow-wrap: anywhere;
        }

        .career-image-card {
            max-height: none;
            height: auto;
            aspect-ratio: 16 / 10;
            object-fit: cover;
        }

        .career-side-card {
            border-radius: 14px;
            padding: 0.9rem;
        }

        .career-pdf-cta {
            grid-template-columns: auto minmax(0, 1fr) auto;
        }

        .career-pdf-cta__arrow {
            display: none;
        }
    }

    @media (max-width: 420px) {
        .career-hero {
            min-height: 238px;
        }

        .career-hero-content h1 {
            font-size: 1.75rem;
        }

        .career-hero-content p {
            font-size: 0.92rem;
        }

        .career-panel,
        .career-side-card {
            padding: 0.78rem;
            border-radius: 12px;
        }

        .career-panel-head h2 {
            font-size: 1.08rem;
        }

        .career-image-card {
            aspect-ratio: 4 / 3;
        }
    }
</style>
@endsection
