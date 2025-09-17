@extends('layouts.header_app')

<style>
    /* Estilos para o container de conteúdo */
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
    .form-select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23e2e8f0' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
        color: var(--text-color-light);
    }
    .form-select option {
        background-color: var(--dark-bg);
        color: var(--text-color-light);
    }
    
    /* Estilos do grupo de input para o campo de moeda */
    .input-group .input-group-text {
        background-color: var(--dark-card-lighter);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: var(--text-color-muted);
        border-right: none;
        border-radius: 0.75rem 0 0 0.75rem;
    }
    .input-group .form-control {
        border-left: none;
        border-radius: 0 0.75rem 0.75rem 0;
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
        <h2 class="mb-4">Novo Pagamento</h2>
        <div class="form-container">
            <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="description" class="form-label">Descrição</label>
                        <input type="text" name="description" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="amount" class="form-label">Valor</label>
                        <div class="input-group">
                            <span class="input-group-text">R$</span>
                            <input type="text" name="amount" id="amount" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="due_date" class="form-label">Data de Vencimento</label>
                        <input type="date" name="due_date" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="payment_date" class="form-label">Data do Pagamento</label>
                        <input type="date" name="payment_date" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="user_id" class="form-label">Usuário</label>
                        <select name="user_id" class="form-select" required>
                            @foreach(\App\Models\User::all() as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="condominium_id" class="form-label">Condomínio</label>
                        <select name="condominium_id" class="form-select" required>
                            @foreach(\App\Models\Condominium::all() as $condominium)
                                <option value="{{ $condominium->id }}">{{ $condominium->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="system_status_id" class="form-label">Status</label>
                        <select name="system_status_id" class="form-select" required>
                            @foreach(\App\Models\SystemStatus::all() as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="payment_slip" class="form-label">Comprovante de Pagamento</label>
                        <input type="file" name="payment_slip" class="form-control">
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-3 mt-4">
                    <a href="{{ route('payments.index') }}" class="btn btn-cancel">Cancelar</a>
                    <button type="submit" class="btn btn-save">
                        <i class="bi bi-save-fill me-2"></i> Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Script para a máscara de moeda --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var input = document.getElementById('amount');
        input.addEventListener('keyup', function(e) {
            var value = input.value.replace(/\D/g, '');
            value = value.replace(/(\d{2})$/, ',$1');
            value = value.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
            input.value = value;
        });

        // Adiciona um listener no formulário para remover a máscara antes do envio
        // para que o valor seja enviado no formato correto (ex: 1234.56)
        document.querySelector('form').addEventListener('submit', function() {
            var input = document.getElementById('amount');
            // Remove pontos e substitui a vírgula por ponto para o backend
            input.value = input.value.replace(/\./g, '').replace(',', '.');
        });
    });
</script>

@extends('layouts.footer_app')