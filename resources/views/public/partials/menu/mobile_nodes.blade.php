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
    @if($node->career && !$isDuplicated && trim($node->title) !== trim($node->career->name))
        @if($isPresencial)
            @php $presencialesMostradas[] = $node->career->id; @endphp
        @elseif($isDual)
            @php $dualesMostradas[] = $node->career->id; @endphp
        @endif
        <li class="mobile-tree-item mobile-tree-level-{{ $level }}">
            <a href="{{ route('career.show', $node->career->slug) }}" class="mobile-tree-link">{{ $node->career->name }}</a>
        </li>
    @endif
    @if($hasChildren)
        <li class="mobile-tree-item mobile-tree-level-{{ $level }}">
            <details class="mobile-tree-details">
                <summary class="mobile-menu__summary mobile-tree-summary">
                    @if($node->career && trim($node->title) === trim($node->career->name))
                        <a href="{{ route('career.show', $node->career->slug) }}" class="mobile-tree-link" style="display:inline;">{{ $node->title }}</a>
                    @else
                        {{ $node->title }}
                    @endif
                </summary>
                <ul class="mobile-menu__children mobile-tree-children">
                    @include('public.partials.menu.mobile_nodes', ['nodes' => $node->childrenRecursive, 'level' => $level + 1, 'presencialesMostradas' => $presencialesMostradas, 'dualesMostradas' => $dualesMostradas])
                </ul>
            </details>
        </li>
    @elseif(!$node->career)
        <li class="mobile-tree-item mobile-tree-level-{{ $level }}">
            @if($node->pdf_file)
                <a href="{{ asset($node->pdf_file) }}" class="mobile-tree-link" target="_blank" rel="noopener">{{ $node->title }}</a>
            @else
                <a href="{{ url($node->url ?: '#') }}" class="mobile-tree-link" @if($isServicios) target="_blank" rel="noopener" @endif>{{ $node->title }}</a>
            @endif
        </li>
    @endif
@endforeach
