<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recupera tutti i dettagli degli ordini dal database
        $orderDetails = OrderDetail::all();
        return view('admin.order_details.index', compact('orderDetail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostra il modulo per creare un nuovo dettaglio ordine
        return view('admin.order_details.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validazione dei dati
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
        ]);

        // Crea un nuovo dettaglio ordine
        OrderDetail::create($request->only('order_id', 'product_id', 'quantity', 'price'));

        // Reindirizza alla lista dei dettagli ordine con un messaggio di successo
        return redirect()->route('admin.order_details.index')->with('success', 'Dettaglio ordine creato con successo.');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderDetail $orderDetails)
    {
        // Mostra i dettagli di un ordine specifico
        return view('admin.order_details.show', compact('orderDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderDetail $orderDetails)
    {
        // Mostra il modulo per modificare un dettaglio ordine esistente
        return view('admin.order_details.edit', compact('orderDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderDetail $orderDetails)
    {
        // Validazione dei dati
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
        ]);

        // Aggiorna il dettaglio ordine esistente
        $orderDetails->update($request->only('order_id', 'product_id', 'quantity', 'price'));

        // Reindirizza alla lista dei dettagli ordine con un messaggio di successo
        return redirect()->route('admin.order_details.index')->with('success', 'Dettaglio ordine aggiornato con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderDetail $orderDetails)
    {
        // Elimina il dettaglio ordine
        $orderDetails->delete();

        // Reindirizza alla lista dei dettagli ordine con un messaggio di successo
        return redirect()->route('admin.order_detail.index')->with('success', 'Dettaglio ordine eliminato con successo.');
    }
}
