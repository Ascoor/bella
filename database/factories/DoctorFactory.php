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
    ' أستشاري جراحة عامة ',
    ' أستشاري جراحة الأوعية الدموية',
    ' أستشاري جراحة التجميل',
    ' أستشاري أمراض النساء والولادة',
    ' أستشاري أمراض القلب والشرايين',
    ' أستشاري أمراض المسالك البولية',
    ' أستشاري أمراض الجهاز الهضمي',
    ' أستشاري أمراض الجهاز التنفسي',
    ' أستشاري أمراض الجهاز العصبي',
    ' أستشاري أمراض الدم والأورام',
    ];

    return [
        'section_id' => Section::all()->random()->id,
        'name' => $ar_doctor_name,
        'specialization' => $this->faker->randomElement($specializations),
        'phone' => $this->faker->phoneNumber(),
        'photo' => 'logo.png',
        'username' => $this->faker->unique()->name(),
        'password' => $this->faker->unique()->password(),
    ];
}
}
