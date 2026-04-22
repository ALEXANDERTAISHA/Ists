@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4" style="gap: 1rem;">
    <div>
        <h1 class="fw-bold mb-1" style="font-size:2rem;display:flex;align-items:center;gap:0.5rem;">
            <i class="bi bi-megaphone" style="font-size:1.8rem; color: var(--admin-primary);"></i> Actualizaciones y Novedades
        </h1>
        <p class="text-muted mb-0">Gestiona las últimas noticias y actualizaciones que se mostrarán en la página principal</p>
    </div>
    <a href="{{ route('admin.updates.create') }}" class="btn-new"><i class="bi bi-plus-lg"></i> Nueva Actualización</a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
            <polyline points="22 4 12 14.01 9 11.01"></polyline>
        </svg>
        {{ session('success') }}
    </div>
@endif

<div class="card shadow-sm" style="border-radius: 18px; border: none;">
    <div class="card-body" style="border-radius: 18px;">
        @if($updates->isEmpty())
            <div class="empty-state">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>
                <h3>No hay actualizaciones</h3>
                <p>Comienza creando la primera actualización para mostrar en la página principal</p>
                <a href="{{ route('admin.updates.create') }}" class="btn btn-primary">Crear Primera Actualización</a>
            </div>
        @else

            <div class="table-responsive">
                <table class="table align-middle" style="border-radius: 12px; overflow: hidden;">
                    <thead style="background: linear-gradient(90deg,#009e60,#0e3e49 90%); color: #fff;">
                        <tr style="border: none;">
                            <th style="width: 100px; border: none;">Imagen</th>
                            <th style="border: none;">Título</th>
                            <th style="width: 120px; border: none;">Fecha</th>
                            <th style="width: 80px; border: none;">Orden</th>
                            <th style="width: 100px; border: none;">Estado</th>
                            <th style="width: 150px; border: none;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($updates as $update)
                            <tr style="background: #fff; border-bottom: 1.5px solid #f2f2f2; box-shadow: 0 1px 4px rgba(0,158,96,0.04);">
                                <td>
                                    @if($update->image_path)
                                        <img src="{{ asset('storage/' . $update->image_path) }}" 
                                             alt="{{ $update->title }}" 
                                             class="img-thumbnail shadow-sm"
                                             style="width: 80px; height: 60px; object-fit: cover; border-radius: 8px; border: 2px solid #e8f5f1;">
                                    @elseif($update->video_path)
                                        <div class="d-flex align-items-center justify-content-center bg-success text-white position-relative" 
                                             style="width: 80px; height: 60px; border-radius: 8px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                                                <polygon points="5 3 19 12 5 21 5 3"></polygon>
                                            </svg>
                                            <small style="position: absolute; bottom: 2px; font-size: 9px;">Local</small>
                                        </div>
                                    @elseif($update->video_url)
                                        <div class="d-flex align-items-center justify-content-center bg-primary text-white position-relative" 
                                             style="width: 80px; height: 60px; border-radius: 8px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                                                <polygon points="5 3 19 12 5 21 5 3"></polygon>
                                            </svg>
                                            <small style="position: absolute; bottom: 2px; font-size: 9px;">URL</small>
                                        </div>
                                    @else
                                        <div class="d-flex align-items-center justify-content-center bg-secondary text-white" 
                                             style="width: 80px; height: 60px; border-radius: 8px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <span class="fw-bold" style="font-size:1.08rem;">{{ $update->title }}</span>
                                    <br><small class="text-muted">{{ Str::limit($update->description, 80) }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border" style="font-size:0.98rem; border-radius: 6px; padding: 0.4em 0.8em;">{{ $update->date->format('d/m/Y') }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary" style="font-size:0.98rem; border-radius: 6px; padding: 0.4em 0.8em;">{{ $update->sort_order }}</span>
                                </td>
                                <td>
                                    @if($update->is_active)
                                        <span class="badge" style="background: linear-gradient(90deg,#009e60,#0e3e49 90%); color: #fff; font-weight:600; border-radius: 6px; padding: 0.4em 0.8em;">Activa</span>
                                    @else
                                        <span class="badge bg-secondary" style="font-weight:600; border-radius: 6px; padding: 0.4em 0.8em;">Inactiva</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex flex-row align-items-center gap-2">
                                        <a href="{{ route('admin.updates.edit', $update->id) }}" class="btn btn-edit btn-sm" title="Editar"><i class="bi bi-pencil-square"></i> Editar</a>
                                        <form action="{{ route('admin.updates.destroy', $update->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de eliminar esta actualización?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i class="bi bi-trash"></i> Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pagination-wrapper">
                {{ $updates->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
