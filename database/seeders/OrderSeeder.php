<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // Creazione di ordini
        for ($i = 1; $i <= 10; $i++) {
            Order::create([
                'user_id' => User::inRandomOrder()->first()->id, // Associa un utente casuale
                'customer_name' => 'Nome Cliente ' . $i, // Nome cliente fittizio
                'customer_email' => 'cliente' . $i . '@esempio.com', // Email fittizia
                'shipping_address' => 'Indirizzo di Spedizione ' . $i, // Indirizzo fittizio
                'order_date' => now(), // Data dell'ordine
                'order_status' => 'Processing', // Stato dell'ordine
                'total' => random_int(100, 1000), // Importo totale casuale
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
