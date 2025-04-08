<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'parent_category_id',
    ];

    // Relazione con i prodotti
    public function products()
    {
        return $this->hasMany(Product::class, 'subcategory_id'); // Questo dovrebbe essere 'category_id' se 'subcategory_id' non è corretto
    }

    // Relazione per le sottocategorie
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }
}
