<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //accessories
        Product::create([          
            'product_name' => 'accessory_01',
            'slug' => 'accessory-01',
            'image' => 'app/img/products/accessory01.jpg',
            'previous_price' => '500',
            'current_price' => '400',
            'brand_id' => '5',
            'details' => '150 Inch, 1TB SSD, 32GB RAM',
            'Description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate unde minus quas, 
            expedita eius non et laudantium ad illum nostrum, adipisci, praesentium ipsam nihil ullam cum consectetur 
            deserunt labore ipsa.'
        ])->category()->attach(1);

        Product::create([          
            'product_name' => 'accessory_02',
            'slug' => 'accessory-02',
            'image' => 'app/img/products/accessory02.jpg',
            'previous_price' => '500',
            'current_price' => '400',
            'brand_id' => '4',
            'details' => '150 Inch, 1TB SSD, 32GB RAM',
            'Description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate unde minus quas, 
            expedita eius non et laudantium ad illum nostrum, adipisci, praesentium ipsam nihil ullam cum consectetur 
            deserunt labore ipsa.'
        ])->category()->attach(1);

        Product::create([          
            'product_name' => 'accessory_03',
            'slug' => 'accessory-03',
            'image' => 'app/img/products/accessory03.jpg',
            'previous_price' => '500',
            'current_price' => '400',
            'brand_id' => '2',
            'details' => '150 Inch, 1TB SSD, 32GB RAM',
            'Description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate unde minus quas, 
            expedita eius non et laudantium ad illum nostrum, adipisci, praesentium ipsam nihil ullam cum consectetur 
            deserunt labore ipsa.'
        ])->category()->attach(1);

        Product::create([          
            'product_name' => 'Tv-01',
            'slug' => 'Tv-01',
            'image' => 'app/img/products/accessory04.jpg',
            'previous_price' => '500',
            'current_price' => '400',
            'brand_id' => '3',
            'details' => '150 Inch, 1TB SSD, 32GB RAM',
            'Description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate unde minus quas, 
            expedita eius non et laudantium ad illum nostrum, adipisci, praesentium ipsam nihil ullam cum consectetur 
            deserunt labore ipsa.'
        ])->category()->attach(1);

        Product::create([          
            'product_name' => 'accessory_05',
            'slug' => 'accessory-05',
            'image' => 'app/img/products/accessory05.jpg',
            'previous_price' => '500',
            'current_price' => '400',
            'brand_id' => '2',
            'details' => '150 Inch, 1TB SSD, 32GB RAM',
            'Description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate unde minus quas, 
            expedita eius non et laudantium ad illum nostrum, adipisci, praesentium ipsam nihil ullam cum consectetur 
            deserunt labore ipsa.'
        ])->category()->attach(1);



    //     //Laptops
        Product::create([          
            'product_name' => 'Laptop_01',
            'slug' => 'Laptop-01',
            'image' => 'app/img/products/laptop01.jpg',
            'previous_price' => '500',
            'current_price' => '400',
            'brand_id' => '2',
            'details' => '150 Inch, 1TB SSD, 32GB RAM',
            'Description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate unde minus quas, 
            expedita eius non et laudantium ad illum nostrum, adipisci, praesentium ipsam nihil ullam cum consectetur 
            deserunt labore ipsa.'
    ])->category()->attach(2);
    Product::create([          
        'product_name' => 'Laptop_02',
        'slug' => 'Laptop-02',
        'image' => 'app/img/products/laptop02.jpg',
        'previous_price' => '500',
        'current_price' => '400',
        'brand_id' => '1',
        'details' => '150 Inch, 1TB SSD, 32GB RAM',
        'Description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate unde minus quas, 
        expedita eius non et laudantium ad illum nostrum, adipisci, praesentium ipsam nihil ullam cum consectetur 
        deserunt labore ipsa.'
    ])->category()->attach(2);
    Product::create([          
        'product_name' => 'Laptop_03',
        'slug' => 'Laptop-03',
        'image' => 'app/img/products/laptop03.png',
        'previous_price' => '500',
        'current_price' => '400',
        'brand_id' => '4',
        'details' => '150 Inch, 1TB SSD, 32GB RAM',
        'Description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate unde minus quas, 
        expedita eius non et laudantium ad illum nostrum, adipisci, praesentium ipsam nihil ullam cum consectetur 
        deserunt labore ipsa.'
    ])->category()->attach(2);
    Product::create([          
        'product_name' => 'Laptop_04',
        'slug' => 'Laptop-04',
        'image' => 'app/img/products/laptop04.jpg',
        'previous_price' => '500',
        'current_price' => '400',
        'brand_id' => '3',
        'details' => '150 Inch, 1TB SSD, 32GB RAM',
        'Description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate unde minus quas, 
        expedita eius non et laudantium ad illum nostrum, adipisci, praesentium ipsam nihil ullam cum consectetur 
        deserunt labore ipsa.'
    ])->category()->attach(2);

        //phones
        Product::create([          
            'product_name' => 'smartphone_01',
            'slug' => 'smartphone-01',
            'image' => 'app/img/products/phone01.jpg',
            'previous_price' => '500',
            'current_price' => '400',
            'brand_id' => '3',
            'details' => '150 Inch, 1TB SSD, 32GB RAM',
            'Description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate unde minus quas, 
            expedita eius non et laudantium ad illum nostrum, adipisci, praesentium ipsam nihil ullam cum consectetur 
            deserunt labore ipsa.'
        ])->category()->attach(3);
        Product::create([          
            'product_name' => 'smartphone_02',
            'slug' => 'smartphone-02',
            'image' => 'app/img/products/phone02.jpg',
            'previous_price' => '500',
            'current_price' => '400',
            'brand_id' => '1',
            'details' => '150 Inch, 1TB SSD, 32GB RAM',
            'Description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate unde minus quas, 
            expedita eius non et laudantium ad illum nostrum, adipisci, praesentium ipsam nihil ullam cum consectetur 
            deserunt labore ipsa.'
        ])->category()->attach(3);
        Product::create([          
            'product_name' => 'smartphone_03',
            'slug' => 'smartphone-03',
            'image' => 'app/img/products/phone03.png',
            'previous_price' => '500',
            'current_price' => '400',
            'brand_id' => '2',
            'details' => '150 Inch, 1TB SSD, 32GB RAM',
            'Description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate unde minus quas, 
            expedita eius non et laudantium ad illum nostrum, adipisci, praesentium ipsam nihil ullam cum consectetur 
            deserunt labore ipsa.'
        ])->category()->attach(3);
        Product::create([          
            'product_name' => 'smartphone_04',
            'slug' => 'smartphone-04',
            'image' => 'app/img/products/phone04.jpg',
            'previous_price' => '500',
            'current_price' => '400',
            'brand_id' => '3',
            'details' => '150 Inch, 1TB SSD, 32GB RAM',
            'Description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate unde minus quas, 
            expedita eius non et laudantium ad illum nostrum, adipisci, praesentium ipsam nihil ullam cum consectetur 
            deserunt labore ipsa.'
        ])->category()->attach(3);

        //headphones
        Product::create([          
            'product_name' => 'headphone_01',
            'slug' => 'headphone-01',
            'image' => 'app/img/products/headphone01.jpg',
            'previous_price' => '750',
            'current_price' => '640',
            'brand_id' => '4',
            'details' => '150 Inch, 1TB SSD, 32GB RAM',
            'Description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate unde minus quas, 
            expedita eius non et laudantium ad illum nostrum, adipisci, praesentium ipsam nihil ullam cum consectetur 
            deserunt labore ipsa.'
        ])->category()->attach(11);;
        Product::create([          
            'product_name' => 'headphone_02',
            'slug' => 'headphone-02',
            'image' => 'app/img/products/headphone02.jpg',
            'previous_price' => '420',
            'current_price' => '380',
            'brand_id' => '1',
            'details' => '150 Inch, 1TB SSD, 32GB RAM',
            'Description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate unde minus quas, 
            expedita eius non et laudantium ad illum nostrum, adipisci, praesentium ipsam nihil ullam cum consectetur 
            deserunt labore ipsa.'
        ])->category()->attach(11);;
        Product::create([          
            'product_name' => 'headphone_03',
            'slug' => 'headphone-03',
            'image' => 'app/img/products/headphone03.png',
            'previous_price' => '550',
            'current_price' => '450',
            'brand_id' => '4',
            'details' => '150 Inch, 1TB SSD, 32GB RAM',
            'Description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate unde minus quas, 
            expedita eius non et laudantium ad illum nostrum, adipisci, praesentium ipsam nihil ullam cum consectetur 
            deserunt labore ipsa.'
        ])->category()->attach(11);;
        Product::create([          
            'product_name' => 'headphone_04',
            'slug' => 'headphone-04',
            'image' => 'app/img/products/headphone04.png',
            'previous_price' => '250',
            'current_price' => '200',
            'brand_id' => '4',
            'details' => '150 Inch, 1TB SSD, 32GB RAM',
            'Description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate unde minus quas, 
            expedita eius non et laudantium ad illum nostrum, adipisci, praesentium ipsam nihil ullam cum consectetur 
            deserunt labore ipsa.'
        ])->category()->attach(11);;

        //desktop
        Product::create([          
            'product_name' => 'Desktop_01',
            'slug' => 'Desktop-01',
            'image' => 'app/img/products/Desktop01.jpg',
            'previous_price' => '7750',
            'current_price' => '6840',
            'brand_id' => '4',
            'details' => '150 Inch, 1TB SSD, 32GB RAM',
            'Description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate unde minus quas, 
            expedita eius non et laudantium ad illum nostrum, adipisci, praesentium ipsam nihil ullam cum consectetur 
            deserunt labore ipsa.'
        ])->category()->attach(4);
        Product::create([          
            'product_name' => 'Desktop02',
            'slug' => 'Desktop-02',
            'image' => 'app/img/products/Desktop02.jpg',
            'previous_price' => '8420',
            'current_price' => '5380',
            'brand_id' => '1',
            'details' => '150 Inch, 1TB SSD, 32GB RAM',
            'Description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate unde minus quas, 
            expedita eius non et laudantium ad illum nostrum, adipisci, praesentium ipsam nihil ullam cum consectetur 
            deserunt labore ipsa.'
        ])->category()->attach(4);
        

        //others
        Product::create([          
            'product_name' => 'smartwatch',
            'slug' => 'smartwatch-01',
            'image' => 'app/img/products/smartwatch01.jpg',
            'previous_price' => '750',
            'current_price' => '600',
            'brand_id' => '4',
            'details' => '150 Inch, 1TB SSD, 32GB RAM',
            'Description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate unde minus quas, 
            expedita eius non et laudantium ad illum nostrum, adipisci, praesentium ipsam nihil ullam cum consectetur 
            deserunt labore ipsa.'
        ])->category()->attach(8);
        Product::create([          
            'product_name' => 'JoyStick',
            'slug' => 'joystick-01',
            'image' => 'app/img/products/joystick.jpg',
            'previous_price' => '420',
            'current_price' => '380',
            'brand_id' => '1',
            'details' => '150 Inch, 1TB SSD, 32GB RAM',
            'Description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate unde minus quas, 
            expedita eius non et laudantium ad illum nostrum, adipisci, praesentium ipsam nihil ullam cum consectetur 
            deserunt labore ipsa.'
        ])->category()->attach(1);

    }
}
