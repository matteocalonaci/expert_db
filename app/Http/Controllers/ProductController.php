<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recupera tutti i prodotti dal database
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostra il modulo per creare un nuovo prodotto
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validazione dei dati
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            // Aggiungi altre regole di validazione se necessario
        ]);

        // Crea un nuovo prodotto
        Product::create($request->only('name', 'description', 'price', 'stock'));

        // Reindirizza alla lista dei prodotti con un messaggio di successo
        return redirect()->route('admin.products.index')->with('success', 'Prodotto creato con successo.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // Mostra i dettagli di un prodotto specifico
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // Mostra il modulo per modificare un prodotto esistente
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Validazione dei dati
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            // Aggiungi altre regole di validazione se necessario
        ]);

        // Aggiorna il prodotto esistente
        $product->update($request->only('name', 'description', 'price', 'stock'));

        // Reindirizza alla lista dei prodotti con un messaggio di successo
        return redirect()->route('admin.products.index')->with('success', 'Prodotto aggiornato con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Elimina il prodotto
        $product->delete();

        // Reindirizza alla lista dei prodotti con un messaggio di successo
        return redirect()->route('admin.products.index')->with('success', 'Prodotto eliminato con successo.');
    }
}
