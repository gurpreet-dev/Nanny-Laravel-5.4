<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role');

            $table->string('email')->unique();
            $table->string('password');

            $table->string('first_name1')->nullable();
            $table->string('last_name1')->nullable();
            $table->string('mobile1')->nullable();

            $table->string('first_name2')->nullable();
            $table->string('last_name2')->nullable();
            $table->string('mobile2')->nullable();

            $table->text('address_1')->nullable();
            $table->text('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->integer('at_hotel')->default(0);

            $table->text('household_info')->nullable();
            $table->text('pet_info')->nullable();

            $table->text('q1')->nullable();
            $table->text('q2')->nullable();
            $table->text('q3')->nullable();
            $table->text('q4')->nullable();
            $table->text('q5')->nullable();

            $table->string('hear_aboutus')->nullable();
            $table->string('which_hear_aboutus')->nullable();
            $table->string('referred_by')->nullable();
            $table->string('gender', 6)->nullable();
            $table->string('nanny_requirement')->nullable();
            $table->string('childs')->nullable();
            $table->text('ages')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
