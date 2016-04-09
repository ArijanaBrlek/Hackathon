<?php

use Illuminate\Database\Seeder;

class EmployeesAndStationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $station = \App\Station::create([
           'name' => 'Hitna Služba Klanjec'
        ]);

        $user = \App\User::create([
            'name' => 'Ivan Ivić',
            'email' => 'ivan.ivić@gmail.com',
            'password' => bcrypt('employee'),
        ]);
        $user->assignRole('employee');
        $employee = \App\Employee::create([
            'first_name' => 'Ivan',
            'last_name' => 'Ivić',
            'user_id' => $user->id,
            'station_id' => $station->id,
        ]);


        $user_employee = \App\User::create([
            'name' => 'Employee',
            'email' => 'employee@gmail.com',
            'password' => bcrypt('employee'),
        ]);
        \App\Employee::create([
           'first_name' => 'Mali',
            'last_name' => 'Ali tehničar',
            'user_id' => $user_employee->id,
            'station_id' => $station->id
        ]);

        $user_employee->assignRole('employee');


    }
}
