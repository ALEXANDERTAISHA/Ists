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
    @endphp
    <li class="menu-tree-item menu-tree-level-{{ $level }}{{ $hasChildren ? ' has-children' : '' }}">
        <div class="menu-tree-row">
            @php
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

            @if($hasCustomUrl)
                <a href="{{ $nodeHref }}" class="menu-tree-link" @if($isServicios) target="_blank" rel="noopener" onclick="window.open(this.href, '_blank', 'noopener'); return false;" @endif>{{ $node->title }}</a>
            @elseif($hasChildren && !(Str::lower(trim($node->title)) === 'reglamento'))
                @if($level === 0)
                    @if($shouldOpenFolderView)
                        <a href="{{ route('public.menu-designs.show', $node->id) }}" class="menu-tree-link" tabindex="0">{{ $node->title }}</a>
                    @else
                        <a href="#" class="menu-tree-link menu-tree-link--no-nav" tabindex="0">{{ $node->title }}</a>
                        <button type="button" class="menu-tree-toggle" aria-label="Desplegar submenu">▶</button>
                    @endif
                @else
                    <a href="{{ route('public.menu-designs.show', $node->id) }}" class="menu-tree-link" tabindex="0">{{ $node->title }}</a>
                @endif
            @elseif($node->career && trim($node->title) === trim($node->career->name))
                <a href="{{ route('career.show', $node->career->slug) }}" class="menu-tree-link">{{ $node->title }}</a>
            @elseif($node->pdf_file)
                <a href="{{ asset($node->pdf_file) }}" class="menu-tree-link" target="_blank" rel="noopener">{{ $node->title }}</a>
            @elseif($node->hasOwnDesignPresentation())
                <a href="{{ route('public.menu-designs.show', $node->id) }}" class="menu-tree-link">{{ $node->title }}</a>
            @else
                <a href="#" class="menu-tree-link menu-tree-link--no-nav">{{ $node->title }}</a>
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

        @if($hasChildren && $level === 0 && !(Str::lower(trim($node->title)) === 'reglamento') && !$hasDesignLanding)
            <ul class="menu-tree-children menu-tree-children-level-{{ $level + 1 }} menu-premium-panel">
                @foreach($node->children as $child)
                    @php
                        $childUrl = trim((string) $child->url);
                        $childHasCustomUrl = $childUrl !== '' && $childUrl !== '#';
                        $childHref = $childHasCustomUrl ? url($childUrl) : null;
                    @endphp
                    <li class="menu-tree-item menu-tree-level-{{ $level + 1 }}">
                        <div class="menu-tree-row">
                            @if($childHasCustomUrl)
                                <a href="{{ $childHref }}" class="menu-tree-link" @if($isServicios) target="_blank" rel="noopener" onclick="window.open(this.href, '_blank', 'noopener'); return false;" @endif>{{ $child->title }}</a>
                            @elseif($child->career && $child->career->slug)
                                <a href="{{ route('career.show', $child->career->slug) }}" class="menu-tree-link">{{ $child->title }}</a>
                            @elseif($child->pdf_file)
                                <a href="{{ asset($child->pdf_file) }}" class="menu-tree-link" target="_blank" rel="noopener">{{ $child->title }}</a>
                            @elseif($child->hasBrowsableDesignContent())
                                <a href="{{ route('public.menu-designs.show', $child->id) }}" class="menu-tree-link">{{ $child->title }}</a>
                            @else
                                <span class="menu-tree-link">{{ $child->title }}</span>
                            @endif
                        </div>
                    </li>
                @endforeach
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
                    @if($hasCustomUrl)
                        <a href="{{ $nodeHref }}" class="menu-tree-link" @if($isServicios) target="_blank" rel="noopener" onclick="window.open(this.href, '_blank', 'noopener'); return false;" @endif>{{ $node->career->name }}</a>
                    @elseif($node->career && $node->career->slug)
                        <a href="{{ route('career.show', $node->career->slug) }}" class="menu-tree-link">{{ $node->career->name }}</a>
                    @else
                        <span class="menu-tree-link">{{ $node->career->name }}</span>
                    @endif
                </div>
            </li>
        @endif
    </li>
@endforeach
