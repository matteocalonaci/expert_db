<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subcategory;

class SubcategorySeeder extends Seeder
{
    public function run()
    {
        // Sottocategorie per Elettronica
        Subcategory::create(['name' => 'Smartphone', 'slug' => 'smartphone', 'category_id' => 1]); // Assicurati di usare l'ID corretto
        Subcategory::create(['name' => 'Tablet', 'slug' => 'tablet', 'category_id' => 1]);
        Subcategory::create(['name' => 'Computer', 'slug' => 'computer', 'category_id' => 1]);

        // Sottocategorie per Elettrodomestici
        Subcategory::create(['name' => 'Frigoriferi', 'slug' => 'frigoriferi', 'category_id' => 2]);
        Subcategory::create(['name' => 'Lavastoviglie', 'slug' => 'lavastoviglie', 'category_id' => 2]);
        Subcategory::create(['name' => 'Forni', 'slug' => 'forni', 'category_id' => 2]);
    }
}
