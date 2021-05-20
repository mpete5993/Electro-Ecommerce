<?php

namespace Database\Seeders;
use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Color = Color::create([
            'name' => 'Red',
            'slug' => 'red',
        ]);
        $Color = Color::create([
            'name' => 'Gold',
            'slug' => 'Gold',
        ]);
        $Color = Color::create([
            'name' => 'Black',
            'slug' => 'Black',
        ]);
        $Color = Color::create([
            'name' => 'Blue',
            'slug' => 'Blue',
        ]);
        $Color = Color::create([
            'name' => 'White',
            'slug' => 'White',
        ]);
        $Color = Color::create([
            'name' => 'Silver',
            'slug' => 'Silver',
        ]);
    }
}
