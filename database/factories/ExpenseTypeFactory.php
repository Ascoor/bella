<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     public function definition()
     {
         $types = ['أدوات طبية', 'أدوية', 'مستلزمات طبية', 'معدات طبية', 'مواد استهلاكية'];

         return [
             'name' => $this->faker->randomElement($types),
             'description' => $this->faker->sentence,
         ];
     }


}
