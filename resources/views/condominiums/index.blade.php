@extends('layouts.header_app')

<div class="content">
    <div class="container-fluid">
        <h2 class="mb-4">Condomínios</h2>
        <div class="card shadow-sm border-0 rounded-3 p-4">
            <a href="{{ route('condominiums.create') }}" class="btn btn-primary mb-3">Novo Condomínio</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th> <!-- Coluna da imagem -->
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>UF</th>
                    <th>Cidade</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($condominiums as $cond)
                <tr>
                    <td>
                        @if($cond->condominium_image)
                            <img src="{{ asset('storage/' . $cond->condominium_image) }}" 
                                alt="Imagem do Condomínio" 
                                class="rounded-circle" width="40" height="40">
                        @else
                            <div class="d-flex justify-content-center align-items-center rounded-circle bg-secondary text-white" 
                                style="width:40px; height:40px;">
                                <i class="bi bi-building"></i>
                            </div>
                        @endif
                    </td>
                    <td>{{ $cond->id }}</td>
                    <td>{{ $cond->name }}</td>
                    <td>{{ $cond->address }}</td>
                    <td>{{ $cond->uf }}</td>
                    <td>{{ $cond->city }}</td>
                    <td>{{ $cond->systemStatus ? $cond->systemStatus->name : 'Sem status' }}</td>
                    <td>
                        <a href="{{ route('condominiums.show', $cond->id) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('condominiums.edit', $cond->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('condominiums.destroy', $cond->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


            {{ $condominiums->links() }}
        </div>
    </div>
</div>

@extends('layouts.footer_app')
