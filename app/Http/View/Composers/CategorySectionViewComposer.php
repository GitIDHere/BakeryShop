<?php namespace App\Http\View\Composers;

use App\Repositories\Interfaces\IPromotedProductTypeRepository;
use App\Services\Interfaces\IImageService;
use Illuminate\View\View;

class CategorySectionViewComposer
{
	/**
	 * @var IImageService
	 */
	private $_imgService;

	/**
	 * @var
	 */
	private $_promotedProductTypeRepo;


	public function __construct(IImageService $imgService, IPromotedProductTypeRepository $promotedProductTypeRepo)
	{
		$this->_imgService = $imgService;
		$this->_promotedProductTypeRepo = $promotedProductTypeRepo;
	}


	/**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
	public function compose(View $view)
	{
		$promotedProductTypes = $this->_promotedProductTypeRepo->getHeaderTiles(5);

		//Order by weight
		$orderBy = ['col' => 'weight', 'dir' => 'DESC'];
		$imageCollection = $this->_imgService->getImagesFor($promotedProductTypes, $orderBy);

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