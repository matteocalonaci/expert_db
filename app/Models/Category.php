<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id', // Riferimento alla categoria padre
    ];

    // Relazione con le sottocategorie
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    // Relazione per la categoria padre
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Relazione per i prodotti (se i prodotti sono associati alle sottocategorie)
    public function products()
    {
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }
}
