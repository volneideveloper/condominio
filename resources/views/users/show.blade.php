@extends('layouts.header_app')

<div class="content">
    <div class="container-fluid">
        <h2 class="mb-4">Detalhes do Usuário</h2>
        <div class="card shadow-sm border-0 rounded-3 p-4">
            <div class="mb-3">
                @if($user->profile_image)
                    <img src="{{ asset('storage/' . $user->profile_image) }}" 
                         alt="Perfil" class="rounded-circle" width="100" height="100">
                @else
                    <div class="rounded-circle bg-secondary d-flex justify-content-center align-items-center"
                         style="width:100px; height:100px;">
                        <i class="bi bi-person-fill text-white" style="font-size:50px;"></i>
                    </div>
                @endif
            </div>
            <p><strong>ID:</strong> {{ $user->id }}</p>
            <p><strong>Nome:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Telefone:</strong> {{ $user->telefone }}</p>
            <p><strong>Ativo:</strong> {{ $user->is_active ? 'Sim' : 'Não' }}</p>
            <p><strong>Status:</strong> {{ $user->systemStatus ? $user->systemStatus->name : 'Sem status' }}</p>


            <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Voltar</a>
        </div>
    </div>
</div>

@extends('layouts.footer_app')
