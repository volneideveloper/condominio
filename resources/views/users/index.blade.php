@extends('layouts.header_app')

<div class="content">
    <div class="container-fluid">
        <h2 class="mb-4">Usuários</h2>
        <div class="card shadow-sm border-0 rounded-3 p-4">
            <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Novo Usuário</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>
                            @if($user->profile_image)
                                <img src="{{ asset('storage/' . $user->profile_image) }}" 
                                    alt="Perfil" class="rounded-circle" width="40" height="40">
                            @else
                                <div class="rounded-circle bg-secondary d-flex justify-content-center align-items-center"
                                    style="width:40px; height:40px;">
                                    <i class="bi bi-person-fill text-white"></i>
                                </div>
                            @endif
                        </td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->telefone }}</td>
                        <td>{{ $user->systemStatus ? $user->systemStatus->name : 'Sem status' }}</td>
                        <td>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $users->links() }}
        </div>
    </div>
</div>

@extends('layouts.footer_app')
