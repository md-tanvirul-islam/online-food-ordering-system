<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $categories =[
            'Biryani',
            'Chicken',
            'Dessert',
            'Fish' ,
            'Ice Cream',
            'Noodles', 
            'Pasta', 
            'Pizza', 
            'Sandwiches', 
            'Sea food', 
            'Shawarma', 
            'Snacks', 
            'Sushi', 
            'BBQ', 
            'Beef',  
            'Cakes',  
        ];

        foreach($categories as $category)
        {
            Category::create([
            'name' => $category,
            'description' => $faker->text($maxNbChars = 200),
            ]);
        }
    }
}
