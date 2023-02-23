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
        $services = ['خدمة طبية 1', 'خدمة طبية 2', 'خدمة طبية 3', 'خدمة طبية 4', 'خدمة طبية 5'];

        return [
            'service_name' => $this->faker->unique(10)->randomElement($services),
            'section_id' => Section::all()->random()->id,
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true) . ' في المجال الطبي',
            'price' => $this->faker->numberBetween(100, 200),
        ];
    }

}
