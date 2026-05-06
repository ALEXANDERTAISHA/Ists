@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Crear Nueva Sección de "Acerca"</h1>
    <p class="mb-4">Completa el formulario para añadir una nueva sección de contenido a la página "Acerca".</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulario de Creación</h6>
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

            <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                </div>

                <div class="form-group">
                    <label for="body">Contenido</label>
                    {{-- Added tinymce-editor class --}}
                    <textarea name="body" id="body" class="form-control tinymce-editor" rows="10">{{ old('body') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image_url">Imagen (Opcional)</label>
                    <input type="file" name="image_url" id="image_url" class="form-control-file">
                </div>

                <div class="form-group about-pdf-group">
                    <label for="file_url" class="about-pdf-label"><i class="bi bi-file-earmark-pdf-fill me-1"></i> Archivo PDF (Opcional)</label>
                    <span class="about-no-pdf">Sin PDF cargado</span>
                    <input type="file" name="file_url" id="file_url" class="form-control-file" accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                    <small class="form-text text-muted">Sube un PDF institucional en formato claro y legible.</small>
                </div>

                <div class="form-group">
                    <label for="status">Estado</label>
                    <select name="status" id="status" class="form-control">
                        <option value="published" selected>Publicado</option>
                        <option value="draft">Borrador</option>
                    </select>
                </div>

                <div class="admin-action-buttons">
                    <a href="{{ route('about.index') }}" class="btn btn-secondary shadow-sm fw-semibold border-0 d-flex align-items-center justify-content-center">
                        <i class="bi bi-x-circle me-2"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary shadow-sm fw-semibold border-0 d-flex align-items-center justify-content-center">
                        <i class="bi bi-save me-2"></i> Guardar Sección
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
