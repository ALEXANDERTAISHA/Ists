@extends('layouts.admin')

@section('content')

<div class="admin-content" style="max-width: 520px; margin: 0 auto;">
    <div class="dashboard-header" style="text-align:center;">
        <h1 style="font-size:2.2rem; font-weight:800; margin-bottom:0.2em;">
            <i class="bi bi-person-plus" style="color:var(--admin-primary);"></i> Crear Usuario
        </h1>
        <p style="color:var(--admin-gray); font-size:1.1rem;">Rellena el formulario para crear un nuevo usuario.</p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul style="margin-bottom:0;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST" style="background:white; border-radius:18px; box-shadow:0 2px 16px rgba(30,58,138,0.07); padding:2.2rem 2rem 1.5rem 2rem; margin-top:1.5rem;">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label fw-semibold"><i class="bi bi-person"></i> Nombre</label>
            <input type="text" name="name" id="name" class="form-control admin-input" value="{{ old('name') }}" required placeholder="Nombre completo">
            <small class="form-text text-muted">Nombre y apellido del usuario.</small>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label fw-semibold"><i class="bi bi-envelope"></i> Email</label>
            <input type="email" name="email" id="email" class="form-control admin-input" value="{{ old('email') }}" required placeholder="usuario@ejemplo.com">
            <small class="form-text text-muted">Correo electrónico institucional.</small>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label fw-semibold"><i class="bi bi-lock"></i> Contraseña</label>
            <input type="password" name="password" id="password" class="form-control admin-input" required placeholder="Mínimo 8 caracteres">
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label fw-semibold"><i class="bi bi-lock-fill"></i> Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control admin-input" required placeholder="Repite la contraseña">
        </div>
        <div class="mb-4">
            <label for="role" class="form-label fw-semibold"><i class="bi bi-person-badge"></i> Rol</label>
            <select name="role" id="role" class="form-select admin-input">
                <option value="user" @if(old('role') == 'user') selected @endif>Usuario</option>
                <option value="editor" @if(old('role') == 'editor') selected @endif>Editor</option>
                <option value="admin" @if(old('role') == 'admin') selected @endif>Administrador</option>
            </select>
            <small class="form-text text-muted">Elige el nivel de acceso del usuario.</small>
        </div>
        <div class="admin-action-buttons">
            <button type="submit" class="btn btn-primary" style="background:var(--admin-gradient); border:none; font-weight:700; font-size:1.1rem; box-shadow:0 2px 8px rgba(0,168,107,0.08);">
                <i class="bi bi-person-plus"></i> Crear Usuario
            </button>
        </div>
    </form>
</div>
@endsection
