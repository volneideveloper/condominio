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
    
    /* Estilos para a imagem e placeholder */
    .condo-image-display {
        width: 100%;
        max-height: 300px;
        object-fit: cover;
        border-radius: 1rem;
        margin-bottom: 2rem;
        border: 3px solid var(--primary-color);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
    }
    .condo-image-placeholder {
        width: 100%;
        height: 300px;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 1rem;
        margin-bottom: 2rem;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
    }
    .condo-image-placeholder i {
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
    .details-list p strong {
        color: var(--primary-light);
        display: inline-block;
        min-width: 150px; /* Alinha os dois pontos */
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
        <h2 class="mb-4">Detalhes do Condomínio</h2>
        <div class="details-container">

            {{-- Visualização da imagem ou placeholder --}}
            <div class="text-center">
                @if ($condominium->condominium_image)
                    <img src="{{ asset('storage/' . $condominium->condominium_image) }}" 
                        alt="Imagem do Condomínio" 
                        class="condo-image-display">
                @else
                    <div class="condo-image-placeholder">
                        <i class="bi bi-building"></i>
                    </div>
                @endif
            </div>

            <div class="details-list">
                <p><strong>ID:</strong> {{ $condominium->id }}</p>
                <p><strong>Nome:</strong> {{ $condominium->name }}</p>
                <p><strong>Endereço:</strong> {{ $condominium->address }}</p>
                <p><strong>Número:</strong> {{ $condominium->number }}</p>
                <p><strong>Complemento:</strong> {{ $condominium->complement }}</p>
                <p><strong>UF:</strong> {{ $condominium->uf }}</p>
                <p><strong>CEP:</strong> {{ $condominium->zip_code }}</p>
                <p><strong>Cidade:</strong> {{ $condominium->city }}</p>
                <p>
                    <strong>Status:</strong> 
                    <span class="badge-status-details">
                        {{ $condominium->systemStatus ? $condominium->systemStatus->name : 'Sem status' }}
                    </span>
                </p>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('condominiums.index') }}" class="btn btn-back">
                    <i class="bi bi-arrow-left me-2"></i> Voltar
                </a>
            </div>

        </div>
    </div>
</div>

@extends('layouts.footer_app')