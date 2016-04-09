<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Spatie\Permission\Models\Role::create(['name' => 'administrator']);
        \Spatie\Permission\Models\Role::create(['name' => 'employee']);

        $admin = \App\User::create([
            'name' => 'Administrator',
            'email' => 'administrator@gmail.com',
            'password' => bcrypt('administrator'),
        ]);

        $employee = \App\User::create([
            'name' => 'Employee',
            'email' => 'employee@gmail.com',
            'password' => bcrypt('employee'),
        ]);

        $admin->assignRole('administrator');
        $employee->assignRole('employee');

    }
}
