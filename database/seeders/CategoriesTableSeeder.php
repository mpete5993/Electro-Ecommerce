<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category = Category::create([
            'name' => 'Accessories',
            'slug' => 'Accessories',
        ]);
        
        $category = Category::create([
            'name' => 'Laptop',
            'slug' => 'Laptop',
        ]);
        $category = Category::create([
            'name' => 'Smartphone',
            'slug' => 'smartphone',
        ]);
        $category = Category::create([
            'name' => 'Desktop',
            'slug' => 'Desktop',
        ]);
        
        $category = Category::create([
            'name' => 'Tablet',
            'slug' => 'Tablet',
        ]);
        $category = Category::create([
            'name' => 'Tv\'s',
            'slug' => 'Tv\'s',
        ]);
        $category = Category::create([
            'name' => 'iPhone',
            'slug' => 'iPhone',
        ]);
        $category = Category::create([
            'name' => 'Smartwatch',
            'slug' => 'Smartwatch',
        ]);
        $category = Category::create([
            'name' => 'Cameras',
            'slug' => 'Cameras',
        ]);
        $category = Category::create([
            'name' => 'Hot Deals',
            'slug' => 'Hot-deals',
        ]);
        $category = Category::create([
            'name' => 'Head phones',
            'slug' => 'Head-phones',
        ]);
    }
}
