<div class="sidebar">
    <div class="sidebar-logo">
        <i class="bi bi-buildings-fill me-2"></i> Condo100
    </div>

    <ul class="nav flex-column sidebar-nav">
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link @if(Request::routeIs('home')) active @endif">
                <i class="bi bi-house-door-fill"></i> Home
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('condominiums.index') }}" class="nav-link @if(Request::routeIs('condominiums.*')) active @endif">
                <i class="bi bi-building-fill"></i> Condomínios
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link @if(Request::routeIs('users.*')) active @endif">
                <i class="bi bi-person-circle"></i> Usuários
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('system-status.index') }}" class="nav-link @if(Request::routeIs('system-status.*')) active @endif">
                <i class="bi bi-sliders2-vertical"></i> Status do Sistema
            </a>
        </li>
    </ul>

    <div class="sidebar-footer">
        <div class="dropdown">
            <a href="#" class="user-dropdown-toggle text-decoration-none dropdown-toggle" 
               data-bs-toggle="dropdown" aria-expanded="false">
                @if(Auth::user()->profile_image)
                    <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" 
                         alt="Perfil" class="rounded-circle me-3" width="45" height="45">
                @else
                    <div class="rounded-circle bg-secondary d-flex justify-content-center align-items-center me-3 user-avatar-placeholder"
                         style="width:45px; height:45px;">
                        <i class="bi bi-person-fill fs-4" style="color: var(--text-color-light);"></i>
                    </div>
                @endif
                <strong>{{ Auth::user()->name }}</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-start shadow dropdown-menu-dark">
                <li>
                    <a class="dropdown-item" href="{{ route('users.edit', Auth::user()->id) }}">
                        <i class="bi bi-person-circle me-2"></i> Perfil
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right me-2"></i> Sair
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>