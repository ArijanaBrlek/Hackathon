<?php

use Illuminate\Database\Seeder;

class InputDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\EmployeeType::create([
            'name' => 'Dispečer',
            'code' => 'D'
        ]);

        \App\EmployeeType::create([
            'name' => 'Liječnik',
            'code' => 'M'
        ]);

        \App\EmployeeType::create([
            'name' => 'Medicinski tehničar',
            'code' => 'T'
        ]);

        \App\EmployeeType::create([
            'name' => 'Vozač',
            'code' => 'V'
        ]);

        \App\ShiftType::create([
            'name' => 'Dnevna smjena',
            'code' => 'D'
        ]);

        \App\ShiftType::create([
            'name' => 'Noćna smjena',
            'code' => 'N'
        ]);

        \App\ShiftType::create([
            'name' => 'Neradni dan',
            'code' => '_'
        ]);

        \App\PlanType::create([
            'name' =>  'Dostupan',
            'code' => 'D'
        ]);

        \App\PlanType::create([
            'name' =>  'Slobodan dan',
            'code' => 'S'
        ]);

        \App\PlanType::create([
            'name' =>  'Godišnji odmor',
            'code' => 'G'
        ]);

        \App\PlanType::create([
            'name' =>  'Bolovanje',
            'code' => 'B'
        ]);

        \App\TeamType::create([
            'name' => 'Primarni tim',
            'code' => '0',
        ]);

        \App\TeamType::create([
            'name' => 'Sporedni tim',
            'code' => '1',
        ]);
    }
}
