@extends('layouts.header_app')

<div class="content">
    <div class="container-fluid">
        <h2 class="mb-4">Novo Usuário</h2>
        <div class="card shadow-sm border-0 rounded-3 p-4">
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" name="telefone" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="system_status_id" class="form-label">Status</label>
                    <select name="system_status_id" class="form-select">
                        @foreach(\App\Models\SystemStatus::all() as $status)
                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="profile_image" class="form-label">Imagem de Perfil</label>
                    <input type="file" name="profile_image" class="form-control" accept="image/*">
                </div>

                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>

        </div>
    </div>
</div>

@extends('layouts.footer_app')
