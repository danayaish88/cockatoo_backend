<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Faker;

/*class RestaurantUserFactory extends Factory
{
   
}*/


DB::table('restaurant_user')->insert(
       [
           'user_id' => $faker->numberBetween(0, 10),
           'restaurant_id' => $faker->numberBetween(0, 100),
       ]
);