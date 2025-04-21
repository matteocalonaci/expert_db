<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category; // Assicurati di importare il modello Category
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Subcategory::with('category')->get(); // Ottieni tutte le sottocategorie con le categorie associate
        return view('admin.subcategories.index', compact('subcategories')); // Ritorna la vista con le sottocategorie
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ottieni solo le categorie principali (senza parent_id)
        $categories = Category::whereNull('parent_id')->get();
        return view('admin.subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:subcategories',
            'category_id' => 'required|exists:categories,id', // Assicurati che la categoria esista
        ]);

        Subcategory::create($request->all()); // Crea la sottocategoria
        return redirect()->route('admin.subcategories.index')->with('success', 'Sottocategoria creata con successo.'); // Reindirizza con messaggio di successo
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        return view('admin.subcategories.show', compact('subcategory')); // Ritorna la vista per mostrare la sottocategoria
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        // Ottieni solo le categorie principali (senza parent_id)
        $categories = Category::whereNull('parent_id')->get();
        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        // Validazione dei dati
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:subcategories,slug,' . $subcategory->id,
            'category_id' => 'required|exists:categories,id',
        ]);

        // Aggiorna la sottocategoria
        $subcategory->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.subcategories.index')->with('success', 'Sottocategoria aggiornata con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete(); // Elimina la sottocategoria
        return redirect()->route('admin.subcategories.index')->with('success', 'Sottocategoria eliminata con successo.'); // Reindirizza con messaggio di successo
    }
}
