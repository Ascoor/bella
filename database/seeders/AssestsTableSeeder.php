<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Assest;

class AssestsTableSeeder extends Seeder
{
    public function run()
    {
        Assest::create([
            'assest_name' => 'أحمد محمد',
            'gender' => 'male',
            'section_id' => 1,
            'phone' => '01012345678',
        ]);

        Assest::create([
            'assest_name' => 'فاطمة علي',
            'gender' => 'female',
            'section_id' => 2,
            'phone' => '01123456789',
        ]);

        Assest::create([
            'assest_name' => 'خالد أحمد',
            'gender' => 'male',
            'section_id' => 3,
            'phone' => '01234567890',
        ]);

        Assest::create([
            'assest_name' => 'ريم عبدالله',
            'gender' => 'female',
            'section_id' => 4,
            'phone' => '01098765432',
        ]);

        Assest::create([
            'assest_name' => 'أحمد علي',
            'gender' => 'male',
            'section_id' => 5,
            'phone' => '01122334455',
        ]);
    }
}
