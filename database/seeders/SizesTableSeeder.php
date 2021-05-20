<?php

namespace Database\Seeders;
use App\Models\Size;
use Illuminate\Database\Seeder;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Size = Size::create([
            'name' => 'Extra-Small',
            'slug' => 'Extra-Small',
        ]);
        $Size = Size::create([
            'name' => 'Small',
            'slug' => 'Small',
        ]);
        $Size = Size::create([
            'name' => 'Medium',
            'slug' => 'Medium',
        ]);
        $Size = Size::create([
            'name' => 'Large',
            'slug' => 'Large',
        ]);
        $Size = Size::create([
            'name' => 'Extra-Large',
            'slug' => 'Extra-Large',
        ]);
    }
}
