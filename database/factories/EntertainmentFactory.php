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
            'id'=>$this->faker->unique()->name,
            'name' => $this->faker->name,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'rating' => $this->faker->numberBetween(1, 5),
            'source'=>$this->faker->randomElement(['google','foursquare']),
            //'image'=>$this->faker->image

        ];
    }
}
