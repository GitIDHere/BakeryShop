<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_type_id');
            //$table->foreignId('seller_id');
			$table->string('name');
			$table->string('type')->comment('What type of product is this?');
			$table->string('origin')->comment('What is the country of origin?');
			$table->tinyInteger('days_till_expire');
			$table->decimal('width',8, 2, true);
			$table->decimal('height',8, 2, true);
			$table->string('img');
			$table->mediumText('description');
			$table->integer('quantity');
			$table->string('unit')->comment('What is the unit of measurement of this product?');
            $table->timestamps();

            $table->foreign('product_type_id')
				->references('id')
				->on('Product_Types')
			;
            # TODO - When Sellers is implemented
//			$table->foreign('seller_id')
//				->references('id')
//				->on('Sellers')
//			;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Products');
    }
}
