@extends('layouts.header_app')

<style>
    /* Reutiliza os estilos de formulário já criados */
    .form-container {
        background-color: var(--dark-card);
        border-radius: 1rem;
        padding: 2.5rem;
        box-shadow: 0 4px 20px var(--shadow-strong);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
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

    /* Estilos para a seção do comprovante - IGUAL A SHOW.BLADE.PHP */
    .payment-slip-container {
        text-align: center;
        margin-bottom: 2rem;
        padding: 1rem;
        background-color: rgba(255, 255, 255, 0.05);
        border-radius: 1rem;
        border: 1px dashed rgba(255, 255, 255, 0.1);
    }
    .payment-slip-container .bi {
        font-size: 2.5rem;
        color: var(--text-color-muted);
    }
    .btn-file-action {
        background-color: var(--dark-card) !important;
        border-color: rgba(255, 255, 255, 0.1) !important;
        color: var(--text-color-light) !important;
        font-weight: 500;
        border-radius: 0.75rem;
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }
    .btn-file-action:hover {
        background-color: rgba(255, 255, 255, 0.05) !important;
        border-color: var(--primary-color) !important;
    }
</style>

<div class="content">
    <div class="container-fluid">
        <h2 class="mb-4">Editar Pagamento</h2>
        <div class="form-container">
            <form action="{{ route('payments.update', $payment->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Seção do Comprovante de Pagamento --}}
                <div class="payment-slip-container text-center">
                    <i class="bi bi-file-earmark-text d-block mb-2"></i>
                    <h6 class="text-white-50">Comprovante de Pagamento</h6>
                    @if ($payment->payment_slip)
                        <p class="text-white-50 mt-2" style="font-size: 0.9rem;">Arquivo Atual: <strong>{{ basename($payment->payment_slip) }}</strong></p>
                        <div class="d-flex justify-content-center gap-3 mt-3 mb-3">
                            <a href="{{ asset('storage/' . $payment->payment_slip) }}" 
                               class="btn btn-file-action" target="_blank">
                                <i class="bi bi-box-arrow-up-right me-2"></i> Visualizar
                            </a>
                            <a href="{{ asset('storage/' . $payment->payment_slip) }}" 
                               class="btn btn-file-action" download>
                                <i class="bi bi-download me-2"></i> Baixar
                            </a>
                        </div>
                    @else
                        <p class="text-white-50 mt-2" style="font-size: 0.9rem;">Nenhum comprovante anexado.</p>
                    @endif
                    <hr class="text-white-50" style="opacity: 0.2;">
                    <label for="payment_slip" class="form-label mt-3">
                        <small>Selecione um novo arquivo para alterar o comprovante</small>
                    </label>
                    <input type="file" name="payment_slip" class="form-control" style="max-width: 350px; margin: 0 auto;">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="description" class="form-label">Descrição</label>
                        <input type="text" name="description" class="form-control" value="{{ $payment->description }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="amount" class="form-label">Valor</label>
                        <input type="number" step="0.01" name="amount" class="form-control" value="{{ $payment->amount }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="due_date" class="form-label">Data de Vencimento</label>
                        <input type="date" name="due_date" class="form-control" value="{{ $payment->due_date }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="payment_date" class="form-label">Data do Pagamento</label>
                        <input type="date" name="payment_date" class="form-control" value="{{ $payment->payment_date }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="user_id" class="form-label">Usuário</label>
                        <select name="user_id" class="form-select" required>
                            @foreach(\App\Models\User::all() as $user)
                                <option value="{{ $user->id }}" {{ $payment->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="condominium_id" class="form-label">Condomínio</label>
                        <select name="condominium_id" class="form-select" required>
                            @foreach(\App\Models\Condominium::all() as $condominium)
                                <option value="{{ $condominium->id }}" {{ $payment->condominium_id == $condominium->id ? 'selected' : '' }}>
                                    {{ $condominium->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="system_status_id" class="form-label">Status</label>
                        <select name="system_status_id" class="form-select" required>
                            @foreach(\App\Models\SystemStatus::all() as $status)
                                <option value="{{ $status->id }}" {{ $payment->system_status_id == $status->id ? 'selected' : '' }}>
                                    {{ $status->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-3 mt-4">
                    <a href="{{ route('payments.index') }}" class="btn btn-cancel">Cancelar</a>
                    <button type="submit" class="btn btn-save">
                        <i class="bi bi-save-fill me-2"></i> Atualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@extends('layouts.footer_app')