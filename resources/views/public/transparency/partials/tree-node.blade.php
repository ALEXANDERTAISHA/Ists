@php
    $node = $node ?? [];
    $children = $node['children'] ?? [];
    $hasChildren = !empty($children);
    $rawFile = $node['file_url'] ?? $node['pdf_url'] ?? null;

    if (!empty($rawFile)) {
        if (filter_var($rawFile, FILTER_VALIDATE_URL)) {
            $fileLink = $rawFile;
        } elseif (strpos($rawFile, '/uploads') === 0 || strpos($rawFile, 'uploads/') === 0) {
            $fileLink = asset(ltrim($rawFile, '/'));
        } else {
            $fileLink = asset('storage/' . ltrim($rawFile, '/'));
        }
    } else {
        $fileLink = null;
    }

    $detailLink = !empty($node['slug']) ? route('transparency.show', $node['slug']) : '#';
    $folderClass = empty($fileLink) ? 'tree-folder tree-folder--empty' : 'tree-folder';
@endphp

@if($hasChildren)
    <details class="{{ $folderClass }}" open style="--tree-level: {{ (int)($level ?? 0) }};">
        <summary>
            <span class="tree-caret">▶</span>
            <span>📁</span>
            <a href="{{ $detailLink }}" class="tree-title-link">{{ $node['title'] ?? 'Sin título' }}</a>
        </summary>
        <div class="tree-body">
            @if(!empty($node['description']))
                <div style="color:#334155; margin-bottom: 0.35rem;">{{ $node['description'] }}</div>
            @endif

            @if($fileLink)
                <a href="{{ $fileLink }}" target="_blank" class="tree-file-link pdf-pro-link">📄 Ver PDF</a>
            @endif

            <div class="tree-children">
                @foreach($children as $child)
                    @include('public.transparency.partials.tree-node', ['node' => $child, 'level' => ($level ?? 0) + 1])
                @endforeach
            </div>
        </div>
    </details>
@else
    <div class="{{ $folderClass }}" style="--tree-level: {{ (int)($level ?? 0) }};">
        <div class="tree-body tree-body--leaf @if($fileLink) pdf-card-premium @endif">
            <div style="display:flex; flex-wrap: wrap; align-items:center; gap:0.55rem;">
                @if($fileLink)
                    <span class="pdf-card-premium-icon">
                        <svg viewBox="0 0 32 32" fill="none" width="32" height="32">
                            <rect width="32" height="32" rx="8" fill="#fff2f2"/>
                            <path d="M10 8a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V12.828a2 2 0 0 0-.586-1.414l-3.828-3.828A2 2 0 0 0 17.172 7H10Zm0 2h7v3a2 2 0 0 0 2 2h3v8a1 1 0 0 1-1 1H10a1 1 0 0 1-1-1V10a1 1 0 0 1 1-1Zm9 0.414L24.586 14H19a1 1 0 0 1-1-1V8.414Z" fill="#c62828"/>
                        </svg>
                    </span>
                @else
                    <span>📁</span>
                @endif
                <a href="{{ $detailLink }}" class="tree-title-link @if($fileLink) pdf-card-premium-title @endif" style="font-weight:700;">{{ $node['title'] ?? 'Sin título' }}</a>
                @if($fileLink)
                    <a href="{{ $fileLink }}" target="_blank" class="tree-file-link pdf-pro-link" style="margin-top:0; color:#fff; font-weight:600;">Ver PDF</a>
                @endif
            </div>
            @if(!empty($node['description']))
                <div style="margin-top:0.45rem; color:#fff;">{{ $node['description'] }}</div>
            @endif
        </div>
    </div>
@endif
