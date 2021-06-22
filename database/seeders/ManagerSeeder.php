<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Food;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManagerSeeder extends Seeder
{
    public $faker;

    public function __construct()
    {
        $this->faker = Faker::create();
        $this->faker->addProvider(new \Faker\Provider\Youtube($this->faker));
        $this->faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($this->faker));
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurantNames = [
            'Star Kabab & Restaurant', 
            'Elements Restaurant', 
            'Izumi Japanese Kitchen', 
            'Seasonal Tastes', 
            'Bukhara Restaurant', 
            'The Amber Room', 
            'Amaya Restaurant',  
            'Cafe Bazar', 
            '3 Dragons At Peal', 
            'Royal Treat Restaurant'
        ]; 
        $category = Category::pluck('id');
        $count = 0;
        
        foreach($restaurantNames as $rn)
        {
            $manager = User::create([
                'name' => $this->faker->name($gender = 'male')  ,
                'email' => $this->faker->freeEmail,
                'phone' => $this->faker->phoneNumber,
                'password' => Hash::make('managerPass'),
            ]);

            $manager->assignRole('manager');

            $res_add = [
                'country' => 'Bangladesh',
                'division' => 'Dhaka',
                'district' => 'Dhaka',
                'thana' => $this->faker->randomElement(['Adabor','Uttar Khan', 'Uttara', 'Kadamtali', 'Kalabagan', 'Dhanmondi', 'Mohammadpur', 'Rampura']),
                'street' => $this->faker->streetName,
                'holding_number' => $this->faker->buildingNumber,
                'postcode' => $this->faker->postcode,
            ];

            $restaurant = Restaurant::create([
                'user_id' => $manager->id,
                'name' => $rn,
                'address' => json_encode($res_add),
                'phone_no' => $this->faker->phoneNumber,
                'alternative_phone_no' => $this->faker->phoneNumber ,
                'telephone' => $this->faker->tollFreePhoneNumber,
                'facebook_page_url' => 'https://www.facebook.com/',
                'youtube_channel_url' => $this->faker->youtubeRandomUri(),
            ]);

            for($j=0 ;  $j<=2; $j++){
                $food = Food::create([
                    'name' => $this->faker->foodName(),
                    'category_id' => $category[$count],
                    'description' => $this->faker->text($maxNbChars = 200),
                    'price' => $this->faker->randomNumber(3),
                    'discount_in_percent' => $this->faker->numberBetween($min = 0, $max = 20),
                ]);

                DB::table('food_restaurant')->insert([
                    'food_id' => $food->id,
                    'restaurant_id' => $restaurant->id,
                ]);
            }
            $count++;
        }
    }
}
