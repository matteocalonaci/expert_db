<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Assicurati che le categorie siano già create
        $smartphoneCategory = Category::where('name', 'Smartphone')->first();
        $tabletCategory = Category::where('name', 'Tablet')->first();
        $computerCategory = Category::where('name', 'Computer')->first();
        $frigoriferoCategory = Category::where('name', 'Frigoriferi')->first();
        $lavastoviglieCategory = Category::where('name', 'Lavastoviglie')->first();
        $fornoCategory = Category::where('name', 'Forni')->first();

        // Prodotti per Smartphone
        Product::create([
            'name' => 'SAMSUNG GALAXY S23 8+256GB CREAM',
            'description' => 'Display AMOLED 6.1", 8GB RAM, 256GB storage, fotocamera principale 50MP, batteria 3900mAh, Android 13.',
            'price' => 889.99,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP809626.jpg?d=400x400',
            'available_quantity' => 50,
            'brand' => 'Samsung',
            'subcategory_id' => $smartphoneCategory->id,
        ]);

        Product::create([
            'name' => 'APPLE IPHONE 13 128GN MEZZANOTTE',
            'description' => 'Display Super Retina XDR 6.1", 128GB storage, fotocamera doppia 12MP, chip A15 Bionic, batteria a lunga durata.',
            'price' => 595.90,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP760125.jpg?d=400x400',
            'available_quantity' => 30,
            'brand' => 'Apple',
            'subcategory_id' => $smartphoneCategory->id,
        ]);

        // Prodotti per Tablet
        Product::create([
            'name' => 'APPLE IPAD PRO 11 WI-FI 256GB STANDARD GLASS - NERO SIDERALE',
            'description' => 'Display Liquid Retina 11", 256GB storage, chip M1, supporto Apple Pencil, batteria fino a 10 ore.',
            'price' => 1158.90,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP857421.jpg?d=400x400',
            'available_quantity' => 20,
            'brand' => 'Apple',
            'subcategory_id' => $tabletCategory->id,
        ]);

        Product::create([
            'name' => 'SAMSUNG GALAXY TAB S8 WIFI',
            'description' => 'Display LCD 11", 128GB storage, S Pen inclusa, batteria 8000mAh, Android 12.',
            'price' => 823.90,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP793745.jpg?d=400x400',
            'available_quantity' => 25,
            'brand' => 'Samsung',
            'subcategory_id' => $tabletCategory->id,
        ]);

        // Prodotti per Computer
        Product::create([
            'name' => 'HP Omen 16-wd0006nl 16.1"',
            'description' => 'Display 16.1", Intel Core i7, 32GB RAM, 1TB SSD, NVIDIA GeForce RTX 4060, Windows 11 Home.',
            'price' => 1399.00,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP848825.jpg?d=400x400',
            'available_quantity' => 15,
            'brand' => 'HP',
            'subcategory_id' => $computerCategory->id,
        ]);

        Product::create([
            'name' => 'APPLE MACBOOK AIR 13" (M1 7-CORE, 256GB SSD, 8GB RAM) - GRIGIO SIDERALE (2020)',
            'description' => 'Display Retina 13.3", chip M1, 256GB SSD, 8GB RAM, batteria fino a 18 ore, design ultra-sottile e leggero.',
            'price' => 999.99,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP730003.jpg?d=400x400',
            'available_quantity' => 10,
            'brand' => 'Apple',
            'subcategory_id' => $computerCategory->id,
        ]);

        // Prodotti per Frigoriferi
        Product::create([
            'name' => 'LG GSLV90PZAD FRIGO SIDE BY SIDE 634L ACCIAIO INOX',
            'description' => 'Capacità 634L, tecnologia di raffreddamento No Frost, dispenser acqua e ghiaccio, classe energetica E.',
            'price' => 1299.99,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP794663.jpg?d=400x400',
            'available_quantity' => 10,
            'brand' => 'LG',
            'subcategory_id' => $frigoriferoCategory->id,
        ]);

        // Prodotti per Lavastoviglie
        Product::create([
            'name' => 'BOSCH SMS4EMI01E SERIE 4 LAVASTOVIGLIE',
            'description' => 'Lavastoviglie da libera installazione, 60 cm, classe energetica C, 13 coperti, programma Eco, silenziosa.',
            'price' => 539.90,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP834765.jpg?d=400x400',
            'available_quantity' => 8,
            'brand' => 'Bosch',
            'subcategory_id' => $lavastoviglieCategory->id,
        ]);

        // Prodotti per Forni
        Product::create([
            'name' => 'WHIRLPOOL FORNO DA INCASSO - OMSR58RU1SB',
            'description' => 'Forno elettrico da incasso, classe energetica A+, 8 programmi di cottura, sistema di pulizia pirolitico.',
            'price' => 497.90,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP816412.jpg?d=400x400',
            'available_quantity' => 12,
            'brand' => 'Whirlpool',
            'subcategory_id' => $fornoCategory->id,
        ]);
    }
}
