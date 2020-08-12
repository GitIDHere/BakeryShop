<?php namespace App\Services;

use App\Repositories\Interfaces\IProductTypeImageRepository;
use App\Services\Interfaces\IProductTypeImageService;

class ProductTypeImageService extends ModelService implements IProductTypeImageService
{

	private $_productTypeImageRepo;

	private $_maxLargeTileImgs = 1;
	private $_maxSmallTileImgs = 4;



	public function __construct(IProductTypeImageRepository $productTypeImageRepo)
	{
		parent::__construct($productTypeImageRepo);

		$this->_productTypeImageRepo = $productTypeImageRepo;
	}


	/**
	 * @return \Illuminate\Support\Collection
	 */
	public function getCategorySectionImages()
	{
		$productTypeImages = $this->_productTypeImageRepo->getImages($this->_maxLargeTileImgs, $this->_maxSmallTileImgs);

		$results = collect($productTypeImages)->map(function ($productTypeImage)
		{
			return [
				'img' => $productTypeImage->tile_image,
				'title' => $productTypeImage->productType->name,
				'is_lead' => $productTypeImage->is_lead,
				// https://laravel.com/docs/7.x/eloquent-relationships#counting-related-models
				'product_count' => $productTypeImage->productType->loadCount('products')->products_count,
			];
		});

		return $results;
	}

}