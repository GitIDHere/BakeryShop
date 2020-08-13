<?php namespace App\Http\View\Composers;

use App\Services\Interfaces\ICategoriesService;
use Illuminate\View\View;

class PromotedProductsViewComposer
{
	/**
	 * @var ICategoriesService
	 */
	private $_categoryService;

	public function __construct(ICategoriesService $categoriesService)
	{
		$this->_categoryService = $categoriesService;
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

		$promotedCategories = $this->_categoryService->getPromotedCategories(5);

		$categoriesList = $promotedCategories->map(function($catCollection){
			return [
				'name' => $catCollection->name,
				'filter_name' => $catCollection->parsed_name,
			];
		})->toArray();


		

		$view->with('promoted_categories', $categoriesList)->with('promoted_products', $promotedProducts);
	}
}