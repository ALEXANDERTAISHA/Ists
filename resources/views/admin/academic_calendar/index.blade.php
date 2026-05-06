
@extends('layouts.admin')
@section('title', 'Calendario Académico')
@section('content')
<div class="card" style="border-radius: 18px; box-shadow: 0 2px 16px rgba(0,158,96,0.10); margin-top: 2.5rem;">
    <div class="card-body p-5">
        <div class="mb-4 d-flex flex-column flex-md-row align-items-center justify-content-between" style="gap:1.2rem;">
            <h1 class="fw-bold mb-0" style="font-size:2.1rem; color:#1a3c34; letter-spacing:-1px; display:flex;align-items:center;gap:0.5em;">
                <i class="bi bi-calendar3" style="font-size:1.8rem; color: var(--admin-primary);"></i> Gestión de Calendario Académico
            </h1>
            <a href="{{ route('admin.academic-calendar.create') }}" class="btn-new"><i class="bi bi-plus-lg"></i> Crear Calendario</a>
        </div>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table align-middle" style="border-radius: 12px; overflow: hidden;">
                <thead style="background: linear-gradient(90deg,#009e60,#0e3e49 90%); color: #fff;">
                    <tr>
                        <th>Título</th>
                        <th>Desde</th>
                        <th>Hasta</th>
                        <th>Color</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($events as $event)
                        <tr style="background: #fff;">
                            <td style="font-weight:600;">{{ $event->title }}</td>
                            <td>{{ $event->start_date->format('d/m/Y') }}</td>
                            <td>{{ $event->end_date->format('d/m/Y') }}</td>
                            <td>
                                <span style="background:{{ $event->color }};color:#fff; font-weight:600; border-radius:6px; padding:0.4em 1em; font-size:0.98em; box-shadow:0 2px 8px rgba(0,158,96,0.10);">
                                    {{ $event->color }}
                                </span>
                            </td>
                            <td style="display:flex; gap:0.5em;">
                                    <a href="{{ route('admin.academic-calendar.edit', $event) }}" class="btn btn-edit btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>
                                <form action="{{ route('admin.academic-calendar.destroy', $event) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este calendario?')"><i class="bi bi-trash"></i> Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted">No hay calendarios registrados.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $events->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
