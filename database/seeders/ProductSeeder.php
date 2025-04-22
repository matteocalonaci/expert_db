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
        $aspirapolvereCategory = Subcategory::where('slug', 'aspirapolvere')->first();
        $microondeCategory = Subcategory::where('slug', 'microonde')->first();
        $ferriDaStiroCategory = Subcategory::where('slug', 'ferri-da-stiro')->first();
        $frigoriferiCategory = Subcategory::where('slug', 'frigoriferi')->first();

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

        $this->createProduct([
            'name' => 'XIAOMI Redmi a3 star blue 4gb ram 128gb rom',
            'description' => 'Smartphone con display LCD da 6.71", 128 GB di memoria RAM, Bluetooth 5.4, 4G-LTE e supporto Dual SIM. Sistema operativo Android. Fotocamera posteriore da 8 MP e fotocamera frontale da 5 MP. Processore octa-core da 2.2 GHz e batteria da 5000 mAh. Colore Star Blue.',
            'price' => 156.90,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP849398.jpg?d=800x800',
            'available_quantity' => 50,
            'brand' => 'Xiaomi',
            'subcategory_id' => $smartphoneCategory->id,
        ]);

        $this->createProduct([
            'name' => 'Samsung Galaxy Z Flip 5 256GB',
            'description' => 'Smartphone pieghevole con display Dynamic AMOLED 2X e 256GB di memoria.',
            'price' => 1105.90,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP861441.jpg?d=400x400',
            'available_quantity' => 20,
            'brand' => 'Samsung',
            'subcategory_id' => $smartphoneCategory->id,
        ]);

        $this->createProduct([
            'name' => 'VIVO V21 128GB',
            'description' => 'Smartphone con display AMOLED da 6.44", 128 GB di memoria interna e 8 GB di RAM. Connettività Bluetooth 5.1, 4G-LTE e 5G-LTE. Supporto Dual SIM. Sistema operativo Android 11. Fotocamera posteriore da 64 MP e frontale da 44 MP. Processore octa-core da 2.4 GHz. Colore Dusk Blue.',
            'price' => 649.00,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP747152.jpg?d=400x400',
            'available_quantity' => 30,
            'brand' => 'Vivo',
            'subcategory_id' => $smartphoneCategory->id,
        ]);

        $this->createProduct([
            'name' => 'OPPO Find x5 lite',
            'description' => 'Smartphone con display AMOLED da 6.43", 256 GB di memoria interna e 8 GB di RAM. Connettività Bluetooth 5.2, 4G-LTE e 5G-LTE. Supporto Dual SIM. Sistema operativo Android 11 con interfaccia ColorOS 12.1. Fotocamera posteriore da 64 MP. Processore octa-core da 2.4 GHz. Colore Startrails Blue.',
            'price' => 359.90,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP779098.jpg?d=400x400',
            'available_quantity' => 40,
            'brand' => 'Oppo',
            'subcategory_id' => $smartphoneCategory->id,
        ]);

        $this->createProduct([
            'name' => 'Oppo Find X5 Pro 5G 256GB',
            'description' => 'Smartphone con fotocamera principale da 50MP e display AMOLED da 6.7 pollici.',
            'price' => 1099.00,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP825516.jpg?d=400x400',
            'available_quantity' => 25,
            'brand' => 'Oppo',
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

        $this->createProduct([
            'name' => 'APPLE IPAD AIR 5',
            'description' => 'Tablet con display Retina da 10.9 pollici e 64GB di memoria.',
            'price' => 599.00,
            'image' => 'https://example.com/image/ipad_air_5.jpg',
            'available_quantity' => 30,
            'brand' => 'Apple',
            'subcategory_id' => $tabletCategory->id,
        ]);

        $this->createProduct([
            'name' => 'LENOVO Tab m11 - tb330fu + tab pen',
            'description' => 'Tablet con schermo da 10.95", 8 GB di RAM e 128 GB di memoria interna. Processore MediaTek Helio G88 e Bluetooth 5.1. Peso netto di 0.465 Kg. Connettività Wi-Fi 5 (802.11ac). Modulo G non presente.',
            'price' => 185.90,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP849405.jpg?d=400x400',
            'available_quantity' => 40,
            'brand' => 'Lenovo',
            'subcategory_id' => $tabletCategory->id,
        ]);

        $this->createProduct([
            'name' => 'SAMSUNG GALAXY TAB S7 FE',
            'description' => 'Tablet con display TFT da 12.4 pollici e 64GB di memoria.',
            'price' => 556.90,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP884574.jpg?d=400x400',
            'available_quantity' => 20,
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

        $this->createProduct([
            'name' => 'ASUS Notebook vivobook display 16" con processore intel®core™ i7-1255u e 16gb ram',
            'description' => 'Notebook con schermo 13.4", processore Intel Core i7, 16GB di RAM, 512GB SSD, colore argento',
            'price' => 799.99,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP807790.jpg?d=400x400g',
            'available_quantity' => 15,
            'brand' => 'Asus',
            'subcategory_id' => $computerCategory->id,
        ]);

        $this->createProduct([
            'name' => 'HP Victus 15-fa1030nl gaming notebook',
            'description' => 'Notebook con schermo da 15.6", processore Intel Core i7-13700H a 14 core e 20 thread con velocità di 2.4 GHz. 16 GB di RAM e 512 GB di SSD PCI Express. Connettività Ethernet 10/100/1000 e porta HDMI standard. Colore Mica Silver.',
            'price' => 1149.90,
            'image' => 'https://d3s2y7lmzr67yx.cloudfront.net/IMG/EXPERT/PRODUCTS/HD/EXP842925.jpg?d=400x400',
            'available_quantity' => 12,
            'brand' => 'HP',
            'subcategory_id' => $computerCategory->id,
        ]);

        $this->createProduct([
            'name' => 'ACER Notebook aspire 3 a315-59-523q - 15.6 pollici - silver',
            'description' => 'Processore a 1.3 GHz, 16 GB di RAM, 512 GB SSD PCIe. Connessione Ethernet 10/100/1000 e HDMI. Colore silver. Perfetto per prestazioni elevate e design elegante.',
            'price' => 499.90,
            'image' => 'https://example.com/image/lenovo_thinkpad_x1_carbon.jpg',
            'available_quantity' => 8,
            'brand' => 'Acer',
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
