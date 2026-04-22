@extends('layouts.admin')

@section('content')
<div class="card" style="border-radius: 18px; box-shadow: 0 2px 16px rgba(0,158,96,0.10); margin-top: 2.5rem;">
    <div class="card-body p-5">
        <div class="mb-4 d-flex flex-column flex-md-row align-items-center justify-content-between" style="gap:1.2rem;">
            <div>
                <h1 class="fw-bold mb-0" style="font-size:2.1rem; color:#1a3c34; letter-spacing:-1px; display:flex;align-items:center;gap:0.5em;">
                    <i class="bi bi-person-badge" style="font-size:1.8rem; color: var(--admin-primary);"></i> Gestión de Autoridades
                </h1>
                <p class="text-muted mb-0" style="font-size:1rem;">Rector, Vicerrector, OCS y más.</p>
            </div>
            <a href="{{ route('admin.autoridades.create') }}" class="btn-new">
                <i class="bi bi-plus-lg"></i> Crear Autoridad
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Orden</th>
                        <th>Nombre</th>
                        <th>Cargo</th>
                        <th>Categoría</th>
                        <th style="width: 180px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($autoridades as $autoridad)
                    <tr>
                        <td class="fw-semibold">{{ $autoridad->orden }}</td>
                        <td class="fw-semibold">{{ $autoridad->nombre }}</td>
                        <td>{{ $autoridad->cargo }}</td>
                        <td>
                            <span class="badge" style="background: var(--admin-secondary); color:#fff; border-radius:6px; padding:0.3em 0.8em;">
                                {{ $autoridad->categoria }}
                            </span>
                        </td>
                        <td>
                            <div style="display:flex; gap:0.5em; align-items:center;">
                                <a href="{{ route('admin.autoridades.edit', $autoridad->id) }}" class="btn btn-edit btn-sm" title="Editar">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>
                                <form action="{{ route('admin.autoridades.destroy', $autoridad->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta autoridad?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">No hay autoridades creadas todavía.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
