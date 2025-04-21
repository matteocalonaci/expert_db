<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Subcategory;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Assicurati che le sottocategorie siano già create
        $smartphoneCategory = Subcategory::where('slug', 'smartphone')->first();
        $tabletCategory = Subcategory::where('slug', 'tablet')->first();
        $computerCategory = Subcategory::where('slug', 'computer')->first();
        $frigoriferoCategory = Subcategory::where('slug', 'frigoriferi')->first();
        $lavastoviglieCategory = Subcategory::where('slug', 'lavastoviglie')->first();
        $fornoCategory = Subcategory::where('slug', 'forni')->first();

        // Prodotti per Smartphone
        $this->createProduct([
            'name' => 'SAMSUNG GALAXY S23 8+256GB CREAM',
            'description' => 'Smartphone con display da 6.1 pollici, 8+256GB di memoria.',
            'price' => 889.99,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP809626.jpg?d=400x400',
            'available_quantity' => 50,
            'brand' => 'Samsung',
            'subcategory_id' => $smartphoneCategory->id,
        ]);

        $this->createProduct([
            'name' => 'APPLE IPHONE 13 128GN MEZZANOTTE',
            'description' => 'Smartphone con fotocamera da 12MP e 128GB di memoria.',
            'price' => 595.90,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP760125.jpg?d=400x400',
            'available_quantity' => 30,
            'brand' => 'Apple',
            'subcategory_id' => $smartphoneCategory->id,
        ]);

        // Prodotti per Tablet
        $this->createProduct([
            'name' => 'APPLE IPAD PRO 11 WI-FI 256GB STANDARD GLASS - NERO SIDERALE',
            'description' => 'Tablet con schermo Retina e 256GB di memoria.',
            'price' => 1158.90,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP857421.jpg?d=400x400',
            'available_quantity' => 20,
            'brand' => 'Apple',
            'subcategory_id' => $tabletCategory->id,
        ]);

        $this->createProduct([
            'name' => 'SAMSUNG GALAXY TAB S8 WIFI',
            'description' => 'Tablet con display da 11 pollici e 128GB di memoria.',
            'price' => 823.90,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP793745.jpg?d=400x400',
            'available_quantity' => 25,
            'brand' => 'Samsung',
            'subcategory_id' => $tabletCategory->id,
        ]);

        // Prodotti per Computer
        $this->createProduct([
            'name' => 'HP Omen 16-wd0006nl 16.1", intel core i7, 32gb ram, 1tb ssd, nvidia geforce rtx 4060, fhd',
            'description' => 'Gaming notebook, windows 11 home, 16.1", intel core i7, 32gb ram, 1tb ssd, nvidia geforce rtx 4060, fhd',
            'price' => 1399.00,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP848825.jpg?d=400x400',
            'available_quantity' => 15,
            'brand' => 'HP',
            'subcategory_id' => $computerCategory->id,
        ]);

        $this->createProduct([
            'name' => 'APPLE MACBOOK AIR 13" (M1 7-CORE, 256GB SSD, 8GB RAM) - GRIGIO SIDERALE (2020)',
            'description' => 'notebook schermo 13.3, m1, velocità 0 GHz, ram 8 GB, hdd 256 GB SSD, colore grigio siderale',
            'price' => 999.99,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP730003.jpg?d=400x400',
            'available_quantity' => 10,
            'brand' => 'Apple',
            'subcategory_id' => $computerCategory->id,
        ]);

        // Prodotti per Frigoriferi
        $this->createProduct([
            'name' => 'LG GSLV90PZAD FRIGO SIDE BY SIDE 634L ACCAIO INOX',
            'description' => 'Frigorifero con tecnologia di raffreddamento avanzata.',
            'price' => 1299.99,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP794663.jpg?d=400x400',
            'available_quantity' => 10,
            'brand' => 'LG',
            'subcategory_id' => $frigoriferoCategory->id,
        ]);

        // Prodotti per Lavastoviglie
        $this->createProduct([
            'name' => 'BOSCH SMS4EMI01E SERIE 4 LAVASTOVIGLIE',
            'description' => 'lavastoviglie da libera installazione 60 cm acciaio classe C',
            'price' => 539.90,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP834765.jpg?d=400x400',
            'available_quantity' => 8,
            'brand' => 'Bosch',
            'subcategory_id' => $lavastoviglieCategory->id,
        ]);

        // Prodotti per Forni
        $this->createProduct([
            'name' => 'WHIRLPOOL FORNO DA INCASSO - OMSR58RU1SB',
            'description' => 'forno elettrico, classe energetica A +, 8 programmi, multifunzione ventilato, porta forno in vetro triplo, grill elettrico, sistema di pulizia forno pirolitico, larg. 59.5 alt. 59.5 prof. 55.1 cm',
            'price' => 497.90,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP816412.jpg?d=400x400',
            'available_quantity' => 12,
            'brand' => 'Whirlpool',
            'subcategory_id' => $fornoCategory->id,
        ]);
    }

    private function createProduct(array $data)
    {
        Product::create($data);
    }
}
