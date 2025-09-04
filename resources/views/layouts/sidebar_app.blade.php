<!-- Sidebar -->
<div class="sidebar">
    <div class="logo">
        <i class="bi bi-buildings"></i> Condo100
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="#" class="nav-link active"><i class="bi bi-house-door me-2"></i> Home</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link"><i class="bi bi-cash-stack me-2"></i> Valores</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link"><i class="bi bi-people me-2"></i> Usuários</a>
        </li>
    </ul>

    <div class="dropdown user-info">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" 
           data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="40" height="40" class="rounded-circle me-2">
            <strong>{{ Auth::user()->name }}</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark shadow">
            <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Configurações</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-person-circle me-2"></i> Perfil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
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
