<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{

        public function definition()
        {
            $faker = \Faker\Factory::create('ar_SA');

            $sectionNames = ['القلبية', 'طب الأسنان', 'النساء والتوليد', 'طب العيون', 'طب العظام', 'طب الأطفال', 'الطب النفسي', 'المسالك البولية'];

            return [
                'section_name' => $faker->unique()->randomElement($sectionNames),
                'description' => $faker->sentence,
            ];
        }
    }



