<header class="admin-header">
    <div class="admin-header-content">
        @php $base = rtrim(request()->getBasePath(), '/'); @endphp
        <div class="admin-logo">
            <img src="{{ ($base !== '' ? $base : '') . '/assets/images/logoists.png' }}" alt="ISTS Logo" class="admin-logo-img">
            <h1>ISTS Admin</h1>
        </div>

        <button type="button" class="mobile-menu-toggle menu-toggle" aria-label="Abrir menu admin">
            <i class="bi bi-list"></i>
        </button>

        <nav class="admin-nav">
            <ul class="admin-nav-menu">
                <li><a href="{{ url('/admin/dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active':'' }}"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
                <li><a href="{{ url('/admin/contents') }}" class="{{ request()->is('admin/contents*') ? 'active':'' }}"><i class="bi bi-file-earmark-text"></i> Contenidos</a></li>
                <li><a href="{{ url('/admin/news') }}" class="{{ request()->is('admin/news*') ? 'active':'' }}"><i class="bi bi-newspaper"></i> Noticias</a></li>
                <li><a href="{{ url('/admin/events') }}" class="{{ request()->is('admin/events*') ? 'active':'' }}"><i class="bi bi-calendar-event"></i> Eventos</a></li>
                <li><a href="{{ url('/admin/about') }}" class="{{ request()->is('admin/about*') ? 'active':'' }}"><i class="bi bi-info-circle"></i> Acerca</a></li>
                <li><a href="{{ route('admin.autoridades.index') }}" class="{{ request()->is('admin/autoridades*') ? 'active':'' }}"><i class="bi bi-person-badge"></i> Autoridades</a></li>
                <li><a href="{{ url('/admin/users') }}" class="{{ request()->is('admin/users*') ? 'active':'' }}"><i class="bi bi-people"></i> Usuarios</a></li>
                <li><a href="{{ url('/admin/settings') }}" class="{{ request()->is('admin/settings') ? 'active':'' }}"><i class="bi bi-gear"></i> Config.</a></li>
                <li><a href="{{ route('admin.chatbot.contacts') }}" class="{{ request()->is('admin/chatbot-contactos') ? 'active':'' }}"><i class="bi bi-chat-dots"></i> Chatbot</a></li>
            </ul>
        </nav>

        <div class="admin-user-menu">
            <div class="user-info">
                <span class="user-name">{{ optional(Auth::user())->email ?? 'Usuario' }}</span>
                <div class="user-dropdown">
                    <a href="{{ url('/admin/profile') }}"><i class="bi bi-person-circle"></i> Perfil</a>
                    <a href="{{ url('/auth/change-password') }}"><i class="bi bi-key"></i> Cambiar Contraseña</a>
                    <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                        @csrf
                        <button type="submit" style="background:none;border:0;padding:0;color:inherit;font:inherit;cursor:pointer;text-align:left;width:100%;">
                            <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
