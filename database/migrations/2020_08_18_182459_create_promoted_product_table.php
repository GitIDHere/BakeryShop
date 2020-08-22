<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotedProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promoted_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->boolean('is_featured')->default(false);
            $table->timestamps();

			$table->foreign('product_id')
				->references('id')
				->on('product')
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
        Schema::dropIfExists('promoted_product');
    }
}
