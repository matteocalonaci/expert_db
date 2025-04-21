<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subcategory;

class SubcategorySeeder extends Seeder
{
    public function run()
    {
        // Sottocategorie per Elettronica
        $this->createSubcategory('smartphone', 'Smartphone', 1);
        $this->createSubcategory('tablet', 'Tablet', 1);
        $this->createSubcategory('computer', 'Computer', 1);

        // Sottocategorie per Elettrodomestici
        $this->createSubcategory('frigoriferi', 'Frigoriferi', 2);
        $this->createSubcategory('lavastoviglie', 'Lavastoviglie', 2);
        $this->createSubcategory('forni', 'Forni', 2);
    }

    private function createSubcategory($slug, $name, $categoryId)
    {
        Subcategory::updateOrCreate(
            ['slug' => $slug],
            ['name' => $name, 'category_id' => $categoryId]
        );
    }
}
