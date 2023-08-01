<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;

class AppointmentsTableSeeder extends Seeder
{
    public function run()
    {
        Appointment::create([
            'client_id' => 1,
            'doctor_id' => 1,
            'section_id' => 1,
            'remarks' => null,
            'apt_datetime' => '2023-07-20 10:00:00',
            'invoice_id' => null,
            'edited_by' => null,
            'status' => 'pending',
        ]);

        Appointment::create([
            'client_id' => 2,
            'doctor_id' => 3,
            'section_id' => 3,
            'remarks' => 'تحتاج إلى رعاية طبية فورية.',
            'apt_datetime' => '2023-07-21 14:30:00',
            'invoice_id' => null,
            'edited_by' => null,
            'status' => 'confirmed',
        ]);

        Appointment::create([
            'client_id' => 3,
            'doctor_id' => 2,
            'section_id' => 2,
            'remarks' => 'تم تأجيل الموعد.',
            'apt_datetime' => '2023-07-22 08:00:00',
            'invoice_id' => null,
            'edited_by' => null,
            'status' => 'pending',
        ]);

        Appointment::create([
            'client_id' => 4,
            'doctor_id' => 4,
            'section_id' => 4,
            'remarks' => null,
            'apt_datetime' => '2023-07-23 16:45:00',
            'invoice_id' => null,
            'edited_by' => null,
            'status' => 'confirmed',
        ]);

        Appointment::create([
            'client_id' => 5,
            'doctor_id' => 5,
            'section_id' => 5,
            'remarks' => 'تم تأجيل الموعد بناءً على طلب الطبيب.',
            'apt_datetime' => '2023-07-24 12:15:00',
            'invoice_id' => null,
            'edited_by' => null,
            'status' => 'pending',
        ]);
    }
}
