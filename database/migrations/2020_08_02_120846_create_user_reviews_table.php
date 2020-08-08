<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('User_Reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('product_id')->comment('1 review per product per user');
            $table->mediumText('review');
            $table->timestamps();

			$table->foreign('user_id')
				->references('id')
				->on('Users')
				->cascadeOnDelete()
			;
			$table->foreign('product_id')
				->references('id')
				->on('Product')
				->cascadeOnDelete()
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
        Schema::dropIfExists('User_Reviews');
    }
}
