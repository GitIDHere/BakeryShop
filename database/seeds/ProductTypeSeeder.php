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

		factory(ProductType::class, 10)->create()->each(function ($productType) use ($faker)
		{
			// ProductTypeImage
			$productTypeImage = factory(\App\Models\Products\Images\ProductTypeImage::class)->make();
			$productType->productTypeImage()->save($productTypeImage);

			// Make 5 products
			$products = factory(Product::class, 5)->make()->toArray();

			$productType->products()->createMany($products)->each(function($product) use ($faker)
			{
				//Categories
				$categories = factory(\App\Models\Products\Categories::class, $faker->numberBetween(2, 3))->make()->toArray();
				$product->categories()->createMany($categories);

				// ProductPrice
				$productPrice = factory(\App\Models\Products\ProductPrice::class)->make();
				$product->productPrice()->save($productPrice);

				$dietary = factory(\App\Models\Products\Dietary::class)->make();
				$product->dietary()->save($dietary);

				$nutrition = factory(\App\Models\Products\Nutrition::class)->make();
				$product->nutrition()->save($nutrition);

				$ingredients = factory(\App\Models\Products\Ingredient::class, $faker->numberBetween(5, 10))->make()->toArray();
				$product->ingredients()->createMany($ingredients);

				$productRating = factory(\App\Models\Products\ProductRating::class)->make();
				$product->productRating()->save($productRating);
			});
		});
    }
}
