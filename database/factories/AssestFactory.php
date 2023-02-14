<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'assest_name'   => $this->faker->unique()->name('ar_name'),
            'section_id' => Section::all()->random()->id,
            'phone'  =>$this->faker->phoneNumber(),


        ];
    }
}
