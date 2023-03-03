<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {  $sections = ['قسم جراحة النجمبل','قسم الجلدية',' قسم الأسنان','قسم العظام ','قسم النساء والتوليد'];
        return [
            'section_name' =>  $this->faker->unique(10)->randomElement($sections),
            'description' => $this->faker->realText(200, 2),
        ];
    }
}
