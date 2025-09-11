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
</style>

<div class="content">
    <div class="container-fluid">
        <h2 class="mb-4">Novo Condomínio</h2>
        <div class="form-container">
            <form action="{{ route('condominiums.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="system_status_id" class="form-label">Status</label>
                        <select name="system_status_id" class="form-select" required>
                            @foreach(\App\Models\SystemStatus::all() as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="address" class="form-label">Endereço</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="number" class="form-label">Número</label>
                        <input type="text" name="number" class="form-control">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="complement" class="form-label">Complemento</label>
                        <input type="text" name="complement" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="zip_code" class="form-label">CEP</label>
                        <input type="text" name="zip_code" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="city" class="form-label">Cidade</label>
                        <input type="text" name="city" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="uf" class="form-label">UF</label>
                        <input type="text" name="uf" class="form-control">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="condominium_image" class="form-label">Imagem do Condomínio</label>
                    <input type="file" name="condominium_image" class="form-control">
                </div>

                <div class="d-flex justify-content-end gap-3">
                    <a href="{{ route('condominiums.index') }}" class="btn btn-cancel">Cancelar</a>
                    <button type="submit" class="btn btn-success btn-save">
                        <i class="bi bi-save-fill me-2"></i> Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@extends('layouts.footer_app')