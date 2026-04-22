@extends('layouts.admin')

@section('content')
<div class="teachers-form-panel">
    <div class="teachers-form-head">
        <div>
            <h1 class="teachers-form-title"><i class="bi bi-person-plus-fill"></i> Añadir Docente</h1>
            <p class="teachers-form-subtitle">Completa el formulario para registrar un nuevo docente en la planta institucional.</p>
        </div>
        <a href="{{ route('admin.teachers.index') }}" class="teachers-form-back">
            <i class="bi bi-arrow-left"></i>
            Volver
        </a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="teachers-form-card" method="POST" action="{{ route('admin.teachers.store') }}" enctype="multipart/form-data" onsubmit="if(typeof tinymce !== 'undefined') tinymce.triggerSave();">
        @csrf

        <div class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label teachers-label">Nombre *</label>
                <input type="text" name="name" id="name" class="form-control teachers-input" value="{{ old('name') }}" required>
            </div>
            <div class="col-md-6">
                <label for="title" class="form-label teachers-label">Título</label>
                <input type="text" name="title" id="title" class="form-control teachers-input" value="{{ old('title') }}">
            </div>
            <div class="col-md-6">
                <label for="department" class="form-label teachers-label">Departamento</label>
                <input type="text" name="department" id="department" class="form-control teachers-input" value="{{ old('department') }}">
            </div>
            <div class="col-md-6">
                <label for="order" class="form-label teachers-label">Orden</label>
                <input type="number" name="order" id="order" value="{{ old('order', 0) }}" class="form-control teachers-input">
            </div>
            <div class="col-12">
                <label for="bio" class="form-label teachers-label">Biografía</label>
                <textarea name="bio" id="bio" class="form-control tinymce-editor teachers-input">{{ old('bio') }}</textarea>
            </div>

            <div class="col-md-6">
                <div class="teachers-file-card">
                    <label for="image" class="form-label teachers-label mb-2"><i class="bi bi-image"></i> Imagen</label>
                    <input type="file" name="image" id="image" accept="image/*" class="form-control teachers-input">
                </div>
            </div>

            <div class="col-md-6">
                <div class="teachers-file-card teachers-file-card--pdf">
                    <label for="pdf" class="form-label teachers-label mb-2"><i class="bi bi-file-earmark-pdf-fill"></i> PDF (Currículum)</label>
                    <input type="file" name="pdf" id="pdf" accept="application/pdf" class="form-control teachers-input">
                    <small class="teachers-pdf-hint">Formato recomendado: PDF, contenido legible y actualizado.</small>
                </div>
            </div>
        </div>

        <div class="teachers-form-actions">
            <a href="{{ route('admin.teachers.index') }}" class="teachers-btn-secondary">Cancelar</a>
            <button type="submit" class="teachers-btn-primary"><i class="bi bi-save2"></i> Guardar Docente</button>
        </div>
    </form>
</div>

@endsection
