@extends('layouts.header_app')

<div class="content">
    <div class="container-fluid">
        <h2 class="mb-4">Novo Condomínio</h2>
        <div class="card shadow-sm border-0 rounded-3 p-4">
            <form action="{{ route('condominiums.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- campos normais -->

                <div class="mb-3">
                    <label for="condominium_image" class="form-label">Imagem</label>
                    <input type="file" name="condominium_image" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Endereço</label>
                    <input type="text" name="address" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="number" class="form-label">Número</label>
                    <input type="text" name="number" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="complement" class="form-label">Complemento</label>
                    <input type="text" name="complement" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="uf" class="form-label">UF</label>
                    <input type="text" name="uf" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="zip_code" class="form-label">CEP</label>
                    <input type="text" name="zip_code" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">Cidade</label>
                    <input type="text" name="city" class="form-control">
                </div>


                <div class="mb-3">
                    <label for="system_status_id" class="form-label">Status</label>
                    <select name="system_status_id" class="form-select">
                        @foreach(\App\Models\SystemStatus::all() as $status)
                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('condominiums.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>

@extends('layouts.footer_app')
