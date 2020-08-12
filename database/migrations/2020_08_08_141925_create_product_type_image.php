<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTypeImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_type_image', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_type_id');
            $table->string('tile_image');
            $table->boolean('is_active');
            $table->boolean('is_lead')->comment("If set to 1 then the image is shown on the big tile");
            $table->timestamps();

			$table->foreign('product_type_id')
				->references('id')
				->on('Product_Type')
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
        Schema::dropIfExists('product_type_image');
    }
}
