<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\OrderDetail;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // 🔧 Disabilita i vincoli di chiave esterna temporaneamente
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // 🔁 Pulisce le tabelle nell’ordine corretto: figli → genitori
        OrderDetail::truncate();   // prima i dettagli ordine
        Product::truncate();       // poi i prodotti
        Subcategory::truncate();   // poi le sottocategorie
        Category::truncate();      // infine le categorie

        // ✅ Riabilita i vincoli
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 📦 Categorie principali
        $elettronica = Category::create(['name' => 'Elettronica']);
        $elettrodomestici = Category::create(['name' => 'Elettrodomestici']);

        // 📂 Sottocategorie per Elettronica
        Subcategory::create(['name' => 'Smartphone', 'slug' => 'smartphone', 'category_id' => $elettronica->id]);
        Subcategory::create(['name' => 'Tablet', 'slug' => 'tablet', 'category_id' => $elettronica->id]);
        Subcategory::create(['name' => 'Computer', 'slug' => 'computer', 'category_id' => $elettronica->id]);

        // 📂 Sottocategorie per Elettrodomestici
        Subcategory::create(['name' => 'Frigoriferi', 'slug' => 'frigoriferi', 'category_id' => $elettrodomestici->id]);
        Subcategory::create(['name' => 'Lavastoviglie', 'slug' => 'lavastoviglie', 'category_id' => $elettrodomestici->id]);
        Subcategory::create(['name' => 'Forni', 'slug' => 'forni', 'category_id' => $elettrodomestici->id]);
    }
}
