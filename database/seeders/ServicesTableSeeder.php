<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesTableSeeder extends Seeder
{
    public function run()
    {
        Service::create([
            'service_name' => 'كشف طبي',
            'section_id' => 1,
            'price' => 200,
            'description' => 'يشمل الكشف الطبي وتحديد التشخيص والعلاج.',
        ]);

        Service::create([
            'service_name' => 'عملية جراحية',
            'section_id' => 2,
            'price' => 5000,
            'description' => 'يشمل إجراء عمليات جراحية مختلفة.',
        ]);

        Service::create([
            'service_name' => 'ولادة طبيعية',
            'section_id' => 3,
            'price' => 3000,
            'description' => 'يشمل الرعاية الطبية والتوليد الطبيعي.',
        ]);

        Service::create([
            'service_name' => 'علاج الأمراض الجلدية',
            'section_id' => 4,
            'price' => 400,
            'description' => 'يشمل تشخيص وعلاج الأمراض الجلدية للأطفال.',
        ]);

        Service::create([
            'service_name' => 'فحص القلب',
            'section_id' => 5,
            'price' => 800,
            'description' => 'يشمل فحص وتشخيص أمراض القلب والأوعية الدموية.',
        ]);
    }
}
