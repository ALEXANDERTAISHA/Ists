@php
    $level = $level ?? 0;
    $presencialesMostradas = $presencialesMostradas ?? [];
    $dualesMostradas = $dualesMostradas ?? [];
@endphp

@foreach($nodes as $node)
    @php
        $hasChildren = $node->childrenRecursive && $node->childrenRecursive->count() > 0;
        $isPresencial = isset($node->career) && $node->career && $node->career->modality === 'presencial';
        $isDual = isset($node->career) && $node->career && $node->career->modality === 'dual';
        $isDuplicated = ($isPresencial && in_array($node->career->id, $presencialesMostradas)) || ($isDual && in_array($node->career->id, $dualesMostradas));
    @endphp
    <li class="menu-tree-item menu-tree-level-{{ $level }}{{ $hasChildren ? ' has-children' : '' }}">
        <div class="menu-tree-row">
            @php
                // Detectar si es submenú de Servicios
                $isServicios = false;
                $parent = $node->parent ?? null;
                while ($parent) {
                    if (Str::lower(trim($parent->title)) === 'servicios') {
                        $isServicios = true;
                        break;
                    }
                    $parent = $parent->parent ?? null;
                }
            @endphp
            @if($hasChildren && !(Str::lower(trim($node->title)) === 'reglamento'))
                @if($node->career && trim($node->title) === trim($node->career->name))
                    <a href="{{ route('career.show', $node->career->slug) }}" class="menu-tree-link menu-tree-link--no-nav" tabindex="0">{{ $node->title }}</a>
                @else
                    <a href="#" class="menu-tree-link menu-tree-link--no-nav" tabindex="0">{{ $node->title }}</a>
                @endif
                <button type="button" class="menu-tree-toggle" aria-label="Desplegar submenu">▶</button>
            @else
                @if($node->career && trim($node->title) === trim($node->career->name))
                    <a href="{{ route('career.show', $node->career->slug) }}" class="menu-tree-link">{{ $node->title }}</a>
                @elseif($node->pdf_file)
                    <a href="{{ asset($node->pdf_file) }}" class="menu-tree-link" target="_blank" rel="noopener">{{ $node->title }}</a>
                @else
                    <a href="{{ url($node->url ?: '#') }}" class="menu-tree-link" @if($isServicios) target="_blank" rel="noopener" @endif>{{ $node->title }}</a>
                @endif
            @endif
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.menu-tree-link--no-nav').forEach(function(link) {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                    });
                });
            });
        </script>
        @if($hasChildren && !(Str::lower(trim($node->title)) === 'reglamento'))
            <ul class="menu-tree-children menu-tree-children-level-{{ $level + 1 }}">
                @include('public.partials.menu.desktop_nodes', ['nodes' => $node->childrenRecursive, 'level' => $level + 1, 'presencialesMostradas' => $presencialesMostradas, 'dualesMostradas' => $dualesMostradas])
            </ul>
        @endif
        @if($node->career && !$isDuplicated && trim($node->title) !== trim($node->career->name))
            @if($isPresencial)
                @php $presencialesMostradas[] = $node->career->id; @endphp
            @elseif($isDual)
                @php $dualesMostradas[] = $node->career->id; @endphp
            @endif
            <li class="menu-tree-item menu-tree-level-{{ $level + 1 }}">
                <div class="menu-tree-row">
                    <a href="{{ route('career.show', $node->career->slug) }}" class="menu-tree-link">{{ $node->career->name }}</a>
                </div>
            </li>
        @endif
    </li>
@endforeach
