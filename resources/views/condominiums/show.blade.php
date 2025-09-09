@extends('layouts.header_app')

<div class="content">
    <div class="container-fluid">
        <h2 class="mb-4">Detalhes do Condomínio</h2>
        <div class="card shadow-sm border-0 rounded-3 p-4 text-center">

                @if ($condominium->condominium_image)
                    <img src="{{ asset('storage/' . $condominium->condominium_image) }}" 
                        alt="Imagem do Condomínio" 
                        class="img-fluid rounded mb-3" 
                        style="max-height: 250px; object-fit: cover;">
                @else
                    <div class="d-flex justify-content-center align-items-center bg-secondary mb-3" style="height:250px;">
                        <i class="bi bi-building" style="font-size: 3rem; color:white;"></i>
                    </div>
                @endif


            <div class="text-start">
                <p><strong>ID:</strong> {{ $condominium->id }}</p>
                <p><strong>Nome:</strong> {{ $condominium->name }}</p>
                <p><strong>Endereço:</strong> {{ $condominium->address }}</p>
                <p><strong>Número:</strong> {{ $condominium->number }}</p>
                <p><strong>Complemento:</strong> {{ $condominium->complement }}</p>
                <p><strong>UF:</strong> {{ $condominium->uf }}</p>
                <p><strong>CEP:</strong> {{ $condominium->zip_code }}</p>
                <p><strong>Cidade:</strong> {{ $condominium->city }}</p>
                <p><strong>Status:</strong> 
                    {{ $condominium->systemStatus ? $condominium->systemStatus->name : 'Sem status' }}
                </p>
            </div>

            <a href="{{ route('condominiums.index') }}" class="btn btn-secondary mt-3">Voltar</a>
        </div>
    </div>
</div>

@extends('layouts.footer_app')
