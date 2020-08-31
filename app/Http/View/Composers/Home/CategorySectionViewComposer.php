<?php namespace App\Http\View\Composers\Home;

use App\Repositories\Interfaces\IPromotedProductTypeRepository;
use App\Services\Interfaces\IImageService;
use App\Services\Interfaces\IPromotedProductService;
use App\Services\Interfaces\IPromotedProductTypeService;
use Illuminate\View\View;

class CategorySectionViewComposer
{
	/**
	 * @var IImageService
	 */
	private $_imgService;

	/**
	 * @var IPromotedProductService
	 */
	private $_promotedProductTypeService;


	public function __construct(IImageService $imgService, IPromotedProductTypeService $promotedProductTypeService)
	{
		$this->_imgService = $imgService;
		$this->_promotedProductTypeService = $promotedProductTypeService;
	}


	/**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
	public function compose(View $view)
	{
		$productTypes = $this->_promotedProductTypeService->getHeaderTiles(5);
		$productTypeCollection = collect($productTypes);

		$imageCollection = $productTypeCollection->map(function($productType)
		{
			return $this->_imgService->getProductTypeImages($productType->id);
		})->flatten();

		// Lead image - the first one from the list
		$leadImg = $imageCollection->shift();
		$leadProductType = $leadImg->imagetable;
		$leadTile = [
			'img' => $leadImg->path,
			'title' => $leadProductType->name,
			//'product_count' => $leadProductType->loadCount('products')->products_count
		];

		// Small tiles
		$smallCategories = $imageCollection->map(function ($img) {
			$prodType = $img->imagetable;
			return [
				'img' => $img->path,
				'title' => $prodType->name,
				//'product_count' => $prodType->loadCount('products')->products_count
			];
		});

		$view->with('lead_tile', $leadTile)->with('small_tiles', $smallCategories);
	}

}