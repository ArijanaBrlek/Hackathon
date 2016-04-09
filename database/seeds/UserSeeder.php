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

        DB::table('users')->insert([
           'name' => 'Administrator',
            'email' => 'administrator@gmail.com',
            'password' => bcrypt('administrator'),
        ]);
    }
}
