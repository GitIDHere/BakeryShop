<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->unique();
            $table->string('first_name');
            $table->string('surname');
            $table->string('address_line_one')->nullable();
            $table->string('address_line_two')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode')->nullable();
			$table->timestamps();


            $table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade')
			;


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_addresses');
    }
}
