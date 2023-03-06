<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Doctor;
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
        return [
            'apt_datetime' => $this->faker->datetime('m-d-Y H:i:s'),


            'status' => $this->faker->randomElement(['pending','Complete', 'confirmed', 'cancelled']),


            'doctor_id' => Doctor::all()->random()->id,
            'client_id' => Client::all()->random()->id,
            'created_at' => $this->faker->date(),
            'updated_at' => $this->faker->date(),



        ];
    }
}
