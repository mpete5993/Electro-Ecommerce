<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        $adminRole =  Role::where('name' , 'admin')->first();
        $authorRole =  Role::where('name' , 'author')->first();
        $subscriberRole =  Role::where('name' , 'subscriber')->first();

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
        $author = User::create([
            'name' => 'author',
            'email' => 'author@author.com',
            'password' => bcrypt('password')
        ]);

        $subscriber = User::create([
            'name' => 'subscriber',
            'email' => 'subscriber@subscriber.com',
            'password' => bcrypt('password')
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $subscriber->roles()->attach($subscriberRole);
    }
}
