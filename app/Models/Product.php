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
        'brand'
    ];

    // Relazione con la categoria
    public function category()
    {
        return $this->belongsTo(Category::class, 'subcategory_id');
    }

    // Relazione con i dettagli dell'ordine
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
