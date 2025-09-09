@extends('layouts.header_app')

<div class="content">
    <div class="container-fluid">
        <h2 class="mb-4">Novo Status do Sistema</h2>
        <div class="card shadow-sm border-0 rounded-3 p-4">
            <form action="{{ route('system-status.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome do Status</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('system-status.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>

@extends('layouts.footer_app')
