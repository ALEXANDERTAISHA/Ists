@extends('layouts.admin')

@section('content')
<div class="admin-content">
    <div class="dashboard-header">
        <h1>🎓 Configurar Seguimiento a Graduados</h1>
        <p>Configura el enlace externo del sistema de seguimiento a graduados que aparecerá en el menú Servicios.</p>
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
            <form action="{{ route('admin.settings.graduados.update') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="seguimiento_graduados_url">URL del Sistema de Seguimiento a Graduados</label>
                    <input type="url" 
                           name="seguimiento_graduados_url" 
                           id="seguimiento_graduados_url" 
                           class="form-control" 
                           value="{{ old('seguimiento_graduados_url', $graduadosUrl ?? '') }}"
                           placeholder="https://graduados.ejemplo.com"
                           required>
                    <small class="form-text text-muted">
                        Ingresa la URL completa del sistema de seguimiento a graduados (debe comenzar con http:// o https://)
                    </small>
                </div>

                <div class="alert alert-info mt-3">
                    <strong>ℹ️ Nota:</strong> Este enlace se abrirá en una nueva pestaña cuando los usuarios hagan clic en "Seguimiento a Graduados" desde el menú Servicios.
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">💾 Guardar Configuración</button>
                    <a href="{{ route('admin.dashboard') }}#seccion-servicios" class="btn btn-secondary">← Volver al Dashboard</a>
                </div>
            </form>
        </div>
    </div>

    @if($graduadosUrl)
    <div class="card mt-3">
        <div class="card-body">
            <h4>Vista Previa</h4>
            <p>Enlace actual: <a href="{{ $graduadosUrl }}" target="_blank" rel="noopener noreferrer">{{ $graduadosUrl }} ↗</a></p>
        </div>
    </div>
    @endif
</div>
@endsection
