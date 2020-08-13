<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_price', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->decimal('price_per_unit');
            $table->decimal('discounted_percentage');
            $table->decimal('vat');
            $table->timestamps();

			$table->foreign('product_id')
				->references('id')
				->on('Product')
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
        Schema::dropIfExists('product_price');
    }
}
