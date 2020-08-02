<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductNutritionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Product_Nutritions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->integer('calories')->comment('grams');
            $table->integer('carbs')->comment('grams');
            $table->integer('sugar')->comment('grams');
            $table->integer('salt')->comment('grams');
            $table->integer('protein')->comment('grams');
            $table->integer('fat')->comment('grams');
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
        Schema::dropIfExists('Product_Nutritions');
    }
}
