<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

                'service_name'   => $this->faker->unique()->name('ar_service'),
                'section_id' =>Section::all()->random()->id,
                'description' => $this->faker->text(),
                'price' => $this->faker->randomDigit,

        ];
    }
}
