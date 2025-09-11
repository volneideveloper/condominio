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
    .form-control {
        background-color: transparent;
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: var(--text-color-light);
        border-radius: 0.75rem;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }
    .form-control:focus {
        background-color: rgba(255, 255, 255, 0.05);
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.25rem rgba(34, 197, 94, 0.25);
    }
    .form-label {
        color: var(--text-color-muted);
        font-weight: 500;
        margin-bottom: 0.5rem;
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
        <h2 class="mb-4">Novo Status do Sistema</h2>
        <div class="form-container">
            <form action="{{ route('system-status.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nome do Status</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="d-flex justify-content-end gap-3 mt-4">
                    <a href="{{ route('system-status.index') }}" class="btn btn-cancel">Cancelar</a>
                    <button type="submit" class="btn btn-save">
                        <i class="bi bi-save-fill me-2"></i> Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@extends('layouts.footer_app')