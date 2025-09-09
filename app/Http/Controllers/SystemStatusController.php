<?php

namespace App\Http\Controllers;

use App\Models\SystemStatus;
use Illuminate\Http\Request;

class SystemStatusController extends Controller
{
    public function index()
    {
        $statuses = SystemStatus::paginate();
        return view('system_status.index', compact('statuses'));
    }

    public function create()
    {
        return view('system_status.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        SystemStatus::create($data);

        return redirect()->route('system-status.index')->with('success', 'Status criado com sucesso.');
    }

    public function show(SystemStatus $systemStatus)
    {
        return view('system_status.show', compact('systemStatus'));
    }

    public function edit(SystemStatus $systemStatus)
    {
        return view('system_status.edit', compact('systemStatus'));
    }

    public function update(Request $request, SystemStatus $systemStatus)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $systemStatus->update($data);

        return redirect()->route('system-status.index')->with('success', 'Status atualizado com sucesso.');
    }

    public function destroy(SystemStatus $systemStatus)
    {
        $systemStatus->delete();
        return redirect()->route('system-status.index')->with('success', 'Status deletado com sucesso.');
    }
}
