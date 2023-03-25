<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $birthdate = $this->faker->dateTimeBetween('-30 years', '-20 years')->format('Y-m-d');
        $gender = $this->faker->randomElement(['male', 'female']);

        return [
            'client_name' => $this->faker->name('ar_SA'),
            'email' => $this->faker->unique()->safeEmail,
            'client_phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address('ar_KW'),
            'birthdate' => $birthdate,
            'gender' => $gender,
            'pid' => $this->faker->numberBetween(100000000000, 999999999999),

        ];
    }
    }
