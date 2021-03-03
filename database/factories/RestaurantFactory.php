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
            'name' => $this->faker->name,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'location' => json_encode([
                "latitude" => $this->faker->latitude(),
                'longitude' => $this->faker->longitude()
            ]),
            'rating' => $this->faker->numberBetween(1, 9),
            'link' => $this->faker->url(),
            'details' => $this->faker->paragraph(),
            'type' => $this->faker->randomElement(['chinese', 'thai', 'american', 'syrian']),
            
        ];
    }
}
