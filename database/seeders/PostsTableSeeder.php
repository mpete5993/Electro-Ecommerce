<?php

namespace Database\Seeders;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $post = Post::create([
            'Title' => 'smartphone Example 1',
            'slug' => 'smartphone-Example-1',
            'category_id' => '2',
            'content' => '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. 
            Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. 
            Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, 
            sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac,
            ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a,
            luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus,
            eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, 
            est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. 
            In eros metus, gravida a, gravida sed, lobortis id, turpis. Ut ultrices, ipsum at venenatis 
            fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim. Nam turpis.
            Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas elementum. Nunc imperdiet gravida mauris.</p>',
            'image' => 'app/img/blog/1.jpg
            ',
            'published' => true,
            'user_id' => '2'
        ]);
        $post = Post::create([
            'Title' => 'Desktop Example 1',
            'slug' => 'Desktop-Example-1',
            'category_id' => '3',
            'content' => '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. 
            Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. 
            Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, 
            sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac,
            ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a,
            luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus,
            eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, 
            est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. 
            In eros metus, gravida a, gravida sed, lobortis id, turpis. Ut ultrices, ipsum at venenatis 
            fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim. Nam turpis.
            Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas elementum. Nunc imperdiet gravida mauris.</p>',
            'image' => 'app/img/blog/2.jpg
            ',
            'published' => true,
            'user_id' => '6'
        ]);
        $post = Post::create([
            'Title' => 'Drone Example 1',
            'slug' => 'Drone-Example-1',
            'category_id' => '4',
            'content' => '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. 
            Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. 
            Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, 
            sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac,
            ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a,
            luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus,
            eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, 
            est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. 
            In eros metus, gravida a, gravida sed, lobortis id, turpis. Ut ultrices, ipsum at venenatis 
            fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim. Nam turpis.
            Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas elementum. Nunc imperdiet gravida mauris.</p>',
            'image' => 'app/img/blog/3.jpg
            ',
            'published' => true,
            'user_id' => '5'
        ]);
        $post = Post::create([
            'Title' => 'Desktop Example 2',
            'slug' => 'Desktop-Example-2',
            'category_id' => '3',
            'content' => '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. 
            Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. 
            Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, 
            sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac,
            ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a,
            luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus,
            eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, 
            est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. 
            In eros metus, gravida a, gravida sed, lobortis id, turpis. Ut ultrices, ipsum at venenatis 
            fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim. Nam turpis.
            Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas elementum. Nunc imperdiet gravida mauris.</p>',
            'image' => 'app/img/blog/4.jpg
            ',
            'published' => true,
            'user_id' => '5'
        ]);
        $post = Post::create([
            'Title' => 'laptop Example 2',
            'slug' => 'laptop-Example-',
            'category_id' => '1',
            'content' => '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. 
            Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. 
            Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, 
            sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac,
            ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a,
            luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus,
            eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, 
            est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. 
            In eros metus, gravida a, gravida sed, lobortis id, turpis. Ut ultrices, ipsum at venenatis 
            fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim. Nam turpis.
            Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas elementum. Nunc imperdiet gravida mauris.</p>',
            'image' => 'app/img/blog/5.jpg
            ',
            'published' => true,
            'user_id' => '5'
        ]);



    }
}
