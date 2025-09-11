@extends('layouts.header_app')

<style>
    /* Estilo para o container de conteúdo */
    .details-container {
        background-color: var(--dark-card);
        border-radius: 1rem;
        padding: 2.5rem;
        box-shadow: 0 4px 20px var(--shadow-strong);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Estilos para a imagem e placeholder do perfil */
    .profile-image-display {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        margin-bottom: 2rem;
        border: 3px solid var(--primary-color);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
    }
    .profile-image-placeholder {
        width: 150px;
        height: 150px;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        margin-bottom: 2rem;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
    }
    .profile-image-placeholder i {
        font-size: 4rem;
        color: var(--text-color-muted);
    }

    /* Estilos para a lista de detalhes */
    .details-list p {
        font-size: 1.1rem;
        color: var(--text-color-light);
        margin-bottom: 0.75rem;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }
    .details-list p:last-child {
        border-bottom: none;
    }
    .details-list p strong {
        color: var(--primary-light);
        display: inline-block;
        min-width: 120px; /* Alinha os dois pontos */
    }

    /* Estilos do badge de status */
    .badge-status-details {
        font-size: 1em;
        padding: 0.5em 1em;
        border-radius: 1.5rem;
        background-color: var(--primary-color);
        color: var(--dark-card);
        font-weight: 600;
        vertical-align: middle;
    }
    
    /* Botão de voltar */
    .btn-back {
        background-color: var(--dark-card) !important;
        border-color: rgba(255, 255, 255, 0.1) !important;
        color: var(--text-color-light) !important;
        font-weight: 500;
        border-radius: 0.75rem;
        padding: 0.75rem 2rem;
        transition: all 0.3s ease;
    }
    .btn-back:hover {
        background-color: rgba(255, 255, 255, 0.05) !important;
        border-color: var(--primary-color) !important;
        transform: translateY(-2px);
    }

</style>

<div class="content">
    <div class="container-fluid">
        <h2 class="mb-4">Detalhes do Usuário</h2>
        <div class="details-container">

            {{-- Visualização da imagem do perfil ou placeholder --}}
            <div class="text-center">
                @if($user->profile_image)
                    <img src="{{ asset('storage/' . $user->profile_image) }}" 
                        alt="Perfil" 
                        class="profile-image-display">
                @else
                    <div class="profile-image-placeholder">
                        <i class="bi bi-person-fill"></i>
                    </div>
                @endif
            </div>
            
            <div class="details-list">
                <p><strong>ID:</strong> {{ $user->id }}</p>
                <p><strong>Nome:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Telefone:</strong> {{ $user->telefone }}</p>
                <p><strong>Ativo:</strong> {{ $user->is_active ? 'Sim' : 'Não' }}</p>
                <p>
                    <strong>Status:</strong> 
                    <span class="badge-status-details">
                        {{ $user->systemStatus ? $user->systemStatus->name : 'Sem status' }}
                    </span>
                </p>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('users.index') }}" class="btn btn-back">
                    <i class="bi bi-arrow-left me-2"></i> Voltar
                </a>
            </div>

        </div>
    </div>
</div>

@extends('layouts.footer_app')