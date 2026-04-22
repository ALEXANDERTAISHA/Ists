@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Editar Sección de "Acerca"</h1>
    <p class="mb-4">Modifica los detalles de la sección de contenido de la página "Acerca".</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulario de Edición</h6>
        </div>
        <div class="card-body">
            {{-- Display Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('about.update', $about['id']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $about['title']) }}" required>
                </div>

                <div class="form-group">
                    <label for="body">Contenido</label>
                    {{-- Added tinymce-editor class --}}
                    <textarea name="body" id="body" class="form-control tinymce-editor" rows="10">{{ old('body', $about['content']) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image_url">Imagen (Opcional)</label>
                    @if(!empty($about['image_url']))
                        <div class="mb-2">
                            <p>Imagen actual:</p>
                            <img src="{{ asset('storage/' . $about['image_url']) }}" alt="Imagen actual" style="max-width: 200px; height: auto;">
                        </div>
                    @endif
                    <input type="file" name="image_url" id="image_url" class="form-control-file">
                    <small class="form-text text-muted">Sube una nueva imagen para reemplazar la actual.</small>
                </div>

                <div class="form-group about-pdf-group">
                    <label for="file_url" class="about-pdf-label"><i class="bi bi-file-earmark-pdf-fill me-1"></i> Archivo PDF (Opcional)</label>
                    @if(!empty($about['file_url']))
                        <div class="mb-2">
                            <a href="{{ asset('storage/' . $about['file_url']) }}" target="_blank" class="about-pdf-link">
                                <span class="about-pdf-link__icon"><i class="bi bi-file-earmark-pdf-fill"></i></span>
                                Ver PDF actual
                            </a>
                        </div>
                    @else
                        <span class="about-no-pdf">Sin PDF cargado</span>
                    @endif
                    <input type="file" name="file_url" id="file_url" class="form-control-file" accept="application/pdf">
                    <small class="form-text text-muted">Sube un nuevo PDF para reemplazar el actual.</small>
                </div>

                <div class="form-group">
                    <label for="status">Estado</label>
                    <select name="status" id="status" class="form-control">
                        <option value="published" {{ old('status', $about['status']) == 'published' ? 'selected' : '' }}>Publicado</option>
                        <option value="draft" {{ old('status', $about['status']) == 'draft' ? 'selected' : '' }}>Borrador</option>
                    </select>
                </div>

                <div class="admin-action-buttons">
                    <a href="{{ route('about.index') }}" class="btn btn-secondary shadow-sm fw-semibold border-0 d-flex align-items-center justify-content-center">
                        <i class="bi bi-x-circle me-2"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary shadow-sm fw-semibold border-0 d-flex align-items-center justify-content-center">
                        <i class="bi bi-save me-2"></i> Actualizar Sección
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
