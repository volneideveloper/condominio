<?php

namespace App\Http\Controllers;

use App\Models\Condominium;
use Illuminate\Http\Request;

class CondominiumController extends Controller
{
    public function index()
    {
        $condominiums = Condominium::paginate();
        return view('condominiums.index', compact('condominiums'));
    }

    public function create()
    {
        return view('condominiums.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // Se tiver imagem, salva no disco public
        if ($request->hasFile('condominium_image')) {
            $data['condominium_image'] = $request->file('condominium_image')->store('images/condominiums', 'public');
        }

        Condominium::create($data);

        return redirect()->route('condominiums.index')->with('success', 'Condomínio criado com sucesso.');
    }

    public function show(Condominium $condominium)
    {
        return view('condominiums.show', compact('condominium'));
    }

    public function edit(Condominium $condominium)
    {
        return view('condominiums.edit', compact('condominium'));
    }

    public function update(Request $request, Condominium $condominium)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'number' => 'nullable|string|max:50',
            'complement' => 'nullable|string|max:255',
            'uf' => 'nullable|string|max:10',
            'zip_code' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:255',
            'system_status_id' => 'nullable|integer',
            'condominium_image' => 'nullable|image|max:2048',
        ]);

        // Se tiver imagem, salva no disco public
        if ($request->hasFile('condominium_image')) {
            $data['condominium_image'] = $request->file('condominium_image')->store('images/condominiums', 'public');
        }

        $condominium->update($data);

        return redirect()->route('condominiums.index')->with('success', 'Condomínio atualizado com sucesso.');
    }

    public function destroy(Condominium $condominium)
    {
        $condominium->delete();
        return redirect()->route('condominiums.index')->with('success', 'Condomínio deletado com sucesso.');
    }

    public function payments($id)
    {
        $condominium = Condominium::with('payments')->findOrFail($id);
        return view('condominiums.payments', compact('condominium'));
    }
}
