@extends('layouts.site')

@section('content')
    <style>
        .news-page-shell {
            position: relative;
            max-width: 1180px;
            margin: 2.5cm auto 0;
            padding: 0 1rem 3.5rem;
        }

        .news-page-shell::before,
        .news-page-shell::after {
            content: '';
            position: absolute;
            border-radius: 999px;
            filter: blur(70px);
            pointer-events: none;
            z-index: 0;
            opacity: 0.65;
        }

        .news-page-shell::before {
            width: 280px;
            height: 280px;
            top: 10px;
            left: -90px;
            background: rgba(16, 185, 129, 0.12);
        }

        .news-page-shell::after {
            width: 320px;
            height: 320px;
            top: 180px;
            right: -120px;
            background: rgba(59, 130, 246, 0.12);
        }

        .news-page-intro {
            position: relative;
            z-index: 1;
            text-align: center;
            margin-bottom: 2.8rem;
        }

        .news-page-kicker {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.45rem 1rem;
            border-radius: 999px;
            font-size: 0.76rem;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #047857;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.12), rgba(59, 130, 246, 0.08));
            border: 1px solid rgba(16, 185, 129, 0.14);
            margin-bottom: 1rem;
        }

        .news-page-title {
            font-size: clamp(2.4rem, 5vw, 4rem);
            line-height: 1.02;
            letter-spacing: -2px;
            font-weight: 900;
            color: #0f172a;
            margin: 0;
        }

        .news-page-title-accent {
            background: linear-gradient(90deg, #00796b 0%, #14b8a6 45%, #2563eb 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .news-page-subtitle {
            max-width: 700px;
            margin: 1rem auto 0;
            font-size: 1.03rem;
            line-height: 1.75;
            color: #64748b;
        }

        .news-thumb-frame {
            width: 100%;
            height: 230px;
            overflow: hidden;
            background:
                radial-gradient(circle at top, rgba(255,255,255,0.95) 0%, rgba(255,255,255,0.72) 28%, transparent 58%),
                linear-gradient(180deg, #f8fafc 0%, #edf4fb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            border-bottom: 1px solid rgba(148, 163, 184, 0.16);
        }

        .news-thumb-frame img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center;
            display: block;
            transition: transform 0.5s ease, filter 0.35s ease;
        }

        .news-grid {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 32px;
            margin-top: 2.2rem;
        }

        .news-card {
            position: relative;
            background: rgba(255, 255, 255, 0.92);
            border-radius: 26px;
            box-shadow: 0 20px 60px rgba(15, 23, 42, 0.08), 0 4px 12px rgba(15, 23, 42, 0.04);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            border: 1px solid rgba(226, 232, 240, 0.95);
            backdrop-filter: blur(10px);
            transition: transform 0.35s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.35s ease, border-color 0.25s ease;
        }

        .news-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(255,255,255,0.22), transparent 34%);
            pointer-events: none;
            z-index: 0;
        }

        .news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 28px 72px rgba(15, 23, 42, 0.14), 0 10px 24px rgba(20, 184, 166, 0.08);
            border-color: rgba(20, 184, 166, 0.22);
        }

        .news-card:hover .news-thumb-frame img {
            transform: scale(1.04);
            filter: saturate(1.04);
        }

        .news-content {
            position: relative;
            z-index: 1;
            padding: 1.4rem 1.35rem 1.35rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .news-category {
            display: inline-flex;
            align-items: center;
            width: fit-content;
            max-width: 100%;
            border-radius: 999px;
            padding: 0.38rem 0.95rem;
            margin-bottom: 0.95rem;
            font-size: 0.84rem;
            font-weight: 800;
            letter-spacing: 0.3px;
            line-height: 1;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.28);
        }

        .news-card-title {
            font-size: 1.7rem;
            font-weight: 900;
            line-height: 1.18;
            letter-spacing: -0.9px;
            color: #0f172a;
            margin: 0 0 0.8rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .news-meta {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #64748b;
            font-size: 0.93rem;
            font-weight: 700;
            margin-bottom: 0.95rem;
        }

        .news-meta-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: linear-gradient(135deg, #14b8a6, #2563eb);
            box-shadow: 0 0 0 5px rgba(20, 184, 166, 0.08);
        }

        .news-excerpt {
            flex: 1;
            color: #334155;
            font-size: 1rem;
            line-height: 1.75;
            margin: 0 0 1.25rem;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .news-read-more {
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            width: fit-content;
            color: #0f172a;
            font-weight: 800;
            text-decoration: none;
            font-size: 0.97rem;
            letter-spacing: 0.1px;
            padding-bottom: 0.18rem;
            border-bottom: 2px solid rgba(20, 184, 166, 0.22);
            transition: color 0.2s ease, gap 0.25s ease, border-color 0.25s ease;
        }

        .news-read-more:hover {
            color: #0f766e;
            gap: 0.8rem;
            border-color: rgba(20, 184, 166, 0.7);
        }

        .news-read-more-arrow {
            font-size: 1rem;
            line-height: 1;
        }

        .news-pagination-wrap {
            position: relative;
            z-index: 1;
            margin-top: 2.8rem;
            display: flex;
            justify-content: center;
        }

        @media (max-width: 768px) {
            .news-page-shell {
                padding: 0 0.75rem 2.5rem;
            }

            .news-page-intro {
                margin-bottom: 2.1rem;
            }

            .news-thumb-frame {
                height: 200px;
                padding: 0.65rem;
            }

            .news-card {
                border-radius: 22px;
            }

            .news-card-title {
                font-size: 1.45rem;
            }
        }
    </style>

    <div class="news-page-shell">
        <div class="news-page-intro">
            <span class="news-page-kicker">Actualidad institucional</span>
            <h1 class="news-page-title">Noticias <span class="news-page-title-accent">ISTS</span></h1>
            <p class="news-page-subtitle">Descubre actividades, reconocimientos, convocatorias y novedades académicas en una experiencia editorial más clara, elegante y legible.</p>
        </div>
        @if($news->count() === 0)
            <p>No hay noticias publicadas.</p>
        @else
            <div class="news-grid">
                @foreach($news as $n)
                    <article class="news-card">
                        <div class="news-thumb-frame">
                            @if(is_array($n->images) && count($n->images) > 0)
                                <img src="{{ asset('storage/' . ltrim($n->images[0], '/')) }}" alt="{{ $n->title }}">
                            @else
                                <img src="{{ asset('storage/uploads/images/placeholder.jpg') }}" alt="{{ $n->title }}">
                            @endif
                        </div>
                        <div class="news-content">
                            <span class="news-category" style="background:linear-gradient(135deg,#10b981,#14b8a6); color:#fff;">{{ ucfirst($n->category ?? 'Noticias') }}</span>
                            <h3 class="news-card-title">{{ $n->title }}</h3>
                            <div class="news-meta">
                                <span class="news-meta-dot"></span>
                                <span>{{ optional(\Carbon\Carbon::parse($n->published_at ?? null))->format('d/m/Y') }}</span>
                            </div>
                            <p class="news-excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($n->summary), 145) }}</p>
                            <a href="{{ route('noticias.show', $n->slug) }}" class="news-read-more">
                                Leer noticia completa
                                <span class="news-read-more-arrow">↗</span>
                            </a>
                        </div>
                    </article>
                @endforeach
                @if(isset($eventNews))
                    @foreach($eventNews as $event)
                        <article class="news-card">
                            <div class="news-thumb-frame">
                                @if($event->images->count())
                                    <img src="{{ asset('storage/' . ltrim($event->images->first()->image_path, '/')) }}" alt="{{ $event->title }}">
                                @else
                                    <img src="{{ asset('storage/uploads/images/placeholder.jpg') }}" alt="{{ $event->title }}">
                                @endif
                            </div>
                            <div class="news-content">
                                <span class="news-category" style="background:linear-gradient(135deg,#2563eb,#3b82f6); color:#fff;">Evento pasado</span>
                                <h3 class="news-card-title">{{ $event->title }}</h3>
                                <div class="news-meta">
                                    <span class="news-meta-dot"></span>
                                    <span>{{ optional($event->date)->format('d/m/Y') }}</span>
                                </div>
                                <p class="news-excerpt">{{ \Illuminate\Support\Str::limit(strip_tags(html_entity_decode($event->description)), 145) }}</p>
                                <a href="{{ route('public.events.show', $event->id) }}" class="news-read-more">
                                    Ver detalles
                                    <span class="news-read-more-arrow">↗</span>
                                </a>
                            </div>
                        </article>
                    @endforeach
                @endif
            </div>
            <div class="news-pagination-wrap">
                {{ $news->links() }}
            </div>
        @endif
    </div>
@endsection
