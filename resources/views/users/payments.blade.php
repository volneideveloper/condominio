@extends('layouts.header_app')

<div class="content">
    <div class="container-fluid">
        <h2 class="mb-4">Pagamentos de {{ $user->name }}</h2>
        <div class="content-card">
            <div class="table-responsive">
                <table class="table table-dark table-hover table-striped custom-table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Vencimento</th>
                            <th scope="col">Status</th>
                            <th scope="col">Condomínio</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($user->payments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>{{ $payment->description }}</td>
                            <td>R$ {{ number_format($payment->amount, 2, ',', '.') }}</td>
                            <td>{{ \Carbon\Carbon::parse($payment->due_date)->format('d/m/Y') }}</td>
                            <td>
                                <span class="badge {{ $payment->systemStatus ? ($payment->systemStatus->id == 1 ? 'bg-success-dark' : 'bg-secondary') : '' }}">
                                    {{ $payment->systemStatus ? $payment->systemStatus->name : 'Sem status' }}
                                </span>
                            </td>
                            <td>{{ $payment->condominium->name }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Ações">
                                    <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-sm btn-action" title="Ver">
                                        <i class="bi bi-eye-fill icon-action-info"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Nenhum pagamento encontrado para este usuário.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('users.index') }}" class="btn btn-cancel">
                    <i class="bi bi-arrow-left me-2"></i> Voltar para Usuários
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    /* Estilos de badge e de tabela reutilizados */
    .content-card {
        padding: 2.5rem;
    }
    .custom-table {
        border-radius: 1rem;
        overflow: hidden;
        margin-bottom: 0;
    }
    .custom-table th, .custom-table td {
        vertical-align: middle;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        padding: 1rem;
        color: var(--text-color-light);
    }
    .custom-table thead th {
        border-bottom: 2px solid rgba(255, 255, 255, 0.1);
        font-weight: 600;
        color: var(--text-color-muted);
    }
    .custom-table tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.03);
    }

    /* Botões de Ação */
    .btn-action {
        border-radius: 0.5rem;
        padding: 0.5rem 0.75rem;
        transition: all 0.2s ease;
        background-color: var(--dark-card);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: var(--text-color-light) !important;
    }
    .btn-action:hover {
        transform: translateY(-1px);
        background-color: rgba(255, 255, 255, 0.05);
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    /* Cores dos ícones */
    .icon-action-info {
        color: #3b82f6 !important; /* Azul */
    }
    .icon-action-warning {
        color: #f59e0b !important; /* Amarelo */
    }
    .icon-action-danger {
        color: #ef4444 !important; /* Vermelho */
    }

    /* Badges de status */
    .badge {
        font-size: 0.9em;
        padding: 0.6em 1em;
        border-radius: 1rem;
        font-weight: 600;
        display: inline-block;
        min-width: 100px; /* Mantém a largura do badge consistente */
        text-align: center;
    }
    .bg-success-dark {
        background-color: var(--primary-color) !important;
        color: var(--dark-card) !important;
    }
    .bg-warning-dark {
        background-color: #f59e0b !important;
        color: var(--dark-card) !important;
    }
    .bg-secondary {
        background-color: var(--text-color-muted) !important;
        color: var(--dark-card) !important;
    }

    /* Botão de Cancelar/Voltar */
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

@extends('layouts.footer_app')