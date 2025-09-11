@extends('layouts.header_app')

<style>
    /* Estilos gerais para a página */
    .form-container {
        background-color: var(--dark-card);
        border-radius: 1rem;
        padding: 2.5rem;
        box-shadow: 0 4px 20px var(--shadow-strong);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    /* Estilos para os campos de formulário */
    .form-control, .form-select {
        background-color: transparent;
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: var(--text-color-light);
        border-radius: 0.75rem;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }
    .form-control:focus, .form-select:focus {
        background-color: rgba(255, 255, 255, 0.05);
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.25rem rgba(34, 197, 94, 0.25);
    }
    .form-label {
        color: var(--text-color-muted);
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    .form-control::placeholder {
        color: var(--text-color-muted);
        opacity: 0.7;
    }
    
    /* Ajuste de cor para o select no tema escuro */
    .form-select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23e2e8f0' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
        color: var(--text-color-light);
    }
    .form-select option {
        background-color: var(--dark-bg);
        color: var(--text-color-light);
    }

    /* Botões */
    .btn-save {
        background-color: var(--primary-color) !important;
        border-color: var(--primary-color) !important;
        color: var(--dark-card) !important;
        font-weight: 600;
        border-radius: 0.75rem;
        padding: 0.75rem 2rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(34, 197, 94, 0.2);
    }
    .btn-save:hover {
        background-color: var(--primary-light) !important;
        border-color: var(--primary-light) !important;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(34, 197, 94, 0.3);
    }

    .btn-cancel {
        background-color: var(--dark-card) !important;
        border-color: rgba(255, 255, 255, 0.1) !important;
        color: var(--text-color-light) !important;
        font-weight: 500;
        border-radius: 0.75rem;
        padding: 0.75rem 2rem;
        transition: all 0.3s ease;
    }
    .btn-cancel:hover {
        background-color: rgba(255, 255, 255, 0.05) !important;
        border-color: var(--primary-color) !important;
        transform: translateY(-2px);
    }

    /* Estilo para a imagem de perfil */
    .profile-image-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 2rem;
    }
    .profile-image {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border: 3px solid var(--primary-color);
        margin-bottom: 1rem;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }
    .profile-placeholder {
        width: 100px;
        height: 100px;
        background-color: var(--text-color-muted);
        display: flex;
        justify-content: center;
        align-items: center;
        color: var(--dark-card);
        font-size: 2rem;
        margin-bottom: 1rem;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }
</style>

<div class="content">
    <div class="container-fluid">
        <h2 class="mb-4">Editar Condomínio</h2>
        <div class="form-container">
            <form action="{{ route('condominiums.update', $condominium->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Visualização da imagem --}}
                <div class="profile-image-container">
                    @if($condominium->condominium_image)
                        <img src="{{ asset('storage/' . $condominium->condominium_image) }}" 
                            alt="Imagem do Condomínio" 
                            class="rounded-circle profile-image">
                    @else
                        <div class="rounded-circle profile-placeholder">
                            <i class="bi bi-building"></i>
                        </div>
                    @endif
                    <label for="condominium_image" class="form-label">
                        <small>Alterar Imagem do Condomínio</small>
                    </label>
                    <input type="file" name="condominium_image" class="form-control" style="width: 250px;">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" name="name" class="form-control" value="{{ $condominium->name }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="system_status_id" class="form-label">Status</label>
                        <select name="system_status_id" class="form-select" required>
                            @foreach(\App\Models\SystemStatus::all() as $status)
                                <option value="{{ $status->id }}" 
                                    {{ $condominium->system_status_id == $status->id ? 'selected' : '' }}>
                                    {{ $status->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="address" class="form-label">Endereço</label>
                        <input type="text" name="address" class="form-control" value="{{ $condominium->address }}" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="number" class="form-label">Número</label>
                        <input type="text" name="number" class="form-control" value="{{ $condominium->number }}">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="complement" class="form-label">Complemento</label>
                        <input type="text" name="complement" class="form-control" value="{{ $condominium->complement }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="zip_code" class="form-label">CEP</label>
                        <input type="text" name="zip_code" class="form-control" value="{{ $condominium->zip_code }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="city" class="form-label">Cidade</label>
                        <input type="text" name="city" class="form-control" value="{{ $condominium->city }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="uf" class="form-label">UF</label>
                        <input type="text" name="uf" class="form-control" value="{{ $condominium->uf }}">
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-3 mt-4">
                    <a href="{{ route('condominiums.index') }}" class="btn btn-cancel">Cancelar</a>
                    <button type="submit" class="btn btn-save">
                        <i class="bi bi-save-fill me-2"></i> Atualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@extends('layouts.footer_app')