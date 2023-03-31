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
     */
    public function definition()
{
    $doctorIds = Doctor::pluck('id')->toArray();
    $clientIds = Client::pluck('id')->toArray();
    $sectionIds = Section::pluck('id')->toArray();

    return [
        'apt_datetime' => $this->faker->dateTimeBetween(request('apt_datetime'), '+1 year')->format('Y-m-d H:i:s'),

        'status' => $this->faker->randomElement(['pending', 'processing']),

        'doctor_id' => count($doctorIds) > 0 ? $this->faker->randomElement($doctorIds) : null,
        'client_id' => count($clientIds) > 0 ? $this->faker->randomElement($clientIds) : null,
        'section_id' => count($sectionIds) > 0 ? $this->faker->randomElement($sectionIds) : null,
    ];
}
}
