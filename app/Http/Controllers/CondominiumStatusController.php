<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CondominiumStatus;

class CondominiumStatusController extends Controller
{
    public function index()
    {
        $status = CondominiumStatus::paginate();
        return view('condominium_status.index', compact('condominioStatus'));
    }
    
    public function create()
    {
        return view('condominium_status.create');
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $status = CondominiumStatus::create($data);
        return redirect()->route('condominium_status.index')->with('success', 'Status do condomínio criado com sucesso.');
    }
    
    public function show(string $id)
    {
        $status = CondominiumStatus::findOrFail($id);
        return view('condominium_status.show', compact('status'));
    }
   
    public function edit(string $id)
    {
        $status = CondominiumStatus::findOrFail($id);
        return view('condominium_status.edit', compact('status'));
    }

    public function update(Request $request, string $id)
    {
        $status = CondominiumStatus::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $status->update($data);
        return redirect()->route('condominium_status.index')->with('success', 'Status do condomínio atualizado com sucesso.');
    }
   
    public function destroy(string $id)
    {
        $status = CondominiumStatus::findOrFail($id);
        $status->delete();
        return redirect()->route('condominium_status.index')->with('success', 'Status do condomínio deletado com sucesso.');
    }
}
