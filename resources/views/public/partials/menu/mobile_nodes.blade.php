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
        $nodeUrl = trim((string) $node->url);
        $hasCustomUrl = $nodeUrl !== '' && $nodeUrl !== '#';
        $nodeHref = $hasCustomUrl ? url($nodeUrl) : null;
        $hasDesignLanding = !$node->career && $node->hasOwnDesignPresentation();

        $isServicios = false;
        $parent = $node->parent ?? null;
        while ($parent) {
            if (Str::lower(trim($parent->title)) === 'servicios') {
                $isServicios = true;
                break;
            }
            $parent = $parent->parent ?? null;
        }

        $rootParent = $node;
        while ($rootParent && $rootParent->parent) {
            $rootParent = $rootParent->parent;
        }
        $rootParentTitle = $rootParent ? Str::lower(trim($rootParent->title)) : null;
        $shouldOpenFolderView = $hasDesignLanding;
    @endphp

    @if($node->career && !$isDuplicated && trim($node->title) !== trim($node->career->name))
        @if($isPresencial)
            @php $presencialesMostradas[] = $node->career->id; @endphp
        @elseif($isDual)
            @php $dualesMostradas[] = $node->career->id; @endphp
        @endif
        <li class="mobile-tree-item mobile-tree-level-{{ $level }}">
            @if($hasCustomUrl)
                <a href="{{ $nodeHref }}" class="mobile-tree-link">{{ $node->career->name }}</a>
            @else
                <a href="{{ route('career.show', $node->career->slug) }}" class="mobile-tree-link">{{ $node->career->name }}</a>
            @endif
        </li>
    @endif

    @if($hasChildren && !$hasDesignLanding)
        <li class="mobile-tree-item mobile-tree-level-{{ $level }}">
            <details class="mobile-tree-details">
                <summary class="mobile-menu__summary mobile-tree-summary">
                    @if($hasCustomUrl)
                        <a href="{{ $nodeHref }}" class="mobile-tree-link" style="display:inline;">{{ $node->title }}</a>
                    @elseif($node->career && trim($node->title) === trim($node->career->name))
                        <a href="{{ route('career.show', $node->career->slug) }}" class="mobile-tree-link" style="display:inline;">{{ $node->title }}</a>
                    @elseif($shouldOpenFolderView || $node->hasOwnDesignPresentation())
                        <a href="{{ route('public.menu-designs.show', $node->id) }}" class="mobile-tree-link" style="display:inline;">{{ $node->title }}</a>
                    @else
                        {{ $node->title }}
                    @endif
                </summary>
                <ul class="mobile-menu__children mobile-tree-children menu-premium-panel">
                    @include('public.partials.menu.mobile_nodes', ['nodes' => $node->childrenRecursive, 'level' => $level + 1, 'presencialesMostradas' => $presencialesMostradas, 'dualesMostradas' => $dualesMostradas])
                </ul>
            </details>
        </li>
    @elseif($hasChildren && $hasDesignLanding)
        <li class="mobile-tree-item mobile-tree-level-{{ $level }}">
            <a href="{{ route('public.menu-designs.show', $node->id) }}" class="mobile-tree-link">{{ $node->title }}</a>
        </li>
    @elseif(!$node->career)
        <li class="mobile-tree-item mobile-tree-level-{{ $level }}">
            @if($hasCustomUrl)
                <a href="{{ $nodeHref }}" class="mobile-tree-link">{{ $node->title }}</a>
            @elseif($node->pdf_file)
                <a href="{{ asset($node->pdf_file) }}" class="mobile-tree-link" target="_blank" rel="noopener">{{ $node->title }}</a>
            @elseif($node->hasOwnDesignPresentation())
                <a href="{{ route('public.menu-designs.show', $node->id) }}" class="mobile-tree-link">{{ $node->title }}</a>
            @else
                <a href="{{ url($node->url ?: '#') }}" class="mobile-tree-link" @if($isServicios) target="_blank" rel="noopener" @endif>{{ $node->title }}</a>
            @endif
        </li>
    @elseif($node->career && trim($node->title) === trim($node->career->name))
        <li class="mobile-tree-item mobile-tree-level-{{ $level }}">
            @if($hasCustomUrl)
                <a href="{{ $nodeHref }}" class="mobile-tree-link">{{ $node->title }}</a>
            @else
                <a href="{{ route('career.show', $node->career->slug) }}" class="mobile-tree-link">{{ $node->title }}</a>
            @endif
        </li>
    @endif
@endforeach
