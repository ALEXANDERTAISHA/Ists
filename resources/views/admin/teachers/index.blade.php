@extends('layouts.admin')

@section('content')
<div class="teachers-panel">
    <div class="teachers-panel__head">
        <div>
            <h1 class="teachers-title"><i class="bi bi-person-workspace"></i> Gestión de Planta Docente</h1>
            <p class="teachers-subtitle">Administra perfiles, documentos y orden de visualización de docentes.</p>
        </div>
        <a href="{{ route('admin.teachers.create') }}" class="teachers-btn-create">
            <i class="bi bi-plus-lg"></i>
            Añadir Docente
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="teachers-table-wrap table-responsive">
        <table class="table teachers-table align-middle mb-0">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Título</th>
                    <th>Departamento</th>
                    <th>PDF</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td><span class="teachers-order">{{ $item->order }}</span></td>
                        <td>
                            @if($item->image_path)
                                <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->name }}" class="teachers-avatar">
                            @else
                                <div class="teachers-avatar teachers-avatar--fallback">
                                    <i class="bi bi-person"></i>
                                </div>
                            @endif
                        </td>
                        <td class="teachers-name">{{ $item->name }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->department }}</td>
                        <td>
                            @if($item->pdf_path)
                                <a href="{{ asset('storage/' . $item->pdf_path) }}" target="_blank" class="teachers-pdf-link" title="Abrir PDF">
                                    <span class="teachers-pdf-link__icon"><i class="bi bi-file-earmark-pdf-fill"></i></span>
                                    <span>Ver PDF</span>
                                </a>
                            @else
                                <span class="teachers-no-pdf">Sin PDF</span>
                            @endif
                        </td>
                        <td>
                            <div class="teachers-actions">
                                <a href="{{ route('admin.teachers.edit', $item) }}" class="teachers-btn teachers-btn--edit" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                    Editar
                                </a>
                                <form action="{{ route('admin.teachers.destroy', $item) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="teachers-btn teachers-btn--delete" title="Eliminar" onclick="return confirm('¿Estás seguro de que quieres eliminar a este docente?');">
                                        <i class="bi bi-trash"></i>
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $items->links() }}
    </div>
</div>

@endsection
