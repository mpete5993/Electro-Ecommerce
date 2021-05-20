<?php

namespace Database\Seeders;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tags = Tag::create([
            'name' => 'Laptop',
            'slug' => 'Laptop',
        ]);
        $tags = Tag::create([
            'name' => 'Sumsang',
            'slug' => 'sumsang',
        ]);
        $tags = Tag::create([
            'name' => 'LG',
            'slug' => 'LG',
        ]);
        $tags = Tag::create([
            'name' => 'Hisense',
            'slug' => 'Hisense',
        ]);
        $tags = Tag::create([
            'name' => 'Canon',
            'slug' => 'Canon',
        ]);
        $tags = Tag::create([
            'name' => 'Smartphone',
            'slug' => 'smartphone',
        ]);
        $tags = Tag::create([
            'name' => 'Desktop',
            'slug' => 'Desktop',
        ]);
        $tags = Tag::create([
            'name' => 'Accessory',
            'slug' => 'Accessory',
        ]);
        $tags = Tag::create([
            'name' => 'Tablet',
            'slug' => 'Tablet',
        ]);
        $tags = Tag::create([
            'name' => 'Tv\'s',
            'slug' => 'Tv\'s',
        ]);
    }
}
