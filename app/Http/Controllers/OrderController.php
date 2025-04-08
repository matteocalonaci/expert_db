<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recupera tutti gli ordini dal database
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostra il modulo per creare un nuovo ordine
        return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validazione dei dati
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'total_amount' => 'required|numeric',
            // Aggiungi altre regole di validazione se necessario
        ]);

        // Crea un nuovo ordine
        Order::create($request->only('customer_name', 'total_amount'));

        // Reindirizza alla lista degli ordini con un messaggio di successo
        return redirect()->route('admin.orders.index')->with('success', 'Ordine creato con successo.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        // Mostra i dettagli di un ordine specifico
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        // Mostra il modulo per modificare un ordine esistente
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        // Validazione dei dati
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'total_amount' => 'required|numeric',
            // Aggiungi altre regole di validazione se necessario
        ]);

        // Aggiorna l'ordine esistente
        $order->update($request->only('customer_name', 'total_amount'));

        // Reindirizza alla lista degli ordini con un messaggio di successo
        return redirect()->route('admin.orders.index')->with('success', 'Ordine aggiornato con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        // Elimina l'ordine
        $order->delete();

        // Reindirizza alla lista degli ordini con un messaggio di successo
        return redirect()->route('admin.orders.index')->with('success', 'Ordine eliminato con successo.');
    }
}
