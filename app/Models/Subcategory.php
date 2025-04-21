<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory; // Assicurati di includere il trait HasFactory

    // Definisci gli attributi che possono essere assegnati in massa
    protected $fillable = [
        'name',
        'slug',
        'category_id',
    ];

    // Relazione con la categoria principale
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relazione con i prodotti
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
