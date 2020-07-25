<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->unique();
            $table->string('first_name');
            $table->string('surname');
            $table->string('address_line_one');
            $table->string('address_line_two');
            $table->string('city');
            $table->bigInteger('country_id')->unsigned()->nullable();
            $table->string('postcode')->nullable();
            $table->bigInteger('usa_state_id')->unsigned()->nullable();
            $table->string('zip')->nullable();

            $table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade')
			;
            $table->foreign('country_id')
				->references('id')
				->on('countries')
			;
            $table->foreign('usa_state_id')
				->references('id')
				->on('usa_states')
			;
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
        Schema::dropIfExists('user_profiles');
    }
}
