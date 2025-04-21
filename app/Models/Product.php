<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'available_quantity',
        'subcategory_id',
        'image',
        'brand',
    ];

    // Relazione con la sottocategoria
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    // Relazione con la categoria (attraverso la sottocategoria)
    public function category()
    {
        return $this->hasOneThrough(Category::class, Subcategory::class, 'id', 'id', 'subcategory_id', 'category_id');
    }

    // Relazione con i dettagli dell'ordine
    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
