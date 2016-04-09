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
           'name' => 'Hitna Služba Zagreb',
            'address' => '10000 Zagreb'
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


        $user = \App\User::create([
            'name' => 'Employee',
            'email' => 'employee@gmail.com',
            'password' => bcrypt('employee'),
        ]);
        $user_employee = \App\Employee::create([
           'first_name' => 'Mali',
            'last_name' => 'Ali tehničar',
            'user_id' => $user->id,
            'station_id' => $station->id
        ]);

        $user->assignRole('employee');

        $primary = \App\TeamType::whereCode('0')->first();
        $secondary = \App\TeamType::whereCode('1')->first();

        foreach(['M', 'T', 'D', 'V'] as $employeeType) {
            $station->teams()->create([
                'employee_type_id' => \App\EmployeeType::whereCode($employeeType)->first()->id,
                'team_type_id' => $primary->id
            ]);
        }

        foreach(['T', 'V'] as $employeeType) {
            $station->teams()->create([
                'employee_type_id' => \App\EmployeeType::whereCode($employeeType)->first()->id,
                'team_type_id' => $secondary->id
            ]);
        }

        foreach(['D'] as $employeeType) {
            $employee->preferences_employee_types()->create([
                'employee_type_id' => \App\EmployeeType::whereCode($employeeType)->first()->id,
            ]);
        }

        foreach(['M', 'T', 'V'] as $employeeType) {
            $user_employee->preferences_employee_types()->create([
                'employee_type_id' => \App\EmployeeType::whereCode($employeeType)->first()->id,
            ]);
        }

        $year = 2016;
        for($week = 1;  $week <= 52; ++$week) {
            for($day = 1; $day <= 7; ++$day) {
                $plan_type = \App\PlanType::whereCode('D')->first();

                \App\PreferencesPlanType::create([
                    'employee_id' => $employee->id,
                    'plan_type_id' => $plan_type->id,
                    'year' => $year,
                    'week' => $week,
                    'day' => $day
                ]);

                \App\PreferencesPlanType::create([
                    'employee_id' => $user_employee->id,
                    'plan_type_id' => $plan_type->id,
                    'year' => $year,
                    'week' => $week,
                    'day' => $day
                ]);
            }
        }
    }

}
