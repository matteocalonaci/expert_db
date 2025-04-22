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
        OrderDetail::truncate();
        Product::truncate();
        Subcategory::truncate();
        Category::truncate();

        // ✅ Riabilita i vincoli
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 📦 Categorie principali
        $elettronica = Category::create(['name' => 'Elettronica']);
        $elettrodomestici = Category::create(['name' => 'Elettrodomestici']);
        $ped = Category::create(['name' => 'Ped']);

        // 📂 Sottocategorie per Elettronica
        Subcategory::create(['name' => 'Smartphone', 'slug' => 'smartphone', 'category_id' => $elettronica->id]);
        Subcategory::create(['name' => 'Tablet', 'slug' => 'tablet', 'category_id' => $elettronica->id]);
        Subcategory::create(['name' => 'Computer', 'slug' => 'computer', 'category_id' => $elettronica->id]);
        Subcategory::create(['name' => 'Televisori', 'slug' => 'televisori', 'category_id' => $elettronica->id]);
        Subcategory::create(['name' => 'Cuffie e auricolari', 'slug' => 'cuffie-e-auricolari', 'category_id' => $elettronica->id]);
        Subcategory::create(['name' => 'Smartwatch', 'slug' => 'smartwatch', 'category_id' => $elettronica->id]);
        Subcategory::create(['name' => 'Console per videogiochi', 'slug' => 'console-per-videogiochi', 'category_id' => $elettronica->id]);
        Subcategory::create(['name' => 'Macchine fotografiche', 'slug' => 'macchine-fotografiche', 'category_id' => $elettronica->id]);
        Subcategory::create(['name' => 'Videocamere', 'slug' => 'videocamere', 'category_id' => $elettronica->id]);
        Subcategory::create(['name' => 'Accessori per PC', 'slug' => 'accessori-per-pc', 'category_id' => $elettronica->id]);



        // 📂 Sottocategorie per Elettrodomestici
        Subcategory::create(['name' => 'Frigoriferi', 'slug' => 'frigoriferi', 'category_id' => $elettrodomestici->id]);
        Subcategory::create(['name' => 'Lavastoviglie', 'slug' => 'lavastoviglie', 'category_id' => $elettrodomestici->id]);
        Subcategory::create(['name' => 'Forni', 'slug' => 'forni', 'category_id' => $elettrodomestici->id]);
        Subcategory::create(['name' => 'Lavatrici', 'slug' => 'lavatrici', 'category_id' => $elettrodomestici->id]);
        Subcategory::create(['name' => 'Asciugatrici', 'slug' => 'asciugatrici', 'category_id' => $elettrodomestici->id]);
        Subcategory::create(['name' => 'Congelatori', 'slug' => 'congelatori', 'category_id' => $elettrodomestici->id]);
        Subcategory::create(['name' => 'Cappe da cucina', 'slug' => 'cappe-da-cucina', 'category_id' => $elettrodomestici->id]);
        Subcategory::create(['name' => 'Piani cottura', 'slug' => 'piani-cottura', 'category_id' => $elettrodomestici->id]);


        // 📂 Sottocategorie per Piccoli Elettrodomestici (PED)
        Subcategory::create(['name' => 'Ferri da stiro', 'slug' => 'ferri-da-stiro', 'category_id' => $ped->id]);
        Subcategory::create(['name' => 'Aspirapolvere', 'slug' => 'aspirapolvere', 'category_id' => $ped->id]);
        Subcategory::create(['name' => 'Microonde', 'slug' => 'microonde', 'category_id' => $ped->id]);
        Subcategory::create(['name' => 'Frullatori', 'slug' => 'frullatori', 'category_id' => $ped->id]);
        Subcategory::create(['name' => 'Macchine da caffè', 'slug' => 'macchine-caffe', 'category_id' => $ped->id]);
        Subcategory::create(['name' => 'Tostapane', 'slug' => 'tostapane', 'category_id' => $ped->id]);
        Subcategory::create(['name' => 'Centrifughe', 'slug' => 'centrifughe', 'category_id' => $ped->id]);
        Subcategory::create(['name' => 'Spremiagrumi', 'slug' => 'spremiagrumi', 'category_id' => $ped->id]);
        Subcategory::create(['name' => 'Grattugie elettriche', 'slug' => 'grattugie-elettriche', 'category_id' => $ped->id]);
        Subcategory::create(['name' => 'Macchine per il pane', 'slug' => 'macchine-pane', 'category_id' => $ped->id]);
        Subcategory::create(['name' => 'Robot da cucina', 'slug' => 'robot-da-cucina', 'category_id' => $ped->id]);
    }
}
