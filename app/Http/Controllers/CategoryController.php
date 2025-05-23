<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('subcategories')->get(); // Carica le categorie con le sottocategorie
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostra il modulo per creare una nuova categoria
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validazione dei dati
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255', // Aggiunto per la descrizione se necessario
            'parent_id' => 'nullable|exists:categories,id', // Permette di specificare una categoria padre
        ]);

        // Crea una nuova categoria
        Category::create($request->only('name', 'description', 'parent_id'));

        // Reindirizza alla lista delle categorie con un messaggio di successo
        return redirect()->route('admin.categories.index')->with('success', 'Categoria creata con successo.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // Mostra i dettagli di una categoria specifica
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // Mostra il modulo per modificare una categoria esistente
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Validazione dei dati
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255', // Aggiunto per la descrizione se necessario
            'parent_id' => 'nullable|exists:categories,id', // Permette di specificare una categoria padre
        ]);

        // Aggiorna la categoria esistente
        $category->update($request->only('name', 'description', 'parent_id'));

        // Reindirizza alla lista delle categorie con un messaggio di successo
        return redirect()->route('admin.categories.index')->with('success', 'Categoria aggiornata con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Elimina la categoria
        $category->delete();

        // Reindirizza alla lista delle categorie con un messaggio di successo
        return redirect()->route('admin.categories.index')->with('success', 'Categoria eliminata con successo.');
    }
}
