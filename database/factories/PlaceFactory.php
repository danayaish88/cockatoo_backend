<?php

namespace Database\Factories;

use App\Models\Place;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlaceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Place::class;

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
            'category' => $this->faker->randomElement(['hospital', 'mall', 'supermarket', 'hotel', 'currency']),
            
        ];
    }
}
