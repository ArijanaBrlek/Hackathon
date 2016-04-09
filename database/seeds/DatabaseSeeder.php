<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(InputDataSeeder::class);
        $this->call(EmployeesAndStationsSeeder::class);
        $this->call(ScheduleSeeder::class);
    }
}
