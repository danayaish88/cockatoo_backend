<?php

namespace Database\Factories;

use App\Models\Entertainment;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntertainmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Entertainment::class;

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
            'type' => $this->faker->randomElement(['zoo', 'museum', 'opera', 'art gallery']),
            
        ];
    }
}
