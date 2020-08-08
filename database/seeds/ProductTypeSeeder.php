<?php

use \App\Models\Products\ProductType;
use \App\Models\Products\Product;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

		factory(ProductType::class, 1)->create()->each(function ($productType) use ($faker)
		{
			// Make 50 products
			$products = factory(Product::class, 50)->make()->toArray();

			$productType->products()->createMany($products)->each(function($product) use ($faker)
			{
				$productDiet = factory(\App\Models\Products\ProductDiet::class)->make();
				$product->productDiet()->save($productDiet);

				$productNutrition = factory(\App\Models\Products\ProductNutrition::class)->make();
				$product->productNutrition()->save($productNutrition);

				$productIngredients = factory(\App\Models\Products\ProductIngredient::class, $faker->numberBetween(5, 10))->make()->toArray();
				$product->productIngredients()->createMany($productIngredients);

				$productRating = factory(\App\Models\Products\ProductRating::class)->make();
				$product->productRating()->save($productRating);
			});
		});
    }
}
