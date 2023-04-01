<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{

        public function definition()
        {
            $faker = \Faker\Factory::create('ar_SA');

            $sectionNames = [ 'طب العيون',  'جراحات الفم واللثة', 'جراحات الفك والأسنان', 'جراحات التجميل'];

            return [
                'section_name' => $faker->unique()->randomElement($sectionNames),
                'description' => $faker->sentence,
            ];
        }
    }



