@extends('layouts.admin')

@section('title', 'Editar Elemento del Menú - ISTS Admin')

@section('content')
<div class="container-fluid px-0">
    <div class="card" style="border:1px solid #dbe7f7; border-radius:16px; box-shadow:0 10px 24px rgba(15,23,42,0.08);">
        <div class="card-body p-4 p-md-5">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4" style="gap:0.7rem;">
                <div>
                    <h3 class="mb-1" style="font-weight:800; color:#0f172a;">Editar Elemento del Menú</h3>
                    <p class="mb-0" style="color:#64748b;">Actualiza la navegación principal y sus submenús.</p>
                </div>
                <a href="{{ route('admin.menu-items.index') }}" class="btn" style="background:#e2e8f0; color:#0f172a; font-weight:700; border-radius:10px;">Volver</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger" style="font-weight:700; color:#b91c1c; background:#fee2e2; border:1.5px solid #ef4444; border-radius:10px; margin-bottom:1.2rem;">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.menu-items.update', $item) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <label for="title" class="form-label" style="font-weight:700;">Título</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $item->title) }}" required>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="system_key" class="form-label" style="font-weight:700;">Clave del sistema (opcional)</label>
                        <input type="text" name="system_key" id="system_key" class="form-control" value="{{ old('system_key', $item->system_key) }}" placeholder="Ej: DOCUMENTOS">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="url" class="form-label" style="font-weight:700;">URL</label>
                        <input type="text" name="url" id="url" class="form-control" value="{{ old('url', $item->url) }}" placeholder="Ej: /acerca">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="parent_id" class="form-label" style="font-weight:700;">Menú padre (opcional)</label>
                        <select name="parent_id" id="parent_id" class="form-select">
                            <option value="">Ninguno (menú principal)</option>
                            @foreach($parents as $parent)
                                <option value="{{ $parent['id'] }}" {{ (string) old('parent_id', $item->parent_id) === (string) $parent['id'] ? 'selected' : '' }}>{{ $parent['label'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="order" class="form-label" style="font-weight:700;">Orden</label>
                        <input type="number" name="order" id="order" class="form-control" value="{{ old('order', $item->order) }}">
                    </div>

                    <div class="col-12 col-md-6 d-flex align-items-end">
                        <div class="form-check form-switch" style="padding-left:2.5rem;">
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ old('is_active', $item->is_active) ? 'checked' : '' }}>
                            <label for="is_active" class="form-check-label" style="font-weight:700;">Activo</label>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="career_id" class="form-label" style="font-weight:700;">Vincular a carrera (opcional)</label>
                        <select name="career_id" id="career_id" class="form-select">
                            <option value="">Ninguna</option>
                            @foreach($careers as $career)
                                <option value="{{ $career->id }}" {{ old('career_id', $item->career_id ?? null) == $career->id ? 'selected' : '' }}>{{ $career->name }}</option>
                            @endforeach
                        </select>
                        <small style="color:#94a3b8;">Puedes vincular este menú a una carrera específica.</small>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="pdf_file" class="form-label" style="font-weight:700;">Archivo del documento (opcional)</label>
                        @if($item->pdf_file)
                            <div class="mb-2">
                                <a href="{{ asset($item->pdf_file) }}" target="_blank" style="color:#0ea5a8; text-decoration:underline;">Ver documento actual</a>
                                <span style="color:#64748b; font-size:0.9em;">(Si subes uno nuevo, reemplazará el actual)</span>
                            </div>
                        @endif
                        <input type="file" name="pdf_file" id="pdf_file" class="form-control" accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                        <small style="color:#94a3b8;">Puedes adjuntar o reemplazar el archivo PDF para este menú.</small>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="category" class="form-label" style="font-weight:700;">Categoría (opcional)</label>
                        <input type="text" name="category" id="category" class="form-control" value="{{ old('category', $item->category) }}" placeholder="Ej: Institucional, Académico, Servicios">
                        <small style="color:#94a3b8;">Puedes agrupar los menús por categoría para una mejor organización.</small>
                    </div>
                </div>

                <div class="admin-action-buttons mt-4">
                    <a href="{{ route('admin.menu-items.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>

            <hr class="my-4">

            <div class="col-12">
                <h5 style="font-weight:800; color:#0f172a;">Información clave: Documentos PDF</h5>
                <form action="{{ route('admin.menu-items.pdfs.store', $item->id) }}" method="POST" enctype="multipart/form-data" class="row g-2 align-items-end mb-3">
                    @csrf
                    <div class="col-md-5">
                        <label for="pdf_title" class="form-label mb-0">Título del PDF</label>
                        <input type="text" name="title" id="pdf_title" class="form-control" required placeholder="Ej: Reglamento, Horario, Oficio, etc.">
                    </div>
                    <div class="col-md-5">
                        <label for="pdf_file_multi" class="form-label mb-0">Archivo del documento</label>
                        <input type="file" name="pdf_file" id="pdf_file_multi" class="form-control" accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" required>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Agregar documento</button>
                    </div>
                </form>

                @if($item->pdfs && $item->pdfs->count())
                    <ul class="list-group">
                        @foreach($item->pdfs as $pdf)
                            <li class="list-group-item">
                                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center" style="gap:0.8rem;">
                                    <div style="min-width:0; flex:1;">
                                        <a href="{{ asset('storage/' . ltrim($pdf->pdf_path, '/')) }}" target="_blank" style="color:#0ea5a8; text-decoration:underline; font-weight:600;">
                                            Ver documento actual
                                        </a>
                                    </div>
                                    <div class="d-flex flex-wrap" style="gap:0.5rem;">
                                        <form action="{{ route('admin.menu-items.pdfs.update', [$item->id, $pdf->id]) }}" method="POST" class="d-flex flex-wrap align-items-center" style="gap:0.5rem;">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="title" class="form-control form-control-sm" value="{{ $pdf->title }}" required style="min-width:260px;">
                                            <button type="submit" class="btn btn-sm btn-primary">Guardar nombre</button>
                                        </form>
                                        <form action="{{ route('admin.menu-items.pdfs.destroy', [$item->id, $pdf->id]) }}" method="POST" onsubmit="return confirm('¿Eliminar este PDF?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="text-muted">No hay documentos PDF cargados para este menú.</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection


