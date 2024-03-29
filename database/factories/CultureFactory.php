<?php

namespace Database\Factories;

use App\Models\Culture;
use Illuminate\Database\Eloquent\Factories\Factory;

class CultureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Culture::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['romanian', 'greek', 'old egyption', 'japanese', 'east asian', 'ottomans', 'scientific'])
        ];
    }
}
