@extends('layouts.public')
@section('title', 'Carreras')
@section('content')
@php
    $careers = \App\Models\Career::active()->ordered()->get();
@endphp

<section class="careers-premium">
    <div class="careers-premium__bg" aria-hidden="true"></div>

    <div class="container" style="position:relative; z-index:1;">
        <div class="careers-hero-card">
            <span class="careers-kicker">Oferta Académica</span>
            <h1>Todas las Carreras</h1>
            <p>
                Programas tecnológicos diseñados para empleabilidad real, innovación y liderazgo.
                Elige una carrera y conoce su perfil profesional completo.
            </p>
            <div class="careers-hero-meta">
                <div class="careers-meta-box">
                    <strong>{{ $careers->count() }}</strong>
                    <span>Carreras activas</span>
                </div>
                <div class="careers-meta-box">
                    <strong>ISTS</strong>
                    <span>Formación de impacto</span>
                </div>
            </div>
        </div>

        <div class="careers-grid-premium">
            @forelse($careers as $career)
                @php
                    $imgSrc = null;
                    if (!empty($career->image_path)) {
                        $imgSrc = asset('storage/' . ltrim($career->image_path, '/'));
                    } elseif (!empty($career->image_path_2)) {
                        $imgSrc = asset('storage/' . ltrim($career->image_path_2, '/'));
                    }
                @endphp
                <a href="{{ route('career.show', $career->slug ?? $career->id) }}" class="career-premium-card career-premium-card-link" style="text-decoration:none;color:inherit;">
                    <div class="career-premium-media">
                        @if($imgSrc)
                            <img src="{{ $imgSrc }}" alt="{{ $career->name }}">
                        @else
                            <div class="career-premium-placeholder" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" width="56" height="56"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5.25A2.25 2.25 0 015.25 3h13.5A2.25 2.25 0 0121 5.25v13.5A2.25 2.25 0 0118.75 21H5.25A2.25 2.25 0 013 18.75V5.25z"/><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5l5.25-5.25a2.121 2.121 0 013 0L15 14.25l1.25-1.25a2.121 2.121 0 013 0L21 14.75"/><path stroke-linecap="round" stroke-linejoin="round" d="M14.25 8.25h.008v.008h-.008V8.25z"/></svg>
                            </div>
                        @endif
                        <span class="career-badge">Carrera Tecnológica</span>
                    </div>

                    <div class="career-premium-body">
                        <h2>{{ $career->name }}</h2>
                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($career->description ?: 'Conoce el plan académico y el perfil de salida de esta carrera.'), 145) }}</p>

                        @if($career->coordinator)
                            <div class="career-premium-coord">
                                <span>Coordinación</span>
                                <strong>{{ $career->coordinator }}</strong>
                            </div>
                        @endif

                        <span class="career-premium-link" style="pointer-events:none;">
                            Ver detalles
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </span>
                    </div>
                </a>
            @empty
                <div class="careers-empty-state">
                    <h3>No hay carreras disponibles por ahora</h3>
                    <p>Vuelve pronto para conocer la oferta actualizada del instituto.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<style>
    .careers-premium {
        --cp-primary: #0b3a66;
        --cp-accent: #0ea5a2;
        --cp-soft: #f5f9ff;
        --cp-ink: #10243a;
        position: relative;
        padding: 6rem 0 3.1rem;
        background: linear-gradient(180deg, #f7fbff 0%, #eef6f2 100%);
        overflow: hidden;
    }

    .careers-premium__bg {
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at 12% 18%, rgba(14,165,162,0.14), transparent 38%),
            radial-gradient(circle at 85% 10%, rgba(11,58,102,0.12), transparent 34%),
            linear-gradient(120deg, rgba(255,255,255,0.55) 0%, transparent 42%);
    }

    .careers-hero-card {
        max-width: 960px;
        margin: 0 auto 1.8rem;
        padding: 1.35rem 1.2rem;
        border-radius: 22px;
        border: 1px solid rgba(255,255,255,0.8);
        background: rgba(255,255,255,0.68);
        backdrop-filter: blur(8px);
        box-shadow: 0 22px 44px rgba(9, 30, 66, 0.12);
        text-align: center;
    }

    .careers-kicker {
        display: inline-flex;
        padding: 0.45rem 1rem;
        border-radius: 999px;
        background: rgba(14,165,162,0.15);
        color: #0a6b72;
        font-size: 0.76rem;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
    }

    .careers-hero-card h1 {
        margin: 0.95rem 0 0.6rem;
        color: var(--cp-primary);
        font-size: clamp(1.78rem, 3.5vw, 2.8rem);
        line-height: 1.06;
        letter-spacing: -0.03em;
        font-weight: 900;
    }

    .careers-hero-card p {
        margin: 0 auto;
        max-width: 66ch;
        color: #3f5a77;
        font-size: clamp(0.94rem, 1.2vw, 1.02rem);
        line-height: 1.56;
    }

    .careers-hero-meta {
        margin-top: 1rem;
        display: flex;
        justify-content: center;
        gap: 0.9rem;
        flex-wrap: wrap;
    }

    .careers-meta-box {
        min-width: 148px;
        padding: 0.55rem 0.7rem;
        border-radius: 12px;
        border: 1px solid rgba(11,58,102,0.12);
        background: rgba(255,255,255,0.8);
    }

    .careers-meta-box strong {
        display: block;
        color: var(--cp-primary);
        font-size: 1.02rem;
        line-height: 1.1;
    }

    .careers-meta-box span {
        color: #58708a;
        font-size: 0.82rem;
        font-weight: 600;
    }

    .careers-grid-premium {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 0.9rem;
    }

    .career-premium-card {
        position: relative;
        border-radius: 15px;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid rgba(17, 24, 39, 0.08);
        box-shadow: 0 6px 16px rgba(16, 36, 58, 0.08);
        display: flex;
        flex-direction: column;
        transition: transform 0.28s ease, box-shadow 0.28s ease, border-color 0.28s ease;
        opacity: 0;
        transform: translateY(12px) scale(0.992);
        filter: blur(5px);
        animation: cp-card-in 0.56s cubic-bezier(.2,.65,.2,1) forwards;
        will-change: transform, opacity;
    }

    .career-premium-card:nth-child(1) { animation-delay: 0.03s; }
    .career-premium-card:nth-child(2) { animation-delay: 0.08s; }
    .career-premium-card:nth-child(3) { animation-delay: 0.13s; }
    .career-premium-card:nth-child(4) { animation-delay: 0.18s; }
    .career-premium-card:nth-child(5) { animation-delay: 0.23s; }
    .career-premium-card:nth-child(6) { animation-delay: 0.28s; }
    .career-premium-card:nth-child(n+7) { animation-delay: 0.33s; }

    .career-premium-card:hover {
        transform: translateY(-4px) scale(1.006);
        border-color: rgba(14,165,162,0.38);
        box-shadow: 0 16px 34px rgba(16, 36, 58, 0.15);
    }

    .career-premium-media {
        position: relative;
        height: 146px;
        background: linear-gradient(140deg, #0b3a66 0%, #0ea5a2 100%);
    }

    .career-premium-media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.38s ease;
    }

    .career-premium-card:hover .career-premium-media img {
        transform: scale(1.03);
    }

    .career-premium-placeholder {
        height: 100%;
        display: grid;
        place-items: center;
        color: rgba(255,255,255,0.88);
    }

    .career-badge {
        position: absolute;
        left: 10px;
        top: 10px;
        padding: 0.28rem 0.58rem;
        border-radius: 999px;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        background: rgba(11,58,102,0.8);
        color: #dff6ff;
        border: 1px solid rgba(255,255,255,0.22);
    }

    .career-premium-body {
        padding: 0.74rem 0.78rem 0.82rem;
        display: flex;
        flex-direction: column;
        gap: 0.62rem;
        flex: 1;
    }

    .career-premium-body h2 {
        margin: 0;
        color: var(--cp-ink);
        font-size: 1.08rem;
        line-height: 1.2;
        font-weight: 800;
    }

    .career-premium-body p {
        margin: 0;
        color: #506a83;
        line-height: 1.52;
        font-size: 0.9rem;
        min-height: 4.7em;
    }

    .career-premium-coord {
        margin-top: auto;
        padding: 0.52rem 0.6rem;
        border-radius: 10px;
        background: var(--cp-soft);
        border: 1px solid rgba(11,58,102,0.08);
    }

    .career-premium-coord span {
        display: block;
        font-size: 0.72rem;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: #67809a;
    }

    .career-premium-coord strong {
        color: #1f3f60;
        font-size: 0.88rem;
        font-weight: 700;
    }

    .career-premium-link {
        margin-top: 0.15rem;
        align-self: flex-start;
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        text-decoration: none;
        color: #0b6470;
        font-weight: 700;
        font-size: 0.88rem;
        letter-spacing: 0.01em;
    }

    .career-premium-link:hover {
        color: #0a4b54;
    }

    .careers-empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 2rem;
        border-radius: 18px;
        background: rgba(255,255,255,0.8);
        border: 1px dashed rgba(11,58,102,0.18);
    }

    .careers-empty-state h3 {
        margin: 0 0 0.4rem;
        color: var(--cp-primary);
        font-weight: 800;
    }

    .careers-empty-state p {
        margin: 0;
        color: #5b738c;
    }

    @keyframes cp-card-in {
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
        .career-premium-card {
            animation: none;
            opacity: 1;
            transform: none;
            filter: none;
        }
    }

    @media (max-width: 768px) {
        .careers-premium {
            padding-top: 6.6rem;
        }

        .careers-hero-card {
            padding: 1.4rem 1rem;
            border-radius: 18px;
            margin-bottom: 1.4rem;
        }

        .careers-grid-premium {
            gap: 1rem;
        }

        .career-premium-media {
            height: 190px;
        }
    }
</style>
@endsection
