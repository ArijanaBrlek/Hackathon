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
        $station1 = \App\Station::create([
           'name' => 'Hitna Služba Zagreb',
            'address' => '10000 Zagreb'
        ]);

        $station2 = \App\Station::create([
           'name' => 'Hitna Služba Daruvar',
            'address' => '31512 Daruvar'
        ]);

        $station3 = \App\Station::create([
           'name' => 'Hitna Služba Torčec',
            'address' => '69696 Torčec'
        ]);

        $station4 = \App\Station::create([
           'name' => 'Hitna Služba Pula',
            'address' => '51245 Pula'
        ]);

//        $user = \App\User::create([
//            'name' => 'Ivan Ivić',
//            'email' => 'ivan.ivić@gmail.com',
//            'password' => bcrypt('employee'),
//        ]);
//        $user->assignRole('employee');
//        $employee = \App\Employee::create([
//            'first_name' => 'Ivan',
//            'last_name' => 'Ivić',
//            'user_id' => $user->id,
//            'station_id' => $station->id,
//        ]);
//
//
//        $user = \App\User::create([
//            'name' => 'Employee',
//            'email' => 'employee@gmail.com',
//            'password' => bcrypt('employee'),
//        ]);
//        $user_employee = \App\Employee::create([
//           'first_name' => 'Mali',
//            'last_name' => 'Ali tehničar',
//            'user_id' => $user->id,
//            'station_id' => $station->id
//        ]);
//        $user->assignRole('employee');

        $primary = \App\TeamType::whereCode('0')->first();
        $secondary = \App\TeamType::whereCode('1')->first();

        foreach(['D', 'M', 'V', 'T'] as $employeeType) {
            $station1->teams()->create([
                'employee_type_id' => \App\EmployeeType::whereCode($employeeType)->first()->id,
                'team_type_id' => $primary->id
            ]);
        }

        foreach(['T', 'V'] as $employeeType) {
            $station1->teams()->create([
                'employee_type_id' => \App\EmployeeType::whereCode($employeeType)->first()->id,
                'team_type_id' => $secondary->id
            ]);
        }

        foreach(['T', 'V'] as $employeeType) {
            $station2->teams()->create([
                'employee_type_id' => \App\EmployeeType::whereCode($employeeType)->first()->id,
                'team_type_id' => $secondary->id
            ]);
        }

        foreach(['D', 'M', 'V', 'T'] as $employeeType) {
            $station3->teams()->create([
                'employee_type_id' => \App\EmployeeType::whereCode($employeeType)->first()->id,
                'team_type_id' => $primary->id
            ]);
        }

        foreach(['D', 'M', 'V', 'T'] as $employeeType) {
            $station4->teams()->create([
                'employee_type_id' => \App\EmployeeType::whereCode($employeeType)->first()->id,
                'team_type_id' => $primary->id
            ]);
        }

        $stations = [$station1, $station2, $station3, $station4];
        for($i = 0; $i < 75; ++$i) {
            $user = \App\User::create([
                'name' => 'Employee',
                'email' => 'employee' . $i . '@gmail.com',
                'password' => bcrypt('employee'),
            ]);

            $user_employee = \App\Employee::create([
               'first_name' => 'Ivo',
                'last_name' => 'Ivić',
                'user_id' => $user->id,
                'station_id' => $stations[rand(0, 3)]->id
            ]);
            $user->assignRole('employee');

            $plans = [
                ['M'],
                ['T'],
                ['T', 'V'],
                ['V'],
                ['D', 'T', 'V'],
                ['D', 'T'],
                ['D']
            ];

            foreach ($plans[rand(0, count($plans)-1)] as $employeeType) {
                $user_employee->preferences_employee_types()->create([
                    'employee_type_id' => \App\EmployeeType::whereCode($employeeType)->first()->id,
                ]);
            }
        }

        $year = 2016;
        for($week = 1;  $week <= 52; ++$week) {
            for($day = 1; $day <= 7; ++$day) {

                for($i = 1; $i <= 75; ++$i) {
                    \App\PreferencesPlanType::create([
                        'employee_id' => $i,
                        'plan_type_id' => \App\PlanType::all()->random()->id,
                        'year' => $year,
                        'week' => $week,
                        'day' => $day
                    ]);
                }
            }
        }
    }

}
