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
    $doctors = [
        ['name' => 'د.خلود شاهين', 'specialization' => 'الجلدية والتجميل والليزر'],
        ['name' => 'د.زينب يوسف', 'specialization' => 'العناية بالبشرة والتجميل'],
        ['name' => 'د.فؤاد النجار', 'specialization' => 'جراحات الفك والوجه والرقبة'],
        ['name' => 'د.ايليا بطرس', 'specialization' => 'جراحات تجميل الوجه والعنق والنحت'],
        ['name' => 'د.انا منسوروفا', 'specialization' => 'اللياقة الجمالية'],
        ['name' => 'د.عبدالهادى شهاب', 'specialization' => 'إستشارى تجميل الأسنان'],
        ['name' => 'د.اندريه', 'specialization' => 'إستشارى تجميل اللثه الأسنان'],
    ];

    $doctor = $this->faker->randomElement($doctors);

    return [
        'section_id' => Section::all()->random()->id,
        'name' => $doctor['name'],
        'specialization' => $doctor['specialization'],
        'gender' => $this->faker->randomElement(['male', 'female']),
        'phone' => $this->faker->phoneNumber(),
        'photo' => 'logo.png',
        'username' => $this->faker->unique()->name(null, 6),
        'password' => $this->faker->unique()->password(null, 6),
    ];
}


    }


