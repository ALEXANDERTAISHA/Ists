@extends('layouts.admin')

@section('content')
<div class="card admin-page-card admin-page-card--contents" style="border-radius: 18px; box-shadow: 0 2px 16px rgba(0,158,96,0.10); margin-top: 2.5rem;">
    <div class="card-body p-5">
        <div class="text-center mb-4 admin-page-header">
            <h1 class="fw-bold mb-1" style="font-size:2.3rem; color:#00796b; letter-spacing:-1px;">
                <i class="bi bi-file-earmark-text" style="font-size:1.8rem; color: var(--admin-primary);"></i> Gestión de Documentos
            </h1>
            <p class="text-muted mb-3">Administra los contenidos del sitio.</p>
            <a href="{{ route('admin.contents.create', ['category' => $category]) }}" class="btn-new"><i class="bi bi-plus-lg"></i> Crear Sección</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-table admin-table-shell" style="background: #fff; border-radius: 18px; box-shadow: 0 4px 24px 0 rgba(37,99,235,0.10); padding: 2.2rem 2.2rem 1.5rem 2.2rem; max-width: 1100px; margin: 2.5rem auto 0 auto;">
            <div class="table-responsive">
            <table style="width: 100%; border-collapse: separate; border-spacing: 0;">
                <thead style="background: #f3f6fd; color: #2563eb; font-weight: 700; font-size: 1.08rem;">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Documentos</th>
                        <th>Sitios Externos</th>
                        <th>Estado</th>
                        <th>Creado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($is_hierarchical) && $is_hierarchical)
                        @foreach (($flatItems ?? []) as $node)
                            <tr>
                                <td>{{ $node["id"] }}</td>
                                <td>
                                    <span style="display:inline-block; margin-left: {{ ($node['depth'] ?? 0) * 22 }}px;">
                                        @if(($node['depth'] ?? 0) > 0)
                                            <span style="color:#94a3b8; margin-right: 6px;">└─</span>
                                        @endif
                                        <strong>{{ $node["title"] }}</strong>
                                        @if(($node['depth'] ?? 0) > 0)
                                            <small class="text-muted">(Subtítulo nivel {{ ($node['depth'] ?? 0) + 1 }})</small>
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    @if(!empty($node['file_url']))
                                        @php $files = json_decode($node['file_url'], true); @endphp
                                        @if(is_array($files))
                                            @foreach($files as $file)
                                                <a href="{{ asset($file) }}" target="_blank">Ver Archivo</a><br>
                                            @endforeach
                                        @elseif(filter_var($node['file_url'], FILTER_VALIDATE_URL))
                                            <a href="{{ $node['file_url'] }}" target="_blank">Ver Archivo Externo</a>
                                        @else
                                            <a href="{{ asset('storage/' . ltrim($node['file_url'], '/')) }}" target="_blank">Ver Archivo</a>
                                        @endif
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($node['is_external']) && !empty($node['url']))
                                        <a href="{{ $node['url'] }}" target="_blank">{{ $node['url'] }}</a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td><span class="badge" style="background:{{ $node['status']==='published' ? '#009e60' : '#f9d423' }};color:#fff; font-weight:600; border-radius:6px; padding:0.4em 1em; font-size:0.98em;">{{ $node["status"] }}</span></td>
                                <td>{{ \Carbon\Carbon::parse($node["created_at"])->format('d/m/Y') }}</td>
                                <td class="actions admin-actions-cell" style="display:flex; gap:0.5em;">
                                    <a href="{{ route('admin.contents.edit', $node['id']) }}" class="btn btn-edit btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>
                                    <form action="{{ route('admin.contents.destroy', $node['id']) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Eliminar</button>
                                    </form>
                                    @if($node['category'] !== 'documentos')
                                        <a href="{{ route('admin.contents.create', ['parent_id' => $node['id']]) }}" class="btn btn-secondary btn-sm"><i class="bi bi-plus"></i> Agregar Subtítulo</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item["id"] }}</td>
                                <td>{{ $item["title"] }}</td>
                                <td>-</td>
                                <td>-</td>
                                <td><span class="badge" style="background:{{ $item['status']==='published' ? '#009e60' : '#f9d423' }};color:#fff; font-weight:600; border-radius:6px; padding:0.4em 1em; font-size:0.98em;">{{ $item["status"] }}</span></td>
                                <td>{{ \Carbon\Carbon::parse($item["created_at"])->format('d/m/Y') }}</td>
                                <td class="actions admin-actions-cell" style="display:flex; gap:0.5em;">
                                    <a href="{{ route('admin.contents.edit', $item['id']) }}" class="btn btn-edit btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>
                                    <form action="{{ route('admin.contents.destroy', $item['id']) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            </div>
        </div>
        <style>
            .btn-edit-uniform {
                min-width: 120px !important;
                min-height: 44px !important;
                height: 44px !important;
                text-align: center;
                display: flex;
                align-items: center;
                justify-content: center;
                padding-top: 0 !important;
                padding-bottom: 0 !important;
            }
        </style>
        <div class="d-flex justify-content-center mt-4">
            {{ $items->links() }}
        </div>
    </div>
</div>
@endsection
