<?php

use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = \App\Employee::all();
        $employee_task = \App\EmployeeType::whereCode('D')->first();

        foreach($employees as $employee) {
            $year = 2016;
            $types = ['D', 'N', '_'];
            for($week = 1; $week <= 20; ++$week) {
                for($day = 1; $day <= 7; ++$day) {
                    \App\Schedule::create([
                        'year' => $year,
                        'week' => $week,
                        'day' => $day,
                        'employee_id' => $employee->id,
                        'station_id' => \App\Station::first()->id,
                        'type' => $types[rand(0, 2)],
                        'employee_task_id' => $employee_task->id,
                    ]);

                }
            }
        }
    }
}
