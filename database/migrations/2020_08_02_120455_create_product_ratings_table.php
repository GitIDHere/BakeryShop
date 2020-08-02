<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Product_Ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->decimal('avg_rating', 8, 2, true);
            $table->integer('ratings_count')->comment('The number of ratings this product has');
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
        Schema::dropIfExists('Product_Ratings');
    }
}
