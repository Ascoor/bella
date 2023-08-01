<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientsTableSeeder extends Seeder
{
    public function run()
    {
        Client::create([
            'client_name' => 'محمد علي',
            'email' => 'mohamed@example.com',
            'gender' => 'male',
            'pid' => '1234567890',
            'birthdate' => '1990-05-15',
            'client_phone' => '01011111111',
            'note' => 'مريض مزمن',
            'address' => 'شارع النيل، القاهرة',
            'city' => 'القاهرة',
        ]);

        Client::create([
            'client_name' => 'فاطمة حسن',
            'email' => 'fatma@example.com',
            'gender' => 'female',
            'pid' => '9876543210',
            'birthdate' => '1985-08-20',
            'client_phone' => '01111111111',
            'note' => 'حالة طارئة',
            'address' => 'شارع الشهداء، الجيزة',
            'city' => 'الجيزة',
        ]);

        Client::create([
            'client_name' => 'علي محمود',
            'email' => 'ali@example.com',
            'gender' => 'male',
            'pid' => '5555555555',
            'birthdate' => '1975-02-10',
            'client_phone' => '01211111111',
            'note' => 'بحاجة إلى عملية جراحية',
            'address' => 'شارع المعز، الإسكندرية',
            'city' => 'الإسكندرية',
        ]);

        Client::create([
            'client_name' => 'سارة حسين',
            'email' => 'sara@example.com',
            'gender' => 'female',
            'pid' => '2222222222',
            'birthdate' => '1998-11-25',
            'client_phone' => '01099999999',
            'note' => 'فحص سنوي',
            'address' => 'شارع الجلاء، الإسماعيلية',
            'city' => 'الإسماعيلية',
        ]);

        Client::create([
            'client_name' => 'أحمد مصطفى',
            'email' => 'ahmed@example.com',
            'gender' => 'male',
            'pid' => '3333333333',
            'birthdate' => '1980-07-01',
            'client_phone' => '01199999999',
            'note' => 'بحاجة إلى متابعة طبية',
            'address' => 'شارع النيل، أسوان',
            'city' => 'أسوان',
        ]);
    }
}
