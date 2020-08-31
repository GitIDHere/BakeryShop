<?php namespace App\Services;

use App\Models\Products\Product;
use App\Models\Products\ProductType;
use App\Repositories\Interfaces\IImageRepository;
use App\Services\Interfaces\IImageService;

class ImageService extends ModelService implements IImageService
{
	/**
	 * @var IImageRepository
	 */
	private $_imgRepo;

	public function __construct(IImageRepository $imgRepo)
	{
		parent::__construct($imgRepo);
		$this->_imgRepo = $imgRepo;
	}

	/**
	 * @param int $productTypeId
	 * @return array
	 */
	public function getProductTypeImages(int $productTypeId) : array
	{
		$images = $this->_imgRepo->getObjectImages($productTypeId, ProductType::class);
		return $images;
	}

	/**
	 * @param int $productId
	 * @return array
	 */
	public function getProductImages(int $productId) : array
	{
		$images = $this->_imgRepo->getObjectImages($productId, Product::class);
		return $images;
	}
}