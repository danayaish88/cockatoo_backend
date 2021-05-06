<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Restaurant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'key'=>$this->faker->unique()->name,
            'name' => $this->faker->name,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'rating' => $this->faker->numberBetween(1, 5),
            //'image'=>$this->faker->image
            
        ];
    }
}
