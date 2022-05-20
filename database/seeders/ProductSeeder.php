<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Laravel y Livewire',
            'cost' => 200,
            'price' => 350,
            'barcode' => 750100,
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 1,
            'image' => 'curso.png'
        ]);

        Product::create([
            'name' => 'Base de datos',
            'cost' => 200,
            'price' => 350,
            'barcode' => 750100,
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 1,
            'image' => 'curso.png'
        ]);


        Product::create([
            'name' => 'NodeJS y Expressjs',
            'cost' => 200,
            'price' => 350,
            'barcode' => 750100,
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 1,
            'image' => 'curso.png'
        ]);
    }
}
