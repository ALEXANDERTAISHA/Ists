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
                        <input type="hidden" name="remove_main_image" id="remove_main_image" value="0">
                        <div class="mt-2" id="main-image-current" style="position:relative; display:inline-flex; align-items:flex-start;">
                            <img src="{{ asset('storage/' . ltrim($pdf->main_image_path, '/')) }}" alt="Imagen principal actual" style="max-width:180px; border-radius:12px; border:1px solid #dbe7f7;">
                            <button type="button" id="remove-main-image-btn" aria-label="Quitar imagen principal" style="position:absolute; top:-10px; right:-10px; width:30px; height:30px; border:none; border-radius:999px; background:#ef4444; color:#fff; font-size:1.05rem; font-weight:800; line-height:1; box-shadow:0 8px 18px rgba(239,68,68,0.28); cursor:pointer;">×</button>
                        </div>
                        <div id="main-image-removed-note" class="form-text text-danger mt-2" style="display:none;">La imagen principal se quitará al guardar los cambios.</div>
                    @endif
                    <div class="form-text">Opcional. Imagen destacada para la vista principal</div>
                </div>
                <div class="mb-3">
                    <label for="pdf_file" class="form-label fw-bold">Reemplazar PDF (opcional)</label>
                    <input type="file" name="pdf_file" id="pdf_file" class="form-control form-control-lg" accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
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
@if($pdf->main_image_path)
<script>
document.addEventListener('DOMContentLoaded', function () {
    const removeButton = document.getElementById('remove-main-image-btn');
    const removeInput = document.getElementById('remove_main_image');
    const currentImage = document.getElementById('main-image-current');
    const removedNote = document.getElementById('main-image-removed-note');
    const fileInput = document.getElementById('main_image');

    if (!removeButton || !removeInput || !currentImage || !removedNote) {
        return;
    }

    removeButton.addEventListener('click', function () {
        removeInput.value = '1';
        currentImage.style.display = 'none';
        removedNote.style.display = 'block';
    });

    if (fileInput) {
        fileInput.addEventListener('change', function () {
            if (fileInput.files.length > 0) {
                removeInput.value = '0';
                removedNote.style.display = 'none';
            }
        });
    }
});
</script>
@endif
@endsection
