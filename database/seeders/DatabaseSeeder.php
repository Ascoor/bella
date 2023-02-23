<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Assest;
use App\Models\Client;
use App\Models\Doctor;
use App\Models\Section;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Section::factory(10)->create();
        Service::factory(10)->create();
        Doctor::factory(10)->create();
        Assest::factory(10)->create();

         Client::factory(10)->create();
        Appointment::factory(20)->create();
    }
}
