<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Employees extends Migration
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
            $table->string('uuid');
            $table->string('first_name');
            $table->string('last_name', 100);
            $table->string('middle_name', 100);
            $table->string('nick_name', 100);
            $table->string('department', 100);
            $table->string('position', 100);
            $table->string('birth_date', 100);
            $table->string('hired_date', 100);
            $table->string('email_address', 100);
            $table->integer('status');
            $table->timestamps();
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
