<?php


namespace Database\Seeders;


    use Illuminate\Database\Seeder;
    use App\Models\Doctor;

    class DoctorsTableSeeder extends Seeder
    {
        public function run()
        {
            Doctor::create([
                'name' => 'د. أحمد الصادق',
                'gender' => 'male',
                'section_id' => 1,
                'specialization' => 'استشاري الطوارئ',
                'phone' => '01011112222',
                'username' => 'askar',
                'password' => bcrypt('Ask@123456'),
            ]);

            Doctor::create([
                'name' => 'د. فاطمة علي',
                'gender' => 'female',
                'section_id' => 2,
                'specialization' => 'استشاري الجراحة',
                'phone' => '01111112222',
                'username' => 'fatma_doc',
                'password' => bcrypt('password456'),
            ]);

            Doctor::create([
                'name' => 'د. محمد خالد',
                'gender' => 'male',
                'section_id' => 3,
                'specialization' => 'استشاري التوليد',
                'phone' => '01211112222',
                'username' => 'khaled_doc',
                'password' => bcrypt('password789'),
            ]);

            Doctor::create([
                'name' => 'د. ريم أحمد',
                'gender' => 'female',
                'section_id' => 4,
                'specialization' => 'استشاري أمراض الأطفال',
                'phone' => '01099998888',
                'username' => 'reem_doc',
                'password' => bcrypt('passwordabc'),
            ]);

            Doctor::create([
                'name' => 'د. علي حسن',
                'gender' => 'male',
                'section_id' => 5,
                'specialization' => 'استشاري الباطنية',
                'phone' => '01199998888',
                'username' => 'ali_doc',
                'password' => bcrypt('passwordxyz'),
            ]);
        }
    }

