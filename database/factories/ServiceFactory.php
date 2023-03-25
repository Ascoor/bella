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
        $services = ['إزالة أثار حروق','شد الرقبة','إزالة الهالات السوداه','تقويم الأسنان','زراعة أسنان','حقن الشفاه فيلر','حقن الشفاه بوتكس','توريد اللثه','تبييض الأسنان','إبتسامة هوليود','شد الوجه',];

        return [
            'service_name' => $this->faker->unique(10)->randomElement($services),
            'section_id' => Section::all()->random()->id,
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true) . ' في المجال الطبي',
            'price' => intval($this->faker->numberBetween(100, 200))

        ];
    }

}
