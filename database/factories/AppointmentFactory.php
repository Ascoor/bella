<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Doctor;
use App\Models\Section;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */public function definition()
{

    return [
        'apt_datetime' => $this->faker->dateTimeBetween(request('apt_datetime'), '+1 year')->format('Y-m-d H:i:s'),

        'status' => $this->faker->randomElement(['pending', 'processing']),

        'doctor_id' => Doctor::all()->random()->id,
        'client_id' => Client::all()->random()->id,
        'section_id' => Section::all()->random()->id,

    ];
}
}
