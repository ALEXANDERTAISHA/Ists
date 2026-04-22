@extends('layouts.site')

@section('content')
    <style>
        .news-detail-shell {
            position: relative;
            max-width: 1040px;
            margin: 2.5cm auto 0;
            padding: 0 1rem 3.5rem;
        }

        .news-detail-shell::before,
        .news-detail-shell::after {
            content: '';
            position: absolute;
            border-radius: 999px;
            filter: blur(70px);
            pointer-events: none;
            z-index: 0;
            opacity: 0.65;
        }

        .news-detail-shell::before {
            width: 260px;
            height: 260px;
            top: 20px;
            left: -110px;
            background: rgba(20, 184, 166, 0.12);
        }

        .news-detail-shell::after {
            width: 300px;
            height: 300px;
            top: 220px;
            right: -120px;
            background: rgba(37, 99, 235, 0.12);
        }

        .news-detail-hero {
            position: relative;
            z-index: 1;
            margin-bottom: 1.8rem;
        }

        .news-detail-kicker {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.42rem 0.95rem;
            margin-bottom: 1rem;
            border-radius: 999px;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.12), rgba(59, 130, 246, 0.08));
            border: 1px solid rgba(16, 185, 129, 0.14);
            color: #047857;
            font-size: 0.76rem;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .news-detail-title {
            font-size: clamp(2.2rem, 4.5vw, 3.8rem);
            font-weight: 900;
            line-height: 1.05;
            letter-spacing: -2px;
            color: #0f172a;
            margin: 0;
            max-width: 900px;
        }

        .news-detail-underline {
            display: block;
            height: 5px;
            width: 74px;
            background: linear-gradient(90deg, #1abc9c, #3498db);
            border-radius: 999px;
            margin-top: 0.95rem;
        }

        .news-detail-meta {
            position: relative;
            z-index: 1;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            color: #475569;
            font-size: 1rem;
            font-weight: 700;
            padding: 0.8rem 1rem;
            border-radius: 16px;
            background: rgba(255,255,255,0.72);
            border: 1px solid rgba(226,232,240,0.9);
            box-shadow: 0 10px 24px rgba(15,23,42,0.05);
            backdrop-filter: blur(10px);
            margin-bottom: 1.8rem;
        }

        .news-detail-meta-icon {
            width: 34px;
            height: 34px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(20,184,166,0.16), rgba(59,130,246,0.16));
            color: #0f766e;
            font-size: 1rem;
        }

        .news-detail-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 18px;
            margin-bottom: 2.2rem;
            position: relative;
            z-index: 1;
        }

        .news-detail-frame {
            min-height: 240px;
            overflow: hidden;
            border-radius: 24px;
            box-shadow: 0 18px 50px rgba(15, 23, 42, 0.08), 0 6px 16px rgba(59, 130, 246, 0.05);
            background:
                radial-gradient(circle at top, rgba(255,255,255,0.96) 0%, rgba(255,255,255,0.78) 30%, transparent 60%),
                linear-gradient(180deg, #f8fafc 0%, #eef2f7 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            border: 1px solid rgba(226, 232, 240, 0.95);
            transition: transform 0.3s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.3s ease;
        }

        .news-detail-frame img {
            width: 100%;
            max-height: 420px;
            object-fit: contain;
            object-position: center;
            display: block;
            transition: transform 0.25s ease;
        }

        .news-detail-frame:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 60px rgba(15, 23, 42, 0.12), 0 10px 24px rgba(20, 184, 166, 0.08);
        }

        .news-detail-frame:hover img {
            transform: scale(1.03);
        }

        .news-detail-body {
            position: relative;
            z-index: 1;
            background: rgba(255,255,255,0.9);
            border-radius: 28px;
            box-shadow: 0 20px 60px rgba(15, 23, 42, 0.08), 0 4px 12px rgba(15, 23, 42, 0.04);
            padding: 2.3rem 2.1rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(226, 232, 240, 0.95);
            backdrop-filter: blur(10px);
        }

        .news-detail-body p,
        .news-detail-body li,
        .news-detail-body blockquote {
            color: #334155;
            font-size: 1.03rem;
            line-height: 1.9;
        }

        .news-detail-body h2,
        .news-detail-body h3,
        .news-detail-body h4 {
            color: #0f172a;
            font-weight: 800;
            letter-spacing: -0.6px;
            margin-top: 1.4rem;
        }

        .news-detail-body img {
            max-width: 100%;
            height: auto;
            border-radius: 18px;
        }

        @media (max-width: 768px) {
            .news-detail-shell {
                padding: 0 0.75rem 2.5rem;
            }

            .news-detail-meta {
                width: 100%;
                justify-content: flex-start;
            }

            .news-detail-frame {
                min-height: 200px;
                padding: 0.75rem;
            }

            .news-detail-frame img {
                max-height: 300px;
            }

            .news-detail-body {
                border-radius: 22px;
                padding: 1.5rem 1.2rem;
            }
        }
    </style>

    <div class="news-detail-shell">
        <div class="news-detail-hero">
            <span class="news-detail-kicker">Noticia destacada</span>
            <h1 class="news-detail-title">
                {{ $news['title'] ?? 'Noticia' }}
                <span class="news-detail-underline"></span>
            </h1>
        </div>
        <div class="news-detail-meta">
            <span class="news-detail-meta-icon">🗓️</span>
            {{ optional(\Carbon\Carbon::parse($news['published_at'] ?? null))->format('d/m/Y') }}
        </div>
        @if(isset($news['images']) && is_array($news['images']) && count($news['images']) > 0)
            <div class="news-detail-gallery">
                @foreach($news['images'] as $img)
                    <div class="news-detail-frame">
                        <img src="{{ asset('storage/' . ltrim($img, '/')) }}" alt="Imagen noticia">
                    </div>
                @endforeach
            </div>
        @endif
        <div class="news-detail-body">
            {!! $news['content'] ?? ($news['summary'] ?? '') !!}
        </div>
    </div>
@endsection
