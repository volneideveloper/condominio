@extends('layouts.header_app')

<div class="content">
    <div class="container-fluid">
        <h2 class="mb-4">Status do Sistema</h2>
        <div class="content-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="{{ route('system-status.create') }}" class="btn btn-primary btn-new-record">
                    <i class="bi bi-plus-lg me-2"></i> Novo Status
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-dark table-hover table-striped custom-table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($statuses as $status)
                        <tr>
                            <td class="text-center">{{ $status->id }}</td>
                            <td>
                                <span class="badge {{ $status->id == 1 ? 'bg-success-dark' : ($status->id == 2 ? 'bg-warning-dark' : 'bg-secondary') }}">
                                    {{ $status->name }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Ações">
                                    <a href="{{ route('system-status.edit', $status->id) }}" class="btn btn-sm btn-action" title="Editar">
                                        <i class="bi bi-pencil-fill icon-action-warning"></i>
                                    </a>
                                    <form action="{{ route('system-status.destroy', $status->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-action" title="Excluir">
                                            <i class="bi bi-trash-fill icon-action-danger"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $statuses->links() }}
            </div>
        </div>
    </div>
</div>

<style>
    /* Reutilizamos os estilos das outras páginas de listagem */
    .content-card {
        padding: 2.5rem;
    }
    .btn-new-record {
        background-color: var(--primary-color) !important;
        border-color: var(--primary-color) !important;
        color: var(--dark-card) !important;
        font-weight: 600;
        border-radius: 0.75rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(34, 197, 94, 0.2);
    }
    .btn-new-record:hover {
        background-color: var(--primary-light) !important;
        border-color: var(--primary-light) !important;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(34, 197, 94, 0.3);
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

    /* Estilo da Paginação */
    .pagination .page-item .page-link {
        background-color: var(--dark-card);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: var(--text-color-light);
        transition: all 0.3s ease;
        border-radius: 0.5rem;
        margin: 0 0.25rem;
    }
    .pagination .page-item .page-link:hover {
        background-color: rgba(255, 255, 255, 0.05);
        border-color: var(--primary-color);
        color: var(--primary-light);
    }
    .pagination .page-item.active .page-link {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: var(--dark-card);
        font-weight: 600;
        box-shadow: 0 4px 10px rgba(34, 197, 94, 0.2);
    }
    .pagination .page-item.active .page-link:hover {
        background-color: var(--primary-light);
        border-color: var(--primary-light);
    }
</style>

@extends('layouts.footer_app')