@php
    $indent = max(0, ((int) ($level ?? 0)) * 20);
    $nodeId = 'menu-node-' . $item->id;
    $isExpanded = false;
@endphp

<div id="{{ $nodeId }}" style="margin-left: {{ $indent }}px; border:1px solid #e2e8f0; border-radius:12px; overflow:hidden; margin-bottom:10px;">
    <div class="d-flex flex-wrap justify-content-between align-items-center" style="padding:0.9rem 1rem; background:{{ ($level ?? 0) === 0 ? '#f8fafc' : '#ffffff' }}; gap:0.7rem;">
        <div style="display:flex; align-items:center; gap:0.7rem;">
            <button type="button" class="btn btn-sm btn-light" onclick="toggleMenuNode('{{ $nodeId }}')" style="font-size:1.1rem; border-radius:6px; border:1px solid #e2e8f0; padding:0.2rem 0.6rem;">
                <span id="icon-{{ $nodeId }}">{{ $isExpanded ? '-' : '+' }}</span>
            </button>
            <div>
                <div style="font-weight:800; color:#0f172a;">
                    @if(($level ?? 0) > 0)
                        <span style="color:#94a3b8; margin-right:6px;">{{ str_repeat('->', (int) $level) }}</span>
                    @endif
                    {{ $item->title }}
                </div>
                <div style="font-size:0.86rem; color:#64748b;">
                    URL: {{ $item->url ?: '#' }} | Orden: {{ $item->order ?? 0 }} | Estado: {{ $item->is_active ? 'Activo' : 'Inactivo' }}
                    @if($item->pdf_file)
                        <br>PDF: <a href="{{ asset($item->pdf_file) }}" target="_blank" style="color:#0ea5a8; text-decoration:underline;">Ver PDF</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="d-flex flex-wrap" style="gap:0.45rem;">
            <a href="{{ route('admin.menu-items.create', ['parent_id' => $item->id]) }}" class="btn btn-sm" style="background:#dbeafe; color:#1d4ed8; font-weight:700; border-radius:8px;">+ Submenu</a>
            <a href="{{ route('admin.menu-items.edit', $item) }}" class="btn btn-sm" style="background:#e2e8f0; color:#0f172a; font-weight:700; border-radius:8px;">Editar</a>
            <a href="{{ route('admin.menu-items.designs.create', $item->id) }}" class="btn btn-sm" style="background:linear-gradient(135deg,#fbbf24,#6366f1); color:#fff; font-weight:700; border-radius:8px; box-shadow:0 4px 12px rgba(99,102,241,0.12);">Agregar Diseño</a>
            @if($item->pdfs && $item->pdfs->count())
                <a href="{{ route('admin.menu-items.designs.edit', [$item->id, $item->pdfs->first()->id]) }}" class="btn btn-sm" style="background:linear-gradient(135deg,#6366f1,#0ea5a8); color:#fff; font-weight:700; border-radius:8px; box-shadow:0 4px 12px rgba(14,165,168,0.12);">Editar Diseño</a>
            @endif
            @if($item->url)
                <a href="{{ $item->url }}" class="btn btn-sm" style="background:#f1f5f9; color:#0ea5a8; font-weight:700; border-radius:8px;" target="_blank">Abrir enlace</a>
            @endif
            <form action="{{ route('admin.menu-items.destroy', $item) }}" method="POST" onsubmit="return confirmDeleteMenuItem(@js($item->title));">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm" style="background:#fee2e2; color:#b91c1c; font-weight:700; border-radius:8px;">Eliminar</button>
            </form>
        </div>
    </div>
    <div class="menu-node-children" style="display: {{ $isExpanded ? 'block' : 'none' }};">
        @if($item->career)
            <div style="margin-left: {{ ($indent + 20) }}px; border:1px solid #e0f2fe; border-radius:10px; margin-bottom:8px; background:#f0f9ff;">
                <div class="d-flex flex-wrap justify-content-between align-items-center" style="padding:0.7rem 1rem; gap:0.7rem;">
                    <div>
                        <div style="font-weight:700; color:#2563eb;">
                            <span style="color:#94a3b8; margin-right:6px;">-></span>
                            {{ $item->career->name }} <span class="badge bg-info text-dark ms-2">Carrera vinculada</span>
                        </div>
                        <div style="font-size:0.86rem; color:#64748b;">
                            URL: {{ url('/carrera/' . $item->career->slug) }}
                        </div>
                    </div>
                    <div class="d-flex flex-wrap" style="gap:0.45rem;">
                        <a href="{{ url('/carrera/' . $item->career->slug) }}" class="btn btn-sm" style="background:#dbeafe; color:#1d4ed8; font-weight:700; border-radius:8px;" target="_blank">Ver carrera</a>
                    </div>
                </div>
            </div>
        @endif

        @if($item->childrenRecursive && $item->childrenRecursive->count())
            @foreach($item->childrenRecursive as $child)
                @include('admin.crud.menu_items.partials.tree_node', ['item' => $child, 'level' => ($level ?? 0) + 1])
            @endforeach
        @endif
    </div>
</div>


