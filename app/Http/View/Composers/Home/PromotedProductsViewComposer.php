<?php namespace App\Http\View\Composers\Home;

use App\Repositories\Interfaces\ICategoryRepository;
use App\Repositories\Interfaces\IProductRepository;
use App\Services\Interfaces\ICategoriesService;
use App\Services\Interfaces\IProductService;
use Illuminate\View\View;

class PromotedProductsViewComposer
{
	/**
	 * @var ICategoriesService
	 */
	private $_categoryService;

	/**
	 * @var IProductService
	 */
	private $_productService;


	public function __construct(ICategoriesService $categoriesService, IProductService $productService)
	{
		$this->_categoryService = $categoriesService;
		$this->_productService = $productService;
	}

	/**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
	public function compose(View $view)
	{
		$categories = $this->_categoryService->getPromotedCategories(4);

		foreach ($categories as $category) {
			$categoriesList[] = [
				'name' => $category->name,
				'filter_name' => $category->parsed_name,
			];
		}

		$promotedProducts = $this->_productService->getFeaturedProductsByCategories($categories, 8);

		$categoryProducts = collect($promotedProducts)->map(function ($product)
		{
			$categoryNames = $product->categories->pluck('name')->all();

			$price = $product->productPrice->price_per_unit;
			$discountedPrice = $product->productPrice->discounted_price;
			$avgRating = $product->productRating->avg_rating;
			$isNew = $product->is_new;

			/*
			 * Get the highest weighted image
			 */
			$imgArr = $product->image;
			$maxWeight = $imgArr->max('weight');
			$firstImg = $imgArr->firstWhere('weight', $maxWeight);

			return [
				'name' => $product->name,
				'avg_rating' => $avgRating,
				'is_new' => $isNew,
				'on_sale' => $product->is_on_sale,
				'sale_price' => $discountedPrice,
				'price' => $price,
				'categories' => array_map('strtolower', $categoryNames),
				'img' => $firstImg->path,
				# TODO - Get the total sale and
				'out_of_stock' => false,
			];
		});

		$view->with('promoted_categories', $categoriesList)->with('promoted_products', $categoryProducts);
	}
}