<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('OIB');
            $table->string('gender');
            $table->string('address');
            $table->string('city');

            $table->integer('station_id')->unsigned();
            $table->foreign('station_id')->references('id')->on('stations')->onDelete('cascade');
            $table->timestamps();

            $table->string('phone');
            $table->string('mobile');
            $table->string('remark');
        });

        Schema::create('employee_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code');
        });

        Schema::create('plan_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code');
        });

        Schema::create('preferences_employee_types', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('employees');

            $table->integer('employee_type_id')->unsigned();
            $table->foreign('employee_type_id')->references('id')->on('employee_types');
        });

        Schema::create('preferences_plan_types', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('employees');

            $table->integer('plan_type_id')->unsigned();
            $table->foreign('plan_type_id')->references('id')->on('plan_types');
        });

        Schema::create('shift_types', function(Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('code');
        });

        Schema::create('team_types', function(Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('code');
        });

        Schema::create('teams', function(Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->integer('station_id')->unsigned();
            $table->foreign('station_id')->references('id')->on('stations');

            $table->integer('team_type_id')->unsigned();
            $table->foreign('team_type_id')->references('id')->on('team_types');

            $table->integer('employee_type_id')->unsigned();
            $table->foreign('employee_type_id')->references('id')->on('employee_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
