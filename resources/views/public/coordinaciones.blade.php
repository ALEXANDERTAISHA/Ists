<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Coordinaciones de Carrera - Instituto Superior Tecnológico Sucúa">
    <title>Coordinaciones de Carrera - ISTS Sucúa</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/harvard-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/harvard-exact.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logoists.png') }}" sizes="32x32">
</head>
<body>

    @include('public.partials.header')

    <main id="main-content" class="main-content career-coord-page">
        <section class="coord-hero">
            <div class="container">
                <span class="coord-kicker">Guía Académica</span>
                <h1 class="page-title">Coordinaciones de Carrera</h1>
                <p class="page-subtitle">Conoce los equipos académicos que lideran cada carrera y contacta directamente con su coordinación.</p>
            </div>
        </section>

        <section class="careers-section py-5">
            <div class="container">
                @if($careers->count() > 0)
                    <div class="coord-grid">
                        @foreach($careers as $career)
                            @php
                                $imgSrc = null;
                                if (!empty($career->image_path)) {
                                    $imgSrc = asset('storage/' . ltrim($career->image_path, '/'));
                                } elseif (!empty($career->image_path_2)) {
                                    $imgSrc = asset('storage/' . ltrim($career->image_path_2, '/'));
                                }
                            @endphp
                            <article class="career-card">
                                <div class="career-image">
                                    @if($imgSrc)
                                        <img src="{{ $imgSrc }}" alt="{{ $career->name }}" loading="lazy">
                                    @else
                                        <div class="career-fallback">{{ \Illuminate\Support\Str::limit($career->name, 18, '') }}</div>
                                    @endif
                                </div>

                                <div class="career-content">
                                    <h3 class="career-title">{{ $career->name }}</h3>

                                    <p class="career-description">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($career->description ?: 'Formación tecnológica orientada a resultados reales en el entorno profesional.'), 120) }}
                                    </p>

                                    @if($career->coordinator)
                                        <div class="career-coordinator">
                                            <span>Coordinación</span>
                                            <strong>{{ $career->coordinator }}</strong>
                                            @if($career->coordinator_email)
                                                <a href="mailto:{{ $career->coordinator_email }}" class="coordinator-email">
                                                    {{ $career->coordinator_email }}
                                                </a>
                                            @endif
                                        </div>
                                    @endif

                                    <a href="{{ route('career.show', $career->slug) }}" class="btn-read-more">
                                        Ver carrera
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @else
                    <div class="coord-empty-state">
                        <p>No hay carreras disponibles en este momento.</p>
                    </div>
                @endif
            </div>
        </section>
    </main>

    @include('public.partials.footer')

    <style>
        .career-coord-page {
            background: linear-gradient(180deg, #f8fbff 0%, #edf5f1 100%);
            min-height: 60vh;
        }

        .coord-hero {
            margin-top: 76px;
            padding: 2.35rem 0 1.75rem;
            background:
                radial-gradient(circle at 12% 8%, rgba(14,165,162,0.2), transparent 36%),
                linear-gradient(135deg, #0a355f 0%, #0e6d75 100%);
            color: #fff;
        }

        .coord-kicker {
            display: inline-flex;
            padding: 0.4rem 0.9rem;
            border-radius: 999px;
            border: 1px solid rgba(255,255,255,0.4);
            background: rgba(255,255,255,0.16);
            letter-spacing: 0.08em;
            text-transform: uppercase;
            font-size: 0.72rem;
            font-weight: 700;
            margin-bottom: 0.9rem;
        }

        .page-title {
            font-size: clamp(1.76rem, 3.4vw, 2.55rem);
            font-weight: 900;
            margin-bottom: 0.5rem;
            letter-spacing: -0.03em;
        }

        .page-subtitle {
            font-size: clamp(0.94rem, 1.1vw, 1rem);
            opacity: 0.92;
            max-width: 64ch;
        }

        .careers-section {
            min-height: 48vh;
        }

        .coord-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 0.85rem;
        }

        .career-card {
            position: relative;
            background: white;
            border-radius: 14px;
            overflow: hidden;
            border: 1px solid rgba(10, 35, 58, 0.08);
            box-shadow: 0 6px 16px rgba(10, 35, 58, 0.08);
            transition: transform 0.27s ease, box-shadow 0.27s ease, border-color 0.27s ease;
            display: flex;
            flex-direction: column;
            opacity: 0;
            transform: translateY(12px) scale(0.992);
            filter: blur(5px);
            animation: coord-card-in 0.54s cubic-bezier(.2,.65,.2,1) forwards;
            will-change: transform, opacity;
        }

        .career-card:nth-child(1) { animation-delay: 0.03s; }
        .career-card:nth-child(2) { animation-delay: 0.08s; }
        .career-card:nth-child(3) { animation-delay: 0.13s; }
        .career-card:nth-child(4) { animation-delay: 0.18s; }
        .career-card:nth-child(5) { animation-delay: 0.23s; }
        .career-card:nth-child(6) { animation-delay: 0.28s; }
        .career-card:nth-child(n+7) { animation-delay: 0.33s; }

        .career-card:hover {
            transform: translateY(-4px) scale(1.006);
            border-color: rgba(14,165,162,0.34);
            box-shadow: 0 14px 30px rgba(10, 35, 58, 0.15);
        }

        .career-image {
            width: 100%;
            height: 142px;
            overflow: hidden;
            background: linear-gradient(140deg, #0b335c 0%, #0ea5a2 100%);
        }

        .career-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.36s ease;
        }

        .career-fallback {
            width: 100%;
            height: 100%;
            display: grid;
            place-items: center;
            color: rgba(255,255,255,0.88);
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-size: 0.84rem;
            padding: 0 1rem;
            text-align: center;
        }

        .career-card:hover .career-image img {
            transform: scale(1.05);
        }

        .career-content {
            padding: 0.72rem 0.76rem 0.8rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .career-title {
            font-size: 1.06rem;
            font-weight: 800;
            color: #13334f;
            margin-bottom: 0.6rem;
        }

        .career-description {
            color: #536d86;
            line-height: 1.44;
            margin-bottom: 0.8rem;
            min-height: 4.5em;
            font-size: 0.85rem;
        }

        .career-coordinator {
            background: #eff6ff;
            padding: 0.56rem 0.62rem;
            border-radius: 10px;
            border: 1px solid rgba(10,51,92,0.1);
            margin-bottom: 1rem;
            color: #3f5973;
            display: grid;
            gap: 0.2rem;
        }

        .career-coordinator span {
            font-size: 0.68rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #6d849b;
        }

        .career-coordinator strong {
            font-size: 0.88rem;
            color: #173b59;
        }

        .coordinator-email {
            color: #0e5b78;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.82rem;
        }

        .coordinator-email:hover {
            text-decoration: underline;
        }

        .btn-read-more {
            margin-top: auto;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-weight: 700;
            text-decoration: none;
            border-radius: 11px;
            padding: 0.72rem 0.9rem;
            background: linear-gradient(135deg, #0b335c 0%, #0ea5a2 100%);
            transition: transform 0.2s ease;
        }

        .btn-read-more:hover {
            transform: translateY(-2px);
        }

        .coord-empty-state {
            text-align: center;
            padding: 1.6rem;
            border-radius: 14px;
            background: rgba(255,255,255,0.75);
            border: 1px dashed rgba(10,51,92,0.2);
            color: #506883;
        }

        @keyframes coord-card-in {
            from {
                opacity: 0;
                transform: translateY(12px) scale(0.992);
                filter: blur(5px);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
                filter: blur(0);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .career-card {
                animation: none;
                opacity: 1;
                transform: none;
                filter: none;
            }
        }

        @media (max-width: 768px) {
            .coord-hero {
                padding: 3rem 0 2.3rem;
            }

            .page-title {
                font-size: 2rem;
            }

            .page-subtitle {
                font-size: 1rem;
            }
        }
    </style>
</body>
</html>
