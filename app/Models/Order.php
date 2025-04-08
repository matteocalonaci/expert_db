<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_name',
        'customer_email',
        'shipping_address',
        'order_date',
        'order_status',
        'total',
    ];

    // Relazione con l'utente
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relazione con i dettagli dell'ordine
    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
