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
            'photo' => 'logo.png',
            'gender' => $this->faker->randomElement(['male', 'female']),
            'phone'  =>$this->faker->phoneNumber(),
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> e727e2bfbd2b734ab974cd862890dad48cf08476
=======

>>>>>>> e727e2bfbd2b734ab974cd862890dad48cf08476


        ];
    }
}
