<?php namespace App\Http\View\Composers;

use App\Repositories\Interfaces\ICategoryRepository;
use App\Repositories\Interfaces\IProductRepository;
use App\Services\Interfaces\IProductService;
use App\Services\Interfaces\IPromotedProductService;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PromotedProductsViewComposer
{
	/**
	 * @var ICategoryRepository
	 */
	private $_categoryRepo;

	/**
	 * @var IProductRepository
	 */
	private $_productRepo;


	public function __construct(ICategoryRepository $catRepo, IProductRepository $productRepository)
	{
		$this->_categoryRepo = $catRepo;
		$this->_productRepo = $productRepository;
	}

	/**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
	public function compose(View $view)
	{
		/*
		 * -> promoted_categories
		 * - filter_name
		 * - name
		 *
		 * -> promoted_products
		 * - categories
		 * - img
		 * - is_new
		 * - out_of_stock
		 * - on_sale
		 * - name
		 * - avg_rating
		 * - sale_price
		 * - price
		 *
		 */

		$categoriesColl = $this->_categoryRepo->getCategories(4, true);

		$categoriesList = $categoriesColl->map(function($catCollection){
			return [
				'name' => $catCollection->name,
				'filter_name' => $catCollection->parsed_name,
			];
		})->toArray();


		$promotedProducts = $this->_productRepo->getPromotedProductsByCategory($categoriesColl, 8);

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

