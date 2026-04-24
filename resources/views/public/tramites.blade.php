<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentos - ISTS Sucúa</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/harvard-style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logoists.png') }}" sizes="32x32">
</head>
<body>
    <header class="header">
        <nav class="main-navigation">
            <div class="container">
                <ul class="nav-menu">
                    <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Inicio</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main id="main-content" class="main-content">
        <section class="focus-section">
            <div class="container">
                <div class="focus-header">
                    <h1>Documentos Disponibles</h1>
                    <p>Encuentra información y guías sobre los documentos institucionales.</p>
                </div>

                <div class="focus-grid">
                    @if (isset($documentos) && !empty($documentos))
                        @foreach ($documentos as $documento)
                            <div class="focus-card">
                                @if (!empty($documento['image_url']))
                                    <div class="focus-image">
                                        <img src="{{ asset(htmlspecialchars($documento['image_url'])) }}" alt="{{ htmlspecialchars($documento['title']) }}">
                                    </div>
                                @endif
                                <div class="focus-content">
                                    @php
                                        $url = $documento['url'] ?? null;
                                        $file = $documento['file_url'] ?? null;
                                        $isExternalUrl = $url && filter_var($url, FILTER_VALIDATE_URL);
                                        $isFile = $file && !$isExternalUrl;
                                    @endphp
                                    @if ($isExternalUrl)
                                        <h3>
                                            <a href="{{ $url }}" target="_blank" class="text-primary underline">{{ htmlspecialchars($documento['title']) }}</a>
                                        </h3>
                                    @elseif ($isFile)
                                        <h3>
                                            <a href="{{ asset($file) }}" target="_blank" class="text-primary underline">{{ htmlspecialchars($documento['title']) }}</a>
                                        </h3>
                                    @else
                                        <h3>{{ htmlspecialchars($documento['title']) }}</h3>
                                    @endif
                                    <p>{{ htmlspecialchars($documento['description'] ?? '') }}</p>
                                    <div class="focus-actions">
                                        @if ($isExternalUrl)
                                            <a href="{{ $url }}" target="_blank" class="btn btn-outline">Ir al documento</a>
                                        @elseif ($isFile)
                                            <a href="{{ asset($file) }}" target="_blank" class="btn btn-outline">Ir al documento</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No hay documentos disponibles en este momento.</p>
                    @endif
                </div>
            </div>
        </section>
    </main>
</body>
</html>
