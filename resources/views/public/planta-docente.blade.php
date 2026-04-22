<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Planta Docente - ISTS Sucúa' }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/harvard-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/harvard-exact.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logoists.png') }}" sizes="32x32">
    <style>
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 32px;
            margin-top: 2.5rem;
        }
        .team-member-card {
            background: linear-gradient(135deg, #f8fafc 60%, #e0f7fa 100%);
            border-radius: 18px;
            box-shadow: 0 6px 24px rgba(16, 36, 58, 0.13), 0 1.5px 6px #0ea5a233;
            padding: 1.5rem 1.1rem 1.1rem 1.1rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.18s cubic-bezier(.4,2,.6,1), box-shadow 0.18s;
            position: relative;
            min-height: 340px;
            border: 2px solid #e0f2f1;
            max-width: 320px;
            margin: 0 auto;
        }
        .team-member-card:hover {
            transform: translateY(-6px) scale(1.035);
            box-shadow: 0 12px 32px rgba(14, 165, 162, 0.18), 0 2px 8px #0ea5a233;
            border-color: #0ea5a2;
        }
        .team-member-img {
            width: 100%;
            max-width: 260px;
            height: 260px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 2px 12px #0ea5a233;
            border: 3px solid #fff;
            margin-bottom: 1.1rem;
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
            font-size: 1.13rem;
            font-weight: 700;
            color: #0b3a66;
            margin-bottom: 0.35rem;
            letter-spacing: 0.01em;
        }
        .team-member-info .position {
            color: #0ea5a2;
            font-weight: 600;
            margin-bottom: 0.15rem;
            font-size: 0.98rem;
        }
        .team-member-info .department {
            color: #64748b;
            font-size: 0.93rem;
            margin-bottom: 0.5rem;
        }
        .pdf-pro-link {
            display: inline-flex;
            align-items: center;
            gap: 0.6em;
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
        .pdf-pro-link-premium, .pdf-pro-link {
            all: unset;
        }
    </style>
</head>
<body>
    @include('public.partials.header')

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
                    @if(isset($teachers) && count($teachers) > 0)
                        @foreach($teachers as $teacher)
                            <div class="team-member-card">
                                @if($teacher->image_path)
                                    <img src="{{ asset('storage/' . $teacher->image_path) }}" alt="{{ $teacher->name }}" class="team-member-img">
                                @else
                                    <img src="{{ asset('storage/uploads/images/profe.jpg') }}" alt="Imagen por defecto docente" class="team-member-img">
                                @endif
                                <div class="team-member-info">
                                    <h3>{{ $teacher->name }}</h3>
                                    <p class="position">{{ $teacher->title }}</p>
                                    <p class="department">{{ $teacher->department }}</p>
                                    @if($teacher->pdf_path)
                                        <a href="{{ asset('storage/' . $teacher->pdf_path) }}" target="_blank" class="pdf-pro-link" style="margin-top:10px;">
                                            Ver Currículum
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No hay docentes para mostrar.</p>
                    @endif
                </div>
            </div>
        </section>
    </main>

    @include('public.partials.footer')

    @include('public.acerca.partials.about-styles')
</body>
</html>
