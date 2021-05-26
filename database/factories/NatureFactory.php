<?php

namespace Database\Factories;

use App\Models\Nature;
use Illuminate\Database\Eloquent\Factories\Factory;

class NatureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Nature::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['beach', 'desert', 'mountains', 'wildlife', 'river', 'forest'])
        ];
    }
}
