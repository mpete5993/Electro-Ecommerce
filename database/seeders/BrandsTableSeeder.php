<?php

namespace Database\Seeders;
use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $brands = Brand::create([
            'name' => 'Sumsang',
            'slug' => 'sumsang',
        ]);
        $brands = Brand::create([
            'name' => 'LG',
            'slug' => 'LG',
        ]);
        $brands = Brand::create([
            'name' => 'Lenovo',
            'slug' => 'Lenovo',
        ]);
        $brands = Brand::create([
            'name' => 'Hisense',
            'slug' => 'Hisense',
        ]);
        $brands = Brand::create([
            'name' => 'Canon',
            'slug' => 'Canon',
        ]);

        $brands = Brand::create([
            'name' => 'Asus',
            'slug' => 'Asus',
        ]);
        $brands = Brand::create([
            'name' => 'HP',
            'slug' => 'HP',
        ]);
        $brands = Brand::create([
            'name' => 'Apple',
            'slug' => 'Apple',
        ]);
        $brands = Brand::create([
            'name' => 'MSI',
            'slug' => 'MSI',
        ]);
        $brands = Brand::create([
            'name' => 'Acer',
            'slug' => 'Acer',
        ]);
    }
}
