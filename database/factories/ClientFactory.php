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
        return [
            'client_name' => $this->faker->name('ar_SA'),
            'email' => $this->faker->unique()->safeEmail,
            'client_phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address('ar_KW'),
        ];
    }
}
