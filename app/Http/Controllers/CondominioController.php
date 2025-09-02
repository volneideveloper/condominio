<?php

namespace App\Http\Controllers;

use App\Models\Condominium;
use Illuminate\Http\Request;

class CondominioController extends Controller
{
    public function index()
    {
        $condominios = Condominium::paginate();
        return view('condominios.index', compact('condominios'));
    }
    
    public function create()
    {
        return view('condominios.create');
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'number' => 'nullable|string|max:50',
            'complement' => 'nullable|string|max:255',
            'neighborhood' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:20',
            'city_id' => 'required|exists:cities,id',
            'condominium_status_id' => 'required|exists:condominium_status,id',
        ]);

        $condominio = Condominium::create($data);
        return redirect()->route('condominios.index')->with('success', 'Condomínio criado com sucesso.');
    }
    
    public function show(string $id)
    {
        $condominio = Condominium::findOrFail($id);
        return view('condominios.show', compact('condominio'));
    }
   
    public function edit(string $id)
    {
        $condominio = Condominium::findOrFail($id);
        return view('condominios.edit', compact('condominio'));
    }

    public function update(Request $request, string $id)
    {
        $condominio = Condominium::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'number' => 'nullable|string|max:50',
            'complement' => 'nullable|string|max:255',
            'neighborhood' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:20',
            'city_id' => 'required|exists:cities,id',
            'condominium_status_id' => 'required|exists:condominium_status,id',
        ]);

        $condominio->update($data);
        return redirect()->route('condominios.index')->with('success', 'Condomínio atualizado com sucesso.');
    }
   
    public function destroy(string $id)
    {
        $condominio = Condominium::findOrFail($id);
        $condominio->delete();

        return redirect()->route('condominios.index')->with('success', 'Condomínio deletado com sucesso.');
    }
}
