@extends('layouts.admin')

@section('title', 'Administración de Menú - ISTS Admin')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4" style="gap: 0.8rem;">
        <div>
            <h2 class="mb-1" style="font-weight:800; color:#0f172a; letter-spacing:-0.4px;">Administración de Menú</h2>
            <p class="mb-0" style="color:#64748b;">Gestiona logo, menús principales y submenús del header público.</p>
        </div>
        <a href="{{ route('admin.menu-items.create') }}" class="btn" style="background:linear-gradient(135deg,#0ea5a4,#2563eb); color:#fff; font-weight:700; border-radius:12px; padding:0.65rem 1rem; box-shadow:0 8px 20px rgba(37,99,235,0.18);">
            <i class="bi bi-plus-circle me-1"></i> Nuevo menú principal
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success" style="font-weight:700; color:#166534; background:#bbf7d0; border:1.5px solid #22c55e; border-radius:10px; margin-bottom:1.2rem;">
            {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">
        <div class="col-12 col-xl-4" id="header-manager">
            <div class="card h-100" style="border:1px solid #dbe7f7; border-radius:16px; box-shadow:0 10px 24px rgba(15,23,42,0.08);">
                <div class="card-body p-4">
                    <h5 class="mb-2" style="font-weight:800; color:#0f172a;"><i class="bi bi-image me-2"></i>Logo del Header</h5>
                    <p style="color:#64748b; font-size:0.95rem;">Cambia el logo que se muestra en la barra superior del sitio público.</p>

                    @php
                        $logoUrl = !empty($headerLogoPath) ? asset(ltrim($headerLogoPath, '/')) : asset('assets/images/logoists.png');
                    @endphp

                    <div class="mb-3 text-center" style="background:#f8fafc; border:1px dashed #cbd5e1; border-radius:12px; padding:1rem;">
                        <img src="{{ $logoUrl }}" alt="Logo actual del header" style="max-height:78px; width:auto; max-width:100%; object-fit:contain;">
                    </div>

                    <form action="{{ route('admin.settings.header-brand') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="header_logo" class="form-label" style="font-weight:700; color:#334155;">Subir nuevo logo</label>
                        <input type="file" name="header_logo" id="header_logo" class="form-control" accept=".png,.jpg,.jpeg,.svg,.webp" required>
                        <small style="display:block; color:#94a3b8; margin-top:0.45rem;">Formatos: PNG, JPG, JPEG, SVG, WEBP</small>
                        <button type="submit" class="btn mt-3 w-100" style="background:#0f766e; color:#fff; font-weight:700; border-radius:10px;">
                            <i class="bi bi-cloud-upload me-1"></i> Actualizar logo
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-8">
            <div class="card" style="border:1px solid #dbe7f7; border-radius:16px; box-shadow:0 10px 24px rgba(15,23,42,0.08); overflow:hidden;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3" style="gap:0.8rem;">
                        <h5 class="mb-0" style="font-weight:800; color:#0f172a;"><i class="bi bi-list-ul me-2"></i>Menús y submenús</h5>
                        <span class="badge" style="background:#e2e8f0; color:#334155; font-weight:700;">{{ $items->count() }} principales</span>
                    </div>

                    @forelse($items as $item)
                        @include('admin.crud.menu_items.partials.tree_node', ['item' => $item, 'level' => 0])
                    @empty
                        <div class="text-center py-5" style="color:#64748b;">
                            <i class="bi bi-menu-button-wide" style="font-size:2rem;"></i>
                            <p class="mt-2 mb-0">No hay elementos de menú registrados todavía.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function toggleMenuNode(nodeId) {
    const node = document.getElementById(nodeId);
    if (!node) return;
    const children = node.querySelector('.menu-node-children');
    const icon = document.getElementById('icon-' + nodeId);
    if (children) {
        if (children.style.display === 'none') {
            children.style.display = '';
            if (icon) icon.textContent = '-';
        } else {
            children.style.display = 'none';
            if (icon) icon.textContent = '+';
        }
    }
}
</script>
@endpush
