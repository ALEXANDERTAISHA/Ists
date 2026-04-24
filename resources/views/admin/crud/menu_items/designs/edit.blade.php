@extends('layouts.admin')
@section('title', 'Editar Diseño del Menú')
@section('content')
<div class="container py-4">
    <div class="card premium-shadow" style="border-radius:18px;">
        <div class="card-body p-5">
            <h2 class="mb-4" style="font-weight:800; color:#0f172a;">Editar Diseño de: <span style="color:#0ea5a8">{{ $menuItem->title }}</span></h2>
            <form action="{{ route('admin.menu-items.designs.update', [$menuItem->id, $pdf->id]) }}" method="POST" enctype="multipart/form-data" id="designEditForm">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Título del diseño</label>
                    <input type="text" name="title" id="title" class="form-control form-control-lg" value="{{ $pdf->title }}" required>
                </div>
                <div class="mb-3">
                    <label for="main_description" class="form-label fw-bold">Resumen</label>
                    <textarea name="main_description" id="main_description" class="form-control form-control-lg">{{ $pdf->main_description }}</textarea>
                    <div class="form-text">Breve resumen que aparecerá en listados</div>
                </div>
                <div class="mb-3">
                    <label for="main_description_2" class="form-label fw-bold">Resumen 2</label>
                    <textarea name="main_description_2" id="main_description_2" class="form-control form-control-lg">{{ $pdf->main_description_2 }}</textarea>
                    <div class="form-text">Segundo bloque de contenido para mostrar en la vista pública</div>
                </div>
                <div class="mb-3">
                    <label for="main_image" class="form-label fw-bold">Imagen Principal</label>
                    <input type="file" name="main_image" id="main_image" class="form-control form-control-lg" accept="image/*">
                    @if($pdf->main_image_path)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . ltrim($pdf->main_image_path, '/')) }}" alt="Imagen principal actual" style="max-width:180px; border-radius:12px;">
                        </div>
                    @endif
                    <div class="form-text">Opcional. Imagen destacada para la vista principal</div>
                </div>
                <div class="mb-3">
                    <label for="pdf_file" class="form-label fw-bold">Reemplazar PDF (opcional)</label>
                    <input type="file" name="pdf_file" id="pdf_file" class="form-control form-control-lg" accept="application/pdf">
                    @if($pdf->pdf_path)
                        <div class="mt-2">
                            <a href="{{ asset('storage/' . ltrim($pdf->pdf_path, '/')) }}" target="_blank">Ver PDF actual</a>
                        </div>
                    @endif
                </div>
                <div class="mb-3 form-check form-switch">
                    <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ $pdf->is_active ? 'checked' : '' }}>
                    <label for="is_active" class="form-check-label">Activo</label>
                </div>
                <div class="d-flex gap-3 mt-4">
                    <button type="submit" class="btn btn-lg" style="background:linear-gradient(135deg,#0ea5a8,#2563eb); color:#fff; font-weight:700; border-radius:12px; box-shadow:0 8px 20px rgba(37,99,235,0.18);">Guardar Cambios</button>
                    <a href="{{ route('admin.menu-items.index') }}" class="btn btn-lg btn-secondary" style="border-radius:12px;">Cancelar</a>
                </div>
            </form>
            @include('admin.crud.menu_items.designs.partials.tinymce')
        </div>
    </div>
</div>
@endsection
