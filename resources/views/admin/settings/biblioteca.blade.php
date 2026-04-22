@extends('layouts.admin')

@section('content')
<div class="admin-content">
    <div class="dashboard-header">
        <h1>📚 Configurar Enlace de Biblioteca</h1>
        <p>Configura el enlace externo que aparecerá en el menú Servicios del sitio público.</p>
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

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.settings.biblioteca.update') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="biblioteca_url">URL de la Biblioteca</label>
                    <input type="url" 
                           name="biblioteca_url" 
                           id="biblioteca_url" 
                           class="form-control" 
                           value="{{ old('biblioteca_url', $bibliotecaUrl ?? '') }}"
                           placeholder="https://biblioteca.ejemplo.com"
                           required>
                    <small class="form-text text-muted">
                        Ingresa la URL completa del sistema de biblioteca (debe comenzar con http:// o https://)
                    </small>
                </div>

                <div class="alert alert-info mt-3">
                    <strong>ℹ️ Nota:</strong> Este enlace se abrirá en una nueva pestaña cuando los usuarios hagan clic en "Biblioteca" desde el menú Servicios.
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">💾 Guardar Configuración</button>
                    <a href="{{ route('admin.dashboard') }}#seccion-servicios" class="btn btn-secondary">← Volver al Dashboard</a>
                </div>
            </form>
        </div>
    </div>

    @if($bibliotecaUrl)
    <div class="card mt-3">
        <div class="card-body">
            <h4>Vista Previa</h4>
            <p>Enlace actual: <a href="{{ $bibliotecaUrl }}" target="_blank" rel="noopener noreferrer">{{ $bibliotecaUrl }} ↗</a></p>
        </div>
    </div>
    @endif
</div>
@endsection
