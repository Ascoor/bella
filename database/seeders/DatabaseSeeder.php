<?php

namespace Database\Seeders;

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
        $this->call(UserSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(DoctorsTableSeeder::class);
        $this->call(AssestsTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(ExpenseTypesTableSeeder::class);
        $this->call(AppointmentsTableSeeder::class);
    }
}
