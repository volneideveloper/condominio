@extends('layouts.header_app')

<div class="content">
    <div class="container-fluid">
        <h2 class="mb-4">Editar Usuário</h2>
        <div class="card shadow-sm border-0 rounded-3 p-4">
            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="profile_image" class="form-label">Imagem de Perfil</label>
                    <input type="file" name="profile_image" class="form-control">
                    @if(isset($user) && $user->profile_image)
                        <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Perfil" class="rounded-circle mt-2" width="80" height="80">
                    @endif
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha (Deixe em branco para não alterar)</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" name="telefone" class="form-control" value="{{ $user->telefone }}">
                </div>

                <div class="mb-3">
                    <label for="is_active" class="form-label">Ativo</label>
                    <select name="is_active" class="form-select">
                        <option value="1" {{ $user->is_active ? 'selected' : '' }}>Sim</option>
                        <option value="0" {{ !$user->is_active ? 'selected' : '' }}>Não</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="system_status_id" class="form-label">Status</label>
                    <select name="system_status_id" class="form-select">
                        @foreach(\App\Models\SystemStatus::all() as $status)
                            <option value="{{ $status->id }}" 
                                {{ $user->system_status_id == $status->id ? 'selected' : '' }}>
                                {{ $status->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Atualizar</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>

@extends('layouts.footer_app')
