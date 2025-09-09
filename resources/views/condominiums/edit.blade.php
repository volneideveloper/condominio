@extends('layouts.header_app')

<div class="content">
    <div class="container-fluid">
        <h2 class="mb-4">Editar Condomínio</h2>


        <div class="card shadow-sm border-0 rounded-3 p-4">
            <form action="{{ route('condominiums.update', $condominium->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3 text-center">
                    @if($condominium->condominium_image)
                        <img src="{{ asset('storage/' . $condominium->condominium_image) }}" 
                            alt="Imagem do Condomínio" 
                            class="rounded-circle mb-2" width="80" height="80">
                    @else
                        <div class="d-flex justify-content-center align-items-center rounded-circle bg-secondary text-white mb-2" 
                            style="width:80px; height:80px;">
                            <i class="bi bi-building" style="font-size: 2rem;"></i>
                        </div>
                    @endif
                    <div>
                        <label for="condominium_image" class="form-label">Imagem do Condomínio</label>
                        <input type="file" name="condominium_image" class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" value="{{ $condominium->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Endereço</label>
                    <input type="text" name="address" class="form-control" value="{{ $condominium->address }}" required>
                </div>

                <div class="mb-3">
                    <label for="number" class="form-label">Número</label>
                    <input type="text" name="number" class="form-control" value="{{ $condominium->number }}">
                </div>

                <div class="mb-3">
                    <label for="complement" class="form-label">Complemento</label>
                    <input type="text" name="complement" class="form-control" value="{{ $condominium->complement }}">
                </div>

                <div class="mb-3">
                    <label for="uf" class="form-label">UF</label>
                    <input type="text" name="uf" class="form-control" value="{{ $condominium->uf }}">
                </div>

                <div class="mb-3">
                    <label for="zip_code" class="form-label">CEP</label>
                    <input type="text" name="zip_code" class="form-control" value="{{ $condominium->zip_code }}">
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">Cidade</label>
                    <input type="text" name="city" class="form-control" value="{{ $condominium->city }}">
                </div>

                <div class="mb-3">
                    <label for="system_status_id" class="form-label">Status</label>
                    <input type="number" name="system_status_id" class="form-control" value="{{ $condominium->system_status_id }}">
                </div>

                <button type="submit" class="btn btn-success">Atualizar</button>
                <a href="{{ route('condominiums.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>

        </div>
    </div>
</div>

@extends('layouts.footer_app')
