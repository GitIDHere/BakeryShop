<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDietsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Product_Diets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->boolean('is_vegetarian');
            $table->boolean('is_gluten_free');
            $table->boolean('is_vegan');
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
        Schema::dropIfExists('Product_Diets');
    }
}
