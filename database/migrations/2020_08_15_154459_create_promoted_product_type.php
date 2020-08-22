<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotedProductType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promoted_product_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_type_id');
            $table->boolean('show_on_home_header_tiles')->default(false);
            $table->timestamps();

			$table->foreign('product_type_id')
				->references('id')
				->on('product_type')
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
        Schema::dropIfExists('promoted_product_type');
    }
}
