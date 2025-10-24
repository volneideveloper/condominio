<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::all();

        return view('units.index', compact('units'));        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('units.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'condominium_id' => 'required|exists:condominiums,id',
            'owner_id' => 'nullable|exists:users,id',
            'percentage' => 'required|numeric|min:0|max:100',
        ]);

        Unit::create($validatedData);

        return redirect()->route('units.index')->with('success', 'Unit created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $unit = Unit::findOrFail($id);

        return view('units.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $unit = Unit::findOrFail($id);

        return view('units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'condominium_id' => 'required|exists:condominiums,id',
            'owner_id' => 'nullable|exists:users,id',
            'percentage' => 'required|numeric|min:0|max:100',
        ]);

        $unit = Unit::findOrFail($id);
        $unit->update($validatedData);

        return redirect()->route('units.index')->with('success', 'Unit updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();

        return redirect()->route('units.index')->with('success', 'Unit deleted successfully.');
    }
}
