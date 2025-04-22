<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $subcategoryId = $request->get('subcategory_id');
        $products = Product::when($subcategoryId, function ($query) use ($subcategoryId) {
            return $query->where('subcategory_id', $subcategoryId);
        })->get();

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
            'image' => 'nullable|url',  // Cambia la validazione per accettare solo URL
            // Aggiungi altre regole di validazione se necessario
        ]);

        // Salva il link dell'immagine (se fornito)
        $imageUrl = $request->input('image');  // Se l'utente fornisce un URL, lo salviamo

        // Crea un nuovo prodotto
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'available_quantity' => $request->stock,
            'subcategory_id' => $request->subcategory_id,  // Se hai il campo subcategory_id
            'image' => $imageUrl,  // Salva l'URL
            'brand' => $request->brand,
        ]);

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
        // Recupera tutte le sottocategorie per il campo select
        $subcategories = Subcategory::all();

        // Mostra il modulo per modificare un prodotto esistente
        return view('admin.products.edit', compact('product', 'subcategories'));
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
            'brand' => 'nullable|string|max:255',
            'image' => 'nullable|url',
            'subcategory_id' => 'required|exists:subcategories,id',  // Assicurati che il valore della sottocategoria sia valido
        ]);

        // Salva l'URL dell'immagine (se fornito)
        $imageUrl = $request->input('image');  // Se l'utente fornisce un URL, lo salviamo

        // Aggiorna il prodotto esistente
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'available_quantity' => $request->stock,
            'subcategory_id' => $request->subcategory_id,  // Aggiorna la sottocategoria
            'image' => $imageUrl,  // Salva l'URL
            'brand' => $request->brand,
        ]);

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
