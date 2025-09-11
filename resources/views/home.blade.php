@extends('layouts.header_app')

<style>
    /* Estilos para os Cards de Resumo */
    .summary-card {
        background-color: var(--dark-card);
        border-radius: 1rem;
        padding: 1.5rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-align: center;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    .summary-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px var(--shadow-strong);
    }
    .summary-card .card-icon {
        font-size: 2.5rem;
        color: var(--primary-light);
        transition: color 0.3s ease;
    }
    .summary-card:hover .card-icon {
        color: var(--primary-color);
    }
    .summary-card .card-title {
        font-weight: 500;
        margin-top: 0.75rem;
        color: var(--text-color-muted);
    }
    .summary-card .card-value {
        font-weight: 700;
        font-size: 2.5rem;
        color: var(--text-color-light);
        transition: color 0.3s ease;
    }
    .summary-card:hover .card-value {
        color: var(--primary-light);
    }

    /* Estilos para a Grid de Condomínios */
    .condo-card-grid {
        background-color: var(--dark-card);
        border-radius: 1rem;
        padding: 2.5rem;
        box-shadow: 0 4px 20px var(--shadow-strong);
    }
    .condo-card {
        background-color: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 1rem;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
    }
    .condo-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.25);
    }
    .condo-card .card-img-top {
        height: 200px;
        object-fit: cover;
        width: 100%;
    }
    .condo-card .card-placeholder {
        height: 200px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(255, 255, 255, 0.1);
    }
    .condo-card .card-placeholder i {
        font-size: 3rem;
        color: var(--text-color-muted);
    }
    .condo-card .card-body {
        padding: 1.5rem;
        color: var(--text-color-light);
    }
    .condo-card .card-title {
        font-weight: 600;
        color: var(--primary-light);
    }
    .condo-card .card-text {
        color: var(--text-color-muted);
    }
    .condo-card .card-text strong {
        color: var(--text-color-light);
    }
    .badge-status {
        background-color: var(--primary-color);
        color: var(--dark-card);
        font-weight: 600;
        padding: 0.4em 0.8em;
        border-radius: 1rem;
        display: inline-block;
    }
</style>

<div class="content">
    <div class="container-fluid">
        <h2 class="mb-4">Dashboard</h2>

        {{-- Cards de resumo --}}
        <div class="row mb-5">
            <div class="col-md-3">
                <a href="{{ route('users.index') }}" class="text-decoration-none">
                    <div class="summary-card">
                        <i class="bi bi-people-fill card-icon"></i>
                        <div class="card-title">Total de Usuários</div>
                        <h2 class="card-value mt-2">{{ $userCount }}</h2>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('condominiums.index') }}" class="text-decoration-none">
                    <div class="summary-card">
                        <i class="bi bi-building-fill card-icon"></i>
                        <div class="card-title">Total de Condomínios</div>
                        <h2 class="card-value mt-2">{{ $condominiums->count() }}</h2>
                    </div>
                </a>
            </div>
            
            {{-- Adicione mais cards de resumo aqui, se necessário --}}

        </div>

        {{-- Grid de condomínios recentes --}}
        <div class="condo-card-grid">
            <h4 class="mb-4" style="color: var(--primary-light);">Condomínios Recentes</h4>
            <div class="row">
                @foreach($condominiums as $cond)
                    <div class="col-md-4 mb-4">
                        <a href="{{ route('condominiums.show', $cond->id) }}" class="text-decoration-none">
                            <div class="condo-card">
                                @if($cond->condominium_image)
                                    <img src="{{ asset('storage/' . $cond->condominium_image) }}" 
                                        class="card-img-top" 
                                        alt="{{ $cond->name }}">
                                @else
                                    <div class="card-placeholder">
                                        <i class="bi bi-building-fill"></i>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $cond->name }}</h5>
                                    <p class="card-text mb-1"><small><strong>Cidade:</strong> {{ $cond->city }}</small></p>
                                    <p class="card-text mb-1"><small><strong>UF:</strong> {{ $cond->uf }}</small></p>
                                    <p class="card-text mb-0 mt-3">
                                        <span class="badge-status">{{ $cond->systemStatus ? $cond->systemStatus->name : 'Sem status' }}</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

@extends('layouts.footer_app')