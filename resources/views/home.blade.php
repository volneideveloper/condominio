@extends('layouts.header_app')

<div class="content">
    <div class="container-fluid">
        <h2 class="mb-4"></h2>

        {{-- Cards de resumo --}}
       <div class="row mb-4">
            <div class="col-md-3">
                <a href="{{ route('users.index') }}" class="text-decoration-none">
                    <div class="card shadow-sm border-0 rounded-3 p-3 text-center hover-card">
                        <i class="bi bi-people-fill" style="font-size: 2rem;"></i>
                        <h5 class="mt-2">Total de Usuários</h5>
                        <h2>{{ $userCount }}</h2>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('condominiums.index') }}" class="text-decoration-none">
                    <div class="card shadow-sm border-0 rounded-3 p-3 text-center hover-card">
                        <i class="bi bi-building" style="font-size: 2rem;"></i>
                        <h5 class="mt-2">Total de Condomínios</h5>
                        <h2>{{ $condominiums->count() }}</h2>
                    </div>
                </a>
            </div>
        </div>


        {{-- Grid de condomínios --}}
        <div class="row">
            @foreach($condominiums as $cond)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('condominiums.show', $cond->id) }}" class="text-decoration-none text-dark">
                        <div class="card shadow-sm rounded-3 h-100">
                            @if($cond->condominium_image)
                                <img src="{{ asset('storage/' . $cond->condominium_image) }}" 
                                     class="card-img-top" 
                                     style="height:200px; object-fit:cover;" 
                                     alt="{{ $cond->name }}">
                            @else
                                <div class="d-flex justify-content-center align-items-center bg-secondary" 
                                     style="height:200px;">
                                    <i class="bi bi-building" style="font-size: 3rem; color:white;"></i>
                                </div>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $cond->name }}</h5>
                                <p class="card-text mb-1"><strong>Cidade:</strong> {{ $cond->city }}</p>
                                <p class="card-text mb-1"><strong>UF:</strong> {{ $cond->uf }}</p>
                                <p class="card-text mb-0"><strong>Status:</strong> {{ $cond->systemStatus ? $cond->systemStatus->name : 'Sem status' }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

    </div>
</div>

@extends('layouts.footer_app')
