<?php namespace App\Http\View\Composers\Home;

use App\Repositories\Interfaces\ICategoryRepository;
use App\Repositories\Interfaces\IProductRepository;
use App\Services\Interfaces\IProductService;
use Illuminate\View\View;

class PromotedProductsViewComposer
{
	/**
	 * @var ICategoryRepository
	 */
	private $_categoryRepo;

	/**
	 * @var IProductService
	 */
	private $_productService;


	public function __construct(ICategoryRepository $catRepo, IProductService $productService)
	{
		$this->_categoryRepo = $catRepo;
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
		$categoriesColl = $this->_categoryRepo->getCategories(4, true);

		$categoriesList = $categoriesColl->map(function($catCollection){
			return [
				'name' => $catCollection->name,
				'filter_name' => $catCollection->parsed_name,
			];
		})->toArray();


		$promotedProducts = $this->_productService->getFeaturedProductsByCategory($categoriesColl, 8);

		$categoryProducts = $promotedProducts->map(function ($product)
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