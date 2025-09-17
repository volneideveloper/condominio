<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::paginate();
        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = $request->validate([
        //     'description' => 'required|string|max:255',
        //     'amount' => 'required|numeric',
        //     'payment_date' => 'nullable|date',
        //     'due_date' => 'date',
        //     'system_status_id' => 'required|integer|exists:system_statuses,id',
        //     'user_id' => 'required|integer|exists:users,id',
        //     'condominium_id' => 'required|integer|exists:condominiums,id',
        //     'payment_slip' => 'nullable|file|max:2048',
        // ]);

        $data = $request->all();

        // Se tiver imagem, salva no disco public
        if ($request->hasFile('payment_slip')) {
            $data['payment_slip'] = $request->file('payment_slip')->store('images/payments', 'public');
        }

        Payment::create($data);

        return redirect()->route('payments.index')->with('success', 'Pagamento criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = Payment::findOrFail($id);
        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = Payment::findOrFail($id);
        return view('payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payment = Payment::findOrFail($id);

        // $data = $request->validate([
        //     'description' => 'required|string|max:255',
        //     'amount' => 'required|numeric',
        //     'payment_date' => 'nullable|date',
        //     'due_date' => 'date',
        //     'system_status_id' => 'required|integer|exists:system_statuses,id',
        //     'user_id' => 'required|integer|exists:users,id',
        //     'condominium_id' => 'required|integer|exists:condominiums,id',
        //     'payment_slip' => 'nullable|file|max:2048',
        // ]);

        $data = $request->all();

        // Se tiver imagem, salva no disco public
        if ($request->hasFile('payment_slip')) {
            $data['payment_slip'] = $request->file('payment_slip')->store('images/payments', 'public');
        }

        $payment->update($data);

        return redirect()->route('payments.index')->with('success', 'Pagamento atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('payments.index')->with('success', 'Pagamento deletado com sucesso.');
    }
}
