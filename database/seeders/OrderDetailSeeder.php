<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Order;

class OrderDetailSeeder extends Seeder
{
    public function run()
    {
        // Creazione di dettagli per ogni ordine
        $orders = Order::all();

        foreach ($orders as $order) {
            for ($j = 1; $j <= random_int(1, 5); $j++) { // Associa da 1 a 5 prodotti per ordine
                // Seleziona un prodotto casuale
                $product = Product::inRandomOrder()->first();

                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id, // Usa l'ID del prodotto selezionato
                    'quantity' => random_int(1, 3), // Quantità casuale
                    'unit_price' => $product->price, // Prezzo del prodotto
                ]);
            }
        }
    }
}
