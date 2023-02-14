<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'section_id' => Section::all()->random()->id,
           'name' => $this->faker->name('ar_doctor'),
        'specialization' =>$this->faker->text(),
            'phone'  =>$this->faker->phoneNumber(),
            'photo'  =>  'logo.png',
        ];
    }
}
