<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Categorie principali
        $elettronica = Category::create(['name' => 'Elettronica']);
        $elettrodomestici = Category::create(['name' => 'Elettrodomestici']);

        // Sottocategorie per Elettronica
        $smartphone = Category::create(['name' => 'Smartphone', 'parent_category_id' => $elettronica->id]);
        $tablet = Category::create(['name' => 'Tablet', 'parent_category_id' => $elettronica->id]);
        $computer = Category::create(['name' => 'Computer', 'parent_category_id' => $elettronica->id]);

        // Sottocategorie per Elettrodomestici
        $frigoriferi = Category::create(['name' => 'Frigoriferi', 'parent_category_id' => $elettrodomestici->id]);
        $lavastoviglie = Category::create(['name' => 'Lavastoviglie', 'parent_category_id' => $elettrodomestici->id]);
        $forni = Category::create(['name' => 'Forni', 'parent_category_id' => $elettrodomestici->id]);
    }
}
