<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncomeTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('ar_SA'); // Set locale to Saudi Arabia

        return [
            'name' => $faker->unique()->name('ar_name'),
            'description' => $this->faker->realText(200, 2),
        ];
    }

}
