@extends('layouts.header_app')

<div class="content">
    <div class="container-fluid">
        <h2 class="mb-4">Status do Sistema</h2>
        <div class="card shadow-sm border-0 rounded-3 p-4">
            <a href="{{ route('system-status.create') }}" class="btn btn-primary mb-3">Novo Status</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <!--<th>Ações</th>-->
                    </tr>
                </thead>
                <tbody>
                    @foreach($statuses as $status)
                    <tr>
                        <td>{{ $status->id }}</td>
                        <td>{{ $status->name }}</td>
                        <!-- <td>
                            <a href="{{ route('system-status.show', $status->id) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('system-status.edit', $status->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('system-status.destroy', $status->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $statuses->links() }}
        </div>
    </div>
</div>

@extends('layouts.footer_app')
