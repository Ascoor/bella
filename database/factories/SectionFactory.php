<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'section_name' => $this->faker->unique()->name('ar_clinic'),
            'description' => $this->faker->realText(200, 2),
        ];
    }
}
