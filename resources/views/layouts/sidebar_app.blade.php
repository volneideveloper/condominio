<!-- Sidebar -->
<div class="sidebar">
    <div class="logo">
        <i class="bi bi-buildings"></i> Condo100
    </div>

    <ul class="nav flex-column">
        <!-- Home -->
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
                <i class="bi bi-house-door me-2"></i> Home
            </a>
        </li>

        <!-- Condomínios -->
        <li class="nav-item">
            <a href="{{ route('condominiums.index') }}" class="nav-link">
                <i class="bi bi-building me-2"></i> Condomínios
            </a>
        </li>

        <!-- Usuários -->
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
                <i class="bi bi-people me-2"></i> Usuários
            </a>
        </li>

        <!-- Status do Sistema -->
        <li class="nav-item">
            <a href="{{ route('system-status.index') }}" class="nav-link">
                <i class="bi bi-sliders me-2"></i> Status do Sistema
            </a>
        </li>
    </ul>

   <div class="dropdown user-info mt-auto">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" 
       data-bs-toggle="dropdown" aria-expanded="false">

        @if(Auth::user()->profile_image)
            <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" 
                 alt="Perfil" class="rounded-circle me-2" width="40" height="40">
        @else
            <div class="rounded-circle bg-secondary d-flex justify-content-center align-items-center me-2"
                 style="width:40px; height:40px;">
                <i class="bi bi-person-fill text-white"></i>
            </div>
        @endif

        <strong>{{ Auth::user()->name }}</strong>
    </a>
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark shadow">
        <!--<li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Configurações</a></li>-->
        <li>
            <a class="dropdown-item" href="{{ route('users.edit', Auth::user()->id) }}">
                <i class="bi bi-person-circle me-2"></i> Perfil
            </a>
        </li>

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
