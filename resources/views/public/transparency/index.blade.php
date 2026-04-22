@extends('public.layout')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin-top:100px;">
    <div class="p-6 text-gray-900">
        <div class="career-title-container text-center" style="margin-bottom:2.5rem;">
            <h1 class="text-4xl font-bold mb-6">{{ $title }}</h1>
        </div>

        @php
            $firstItem = $items[0] ?? null;
            $imgPath = $firstItem['image_url'] ?? $firstItem['image'] ?? null;

            if (!empty($imgPath)) {
                if (filter_var($imgPath, FILTER_VALIDATE_URL)) {
                    $imgSrc = $imgPath;
                } elseif (strpos($imgPath, '/uploads') === 0 || strpos($imgPath, 'uploads/') === 0) {
                    $imgSrc = asset(ltrim($imgPath, '/'));
                } else {
                    $imgSrc = asset('storage/' . ltrim($imgPath, '/'));
                }
            } else {
                $imgSrc = asset('assets/img/institucional-placeholder.png');
            }
        @endphp

        <div style="display: flex; gap: 2rem; align-items: flex-start; flex-wrap: wrap;">
            <div style="flex: 0 0 320px; max-width: 320px; background: #f6f6f6; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.07); padding: 1rem; display: flex; justify-content: center; align-items: center; width: 100%;">
                <img src="{{ $imgSrc }}" alt="{{ $title }}" style="max-width: 100%; max-height: 260px; border-radius: 8px; object-fit: cover;">
            </div>
            <div style="flex: 1; background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); padding: 1.5rem;">
                <p style="font-size:1.15rem; color:#222; margin-bottom:1rem;">
                    {{ $firstItem['description'] ?? 'Consulta y descarga documentos organizados por carpetas y subcarpetas.' }}
                </p>
            </div>
        </div>

        <div class="subreglamentos-list mt-8">
            <h2 class="text-2xl font-bold mb-4" style="color:#009e60; text-align:center;">Niveles Principales</h2>

            @if(empty($items))
                <div style="text-align:center; color:#64748b;">No hay documentos publicados por el momento.</div>
            @else
                <div class="transparency-level-grid">
                    @foreach($items as $item)
                        @php
                            $itemFile = $item['file_url'] ?? $item['url'] ?? null;
                            if (!empty($itemFile)) {
                                if (filter_var($itemFile, FILTER_VALIDATE_URL)) {
                                    $itemFileLink = $itemFile;
                                } elseif (strpos($itemFile, '/uploads') === 0 || strpos($itemFile, 'uploads/') === 0) {
                                    $itemFileLink = asset(ltrim($itemFile, '/'));
                                } else {
                                    $itemFileLink = asset('storage/' . ltrim($itemFile, '/'));
                                }
                            } else {
                                $itemFileLink = null;
                            }

                            $isFolder = !empty($item['children_count']);
                            $cardHref = ($itemFileLink && !$isFolder) ? $itemFileLink : route('transparency.show', $item['slug']);
                            $cardTarget = ($itemFileLink && !$isFolder) ? '_blank' : '_self';
                        @endphp

                        @if(!empty($item['file_url']) || !empty($item['url']))
                        <a href="{{ $cardHref }}" target="{{ $cardTarget }}" class="transparency-level-card pdf-card-premium">
                            <div class="pdf-card-premium-icon">
                                <svg viewBox="0 0 40 40" fill="none" width="40" height="40">
                                    <rect width="40" height="40" rx="12" fill="#fff2f2"/>
                                    <path d="M13 10a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V16.5a3 3 0 0 0-.879-2.121l-5.5-5.5A3 3 0 0 0 22.5 8H13Zm0 2h9v4a3 3 0 0 0 3 3h4v10a1 1 0 0 1-1 1H13a1 1 0 0 1-1-1V13a1 1 0 0 1 1-1Zm12 0.586L31.414 18H25a1 1 0 0 1-1-1v-6.414Z" fill="#c62828"/>
                                </svg>
                            </div>
                            <div class="pdf-card-premium-title">{{ $item['title'] }}</div>
                        </a>
                        @else
                        <a href="{{ $cardHref }}" target="{{ $cardTarget }}" class="transparency-level-card">
                            <div class="level-card-head">
                                <h3 class="level-card-title">{{ $item['title'] }}</h3>
                            </div>
                            <div class="level-card-body">
                                @if(!empty($item['description']))
                                    <p class="level-card-description">{{ \Illuminate\Support\Str::limit(strip_tags($item['description']), 120) }}</p>
                                @endif
                            </div>
                        </a>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .transparency-level-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 0.9rem;
        max-width: 980px;
        margin: 0 auto;
    }

    .subreglamentos-list {
        margin-bottom: 3.5rem;
        padding-bottom: 1.25rem;
    }

    .transparency-level-card {
        border: 1px solid #93c5fd;
        border-radius: 10px;
        background: linear-gradient(180deg, #f7fbff 0%, #eef6ff 100%);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        min-height: 190px;
        text-decoration: none;
        transition: transform 0.16s ease, box-shadow 0.16s ease, border-color 0.16s ease;
    }

    .transparency-level-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 24px rgba(30, 64, 175, 0.14);
        border-color: #60a5fa;
    }

    .level-card-head {
        display: flex;
        align-items: flex-start;
        gap: 0.55rem;
        padding: 0.95rem 1rem;
        border-bottom: 1px solid #bfdbfe;
        background: #dbeafe;
    }

    .level-card-icon {
        width: 1.2rem;
        height: 1.2rem;
        line-height: 1;
        margin-top: 0.1rem;
        flex-shrink: 0;
        color: #2563eb;
    }

    .level-card-icon svg {
        width: 100%;
        height: 100%;
    }

    .level-card-title {
        margin: 0;
        color: #0f172a;
        font-size: 1.15rem;
        line-height: 1.35;
        letter-spacing: 0.01em;
        overflow-wrap: break-word;
        word-break: normal;
        hyphens: auto;
    }

    .level-card-body {
        padding: 0.85rem 1rem 1rem;
        display: flex;
        flex-direction: column;
        gap: 0.7rem;
        flex: 1;
        position: relative;
        overflow: hidden;
    }

    .level-card-bg-icon {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0.14;
        pointer-events: none;
        user-select: none;
        color: #1d4ed8;
    }

    .level-card-bg-icon svg {
        width: 72%;
        height: 72%;
    }

    .level-card-description {
        margin: 0;
        color: #334155;
        font-size: 0.94rem;
        line-height: 1.45;
        position: relative;
        z-index: 1;
    }

    .level-card-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 0.4rem;
        margin-top: auto;
        position: relative;
        z-index: 1;
    }

    .level-chip {
        display: inline-flex;
        align-items: center;
        padding: 0.2rem 0.55rem;
        border-radius: 999px;
        font-size: 0.76rem;
        font-weight: 700;
        color: #1e3a8a;
        background: #dbeafe;
        border: 1px solid #93c5fd;
    }

    .level-chip--pdf {
        color: #0f4c5c;
        background: #dff5ff;
        border-color: #9edcf6;
    }

    .level-card-actions {
        margin-top: 0.35rem;
        position: relative;
        z-index: 1;
    }

    @media (max-width: 1200px) {
        .transparency-level-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (max-width: 900px) {
        .transparency-level-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .transparency-level-grid {
            max-width: 100%;
        }
    }

    @media (max-width: 600px) {
        .transparency-level-grid {
            grid-template-columns: 1fr;
        }

        .subreglamentos-list {
            margin-bottom: 2.5rem;
            padding-bottom: 0.75rem;
        }
    }
</style>
@endsection