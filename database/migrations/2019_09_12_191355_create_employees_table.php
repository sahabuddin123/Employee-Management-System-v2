<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->integer('age');
            $table->string('phone');
            $table->mediumText('address');
            /**
             *  Add foreign key constraints to these columns
             */
            $table->unsignedInteger('gender_id');
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->unsignedInteger('salary_id');
            $table->foreign('salary_id')->references('id')->on('salaries');
            $table->unsignedInteger('dept_id');
            $table->foreign('dept_id')->references('id')->on('departments');
            $table->unsignedInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states');
            $table->unsignedInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->unsignedInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->date('join_date');
            $table->date('birth_date');
            $table->unsignedInteger('division_id');
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->string('picture');
            $table->timestamps();
            /**
             *  Add Soft Deletes.
             * 
             *  it just mean that if we are deleting a row, then
             *  it will not delete row. it will just add a value to
             *  deleted_at column.
             */
            $table->softDeletes();
            /**
             *  if we need add a foreign key constraint then
             *  the column should be unsigned integer
             */
            // $table->integer('gender_id')->unsigned();
            // $table->integer('dept_id')->unsigned();
            // $table->integer('country_id')->unsigned();
            // $table->integer('state_id')->unsigned();
            // $table->integer('city_id')->unsigned();
            // $table->integer('division_id')->unsigned();
            // $table->integer('salary_id')->unsigned();  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
