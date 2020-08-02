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
            $table->foreignId('product_id');
            $table->mediumText('review');
            $table->timestamps();

			$table->foreign('product_id')
				->references('id')
				->on('Products')
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
