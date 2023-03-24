<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ar_doctor_name = $this->faker->unique()->name('ar_SA');
        $specializations = [
            'جراحة عامة',
            'جراحة الأوعية الدموية',
            'جراحة التجميل',
            'أمراض النساء والولادة',
            'أمراض القلب والشرايين',
            'أمراض المسالك البولية',
            'أمراض الجهاز الهضمي',
            'أمراض الجهاز التنفسي',
            'أمراض الجهاز العصبي',
            'أمراض الدم والأورام',
        ];

        return [
            'section_id' => Section::all()->random()->id,
            'name' => $ar_doctor_name,
            'specialization' => $this->faker->randomElement($specializations),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'phone' => $this->faker->phoneNumber(),
            'photo' => 'logo.png',
            'username' => $this->faker->unique()->name(),
            'password' => $this->faker->unique()->password(),
        ];
    }
}

