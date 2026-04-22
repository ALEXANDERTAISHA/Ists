                        {{-- Eliminado bloque duplicado de Imagen de Portada --}}
@extends('layouts.admin')

@section('title', 'Crear Carrera')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Crear Nueva Carrera / Coordinación</h1>
        <a href="{{ route('admin.careers.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Volver
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.careers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-8">

                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre de la Carrera *</label>
                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   id="name"
                                   name="name"
                                   value="{{ old('name') }}"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="academic_section_id" class="form-label">Sección Académica</label>
                            <select class="form-select @error('academic_section_id') is-invalid @enderror"
                                    id="academic_section_id"
                                    name="academic_section_id">
                                <option value="">-- Seleccione una sección --</option>
                                @foreach($academicSections as $section)
                                    <option value="{{ $section->id }}" {{ old('academic_section_id') == $section->id ? 'selected' : '' }}>
                                        {{ $section->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('academic_section_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug (URL amigable)</label>
                            <input type="text"
                                   class="form-control @error('slug') is-invalid @enderror"
                                   id="slug"
                                   name="slug"
                                   value="{{ old('slug') }}"
                                   placeholder="Se genera automáticamente si se deja vacío">
                            <small class="text-muted">Ejemplo: desarrollo-software, contabilidad</small>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción Corta</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      id="description"
                                      name="description"
                                      rows="3">{{ old('description') }}</textarea>
                            <small class="text-muted">Breve resumen que aparecerá en listados</small>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="full_description" class="form-label">Descripción Completa</label>
                            <textarea class="form-control @error('full_description') is-invalid @enderror"
                                      id="full_description"
                                      name="full_description"
                                      rows="6">{{ old('full_description') }}</textarea>
                            <small class="text-muted">Descripción detallada que aparecerá en la página de la carrera</small>
                            @error('full_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="professional_profile" class="form-label">Perfil Profesional</label>
                            <textarea class="form-control @error('professional_profile') is-invalid @enderror"
                                      id="professional_profile"
                                      name="professional_profile"
                                      rows="6">{{ old('professional_profile') }}</textarea>
                            <small class="text-muted">Competencias y habilidades del egresado</small>
                            @error('professional_profile')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="image" class="form-label">Imagen Principal (Sección 1)</label>
                            <div id="imagePreviewWrap1" class="mb-2 career-preview-frame d-none">
                                <img id="imagePreview1" src="" alt="Preview imagen principal" class="career-preview-img">
                            </div>
                            <div id="imageEmpty1" class="mb-2 career-preview-empty">Sin imagen principal</div>
                            <input type="file"
                                   class="form-control @error('image') is-invalid @enderror"
                                   id="image"
                                   name="image"
                                   accept="image/*">
                            <small class="text-muted">JPG, PNG o WEBP. Máximo 2MB</small>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image_2" class="form-label">Imagen Secundaria (Sección 2)</label>
                            <div id="imagePreviewWrap2" class="mb-2 career-preview-frame d-none">
                                <img id="imagePreview2" src="" alt="Preview imagen secundaria" class="career-preview-img">
                            </div>
                            <div id="imageEmpty2" class="mb-2 career-preview-empty">Sin imagen secundaria</div>
                            <input type="file"
                                   class="form-control @error('image_2') is-invalid @enderror"
                                   id="image_2"
                                   name="image_2"
                                   accept="image/*">
                            <small class="text-muted">JPG, PNG o WEBP. Máximo 2MB</small>
                            @error('image_2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="curriculum_pdf" class="form-label">Malla Curricular (PDF)</label>
                            <input type="file"
                                   class="form-control @error('curriculum_pdf') is-invalid @enderror"
                                   id="curriculum_pdf"
                                   name="curriculum_pdf"
                                   accept="application/pdf">
                            <small class="text-muted">PDF. Máximo 5MB</small>
                            <div class="mt-2">
                                <span class="text-info small">La opción para ver o descargar el PDF estará disponible después de crear la carrera.</span>
                            </div>
                            @error('curriculum_pdf')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="coordinator" class="form-label">Coordinador de Carrera</label>
                            <input type="text"
                                   class="form-control @error('coordinator') is-invalid @enderror"
                                   id="coordinator"
                                   name="coordinator"
                                   value="{{ old('coordinator') }}">
                            @error('coordinator')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="coordinator_email" class="form-label">Email del Coordinador</label>
                            <input type="email"
                                   class="form-control @error('coordinator_email') is-invalid @enderror"
                                   id="coordinator_email"
                                   name="coordinator_email"
                                   value="{{ old('coordinator_email') }}">
                            @error('coordinator_email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sort_order" class="form-label">Orden de visualización</label>
                            <input type="number"
                                   class="form-control @error('sort_order') is-invalid @enderror"
                                   id="sort_order"
                                   name="sort_order"
                                   value="{{ old('sort_order', 0) }}"
                                   min="0">
                            <small class="text-muted">Menor número aparece primero</small>
                            @error('sort_order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input"
                                       type="checkbox"
                                       id="is_active"
                                       name="is_active"
                                       {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Carrera Activa
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="admin-action-buttons mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-1"></i> Crear Carrera
                    </button>
                    <a href="{{ route('admin.careers.index') }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle me-1"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.tiny.cloud/1/tr5q9gaoe9ca3hwsq6nah42q8dqhrtqznrl0gd9523anjatx/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const bindImagePreview = (inputId, wrapId, imageId, emptyId) => {
            const input = document.getElementById(inputId);
            const wrap = document.getElementById(wrapId);
            const image = document.getElementById(imageId);
            const empty = document.getElementById(emptyId);

            if (!input || !wrap || !image || !empty) return;

            input.addEventListener('change', function() {
                if (!this.files || !this.files[0]) return;

                if (this.files[0].size > 2097152) {
                    alert('La imagen es muy grande. El tamaño máximo es 2MB.');
                    this.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    image.src = e.target.result;
                    wrap.classList.remove('d-none');
                    empty.classList.add('d-none');
                };
                reader.readAsDataURL(this.files[0]);
            });
        };

        bindImagePreview('image', 'imagePreviewWrap1', 'imagePreview1', 'imageEmpty1');
        bindImagePreview('image_2', 'imagePreviewWrap2', 'imagePreview2', 'imageEmpty2');

        tinymce.init({
            selector: '#description, #full_description, #professional_profile',
            plugins: 'lists link image table code fullscreen advlist',
            toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image table | code fullscreen',
            menubar: false,
            branding: false,
            height: 250,
            language: 'es',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
            setup: function (editor) {
                editor.on('init', function () {
                    editor.formatter.register('alignjustify', {
                        inline: 'span',
                        styles: { 'text-align': 'justify' },
                        selector: 'p,h1,h2,h3,h4,h5,h6,div',
                        classes: 'justificado'
                    });
                });
            },
            toolbar_mode: 'sliding',
            advlist_bullet_styles: 'default',
            advlist_number_styles: 'default',
        });
    });
</script>
<style>
    .career-preview-frame {
        width: 100%;
        max-width: 240px;
        height: 140px;
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid #d9e2ec;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        background: #f8fafc;
    }

    .career-preview-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        display: block;
    }

    .career-preview-empty {
        width: 100%;
        max-width: 240px;
        height: 140px;
        border: 1px dashed #c3ceda;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #64748b;
        font-size: 0.9rem;
        background: #f8fafc;
    }
</style>
@endpush
