@extends('layouts.admin')

@section('content')
<div class="card" style="border-radius: 18px; box-shadow: 0 2px 16px rgba(0,158,96,0.10); margin-top: 2.5rem;">
    <div class="card-body p-5">
        <div class="mb-4 d-flex flex-column flex-md-row align-items-center justify-content-between" style="gap:1.2rem;">
            <div>
                <h1 class="fw-bold mb-0" style="font-size:2.1rem; color:#1a3c34; letter-spacing:-1px; display:flex;align-items:center;gap:0.5em;">
                    <i class="bi bi-clock-history" style="font-size:1.8rem; color: var(--admin-primary);"></i> Línea de Tiempo
                </h1>
                <p class="text-muted mb-0" style="font-size:1rem;">Administra los hitos históricos de la institución.</p>
            </div>
            <a href="{{ route('admin.timeline.create') }}" class="btn-new">
                <i class="bi bi-plus-lg"></i> Nuevo Evento
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
                        <th>Año</th>
                        <th>Título</th>
                        <th>Visible</th>
                        <th style="width:180px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($events as $e)
                    <tr>
                        <td><span class="badge" style="background: var(--admin-secondary); color:#fff; font-size:0.95rem; padding:0.4em 0.9em; border-radius:6px;">{{ $e->year }}</span></td>
                        <td class="fw-semibold">{{ $e->title }}</td>
                        <td>
                            @if($e->is_public)
                                <span class="badge" style="background: var(--admin-primary); color:#fff; border-radius:6px; padding:0.3em 0.8em;"><i class="bi bi-eye"></i> Sí</span>
                            @else
                                <span class="badge" style="background: #94a3b8; color:#fff; border-radius:6px; padding:0.3em 0.8em;"><i class="bi bi-eye-slash"></i> No</span>
                            @endif
                        </td>
                        <td>
                            <div style="display:flex; gap:0.5em; align-items:center;">
                                <a href="{{ route('admin.timeline.edit', $e) }}" class="btn btn-edit btn-sm">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>
                                <form action="{{ route('admin.timeline.destroy', $e) }}" method="post" style="display:inline" onsubmit="return confirm('¿Eliminar este evento de la línea de tiempo?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-center text-muted py-4">No hay eventos en la línea de tiempo.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
