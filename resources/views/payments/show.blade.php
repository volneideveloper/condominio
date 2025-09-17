@extends('layouts.header_app')

<style>
    /* Estilos para o container de conteúdo */
    .details-container {
        background-color: var(--dark-card);
        border-radius: 1rem;
        padding: 2.5rem;
        box-shadow: 0 4px 20px var(--shadow-strong);
        border: 1px solid rgba(255, 255, 255, 0.1);
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

    /* Estilos para a seção do comprovante */
    .payment-slip-container {
        text-align: center;
        margin-bottom: 2rem;
        padding: 1rem; /* Diminui o padding interno */
        background-color: rgba(255, 255, 255, 0.05);
        border-radius: 1rem;
        border: 1px dashed rgba(255, 255, 255, 0.1);
    }
    .payment-slip-container .bi {
        font-size: 2.5rem; /* Diminui o tamanho do ícone */
        color: var(--text-color-muted);
    }
    .btn-file-action {
        background-color: var(--dark-card) !important;
        border-color: rgba(255, 255, 255, 0.1) !important;
        color: var(--text-color-light) !important;
        font-weight: 500;
        border-radius: 0.75rem;
        padding: 0.5rem 1rem; /* Diminui o padding dos botões */
        font-size: 0.9rem; /* Diminui o tamanho da fonte */
        transition: all 0.3s ease;
    }
    .btn-file-action:hover {
        background-color: rgba(255, 255, 255, 0.05) !important;
        border-color: var(--primary-color) !important;
    }
</style>

<div class="content">
    <div class="container-fluid">
        <h2 class="mb-4">Detalhes do Pagamento</h2>
        <div class="details-container">

            {{-- Seção do Comprovante de Pagamento --}}
            <div class="payment-slip-container text-center">
                <i class="bi bi-file-earmark-text d-block mb-2"></i>
                <h6 class="text-white-50">Comprovante de Pagamento</h6>
                @if ($payment->payment_slip)
                    <p class="text-white-50 mt-2" style="font-size: 0.9rem;">Arquivo: <strong>{{ basename($payment->payment_slip) }}</strong></p>
                    <div class="d-flex justify-content-center gap-3 mt-3">
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
            </div>

            <div class="details-list">
                <p><strong>ID:</strong> {{ $payment->id }}</p>
                <p><strong>Descrição:</strong> {{ $payment->description }}</p>
                <p><strong>Valor:</strong> R$ {{ number_format($payment->amount, 2, ',', '.') }}</p>
                <p><strong>Vencimento:</strong> {{ \Carbon\Carbon::parse($payment->due_date)->format('d/m/Y') }}</p>
                <p><strong>Pagamento:</strong> {{ $payment->payment_date ? \Carbon\Carbon::parse($payment->payment_date)->format('d/m/Y') : 'Não pago' }}</p>
                <p><strong>Usuário:</strong> {{ $payment->user->name }}</p>
                <p><strong>Condomínio:</strong> {{ $payment->condominium->name }}</p>
                <p>
                    <strong>Status:</strong> 
                    <span class="badge-status-details">
                        {{ $payment->systemStatus ? $payment->systemStatus->name : 'Sem status' }}
                    </span>
                </p>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('payments.index') }}" class="btn btn-back">
                    <i class="bi bi-arrow-left me-2"></i> Voltar
                </a>
            </div>

        </div>
    </div>
</div>

@extends('layouts.footer_app')