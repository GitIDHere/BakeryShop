<?php namespace App\Repositories;

use App\Models\Products\Images\ProductTypeImage;
use App\Repositories\Interfaces\IProductTypeImageRepository;


class ProductTypeImageRepository extends ModelRepository implements IProductTypeImageRepository
{
	/**
	 * @var ProductTypeImage
	 */
	private $_productTypeImage;


	public function __construct(ProductTypeImage $productTypeImage)
	{
		parent::__construct($productTypeImage);

		$this->_productTypeImage = $productTypeImage;
	}


	public function getImagesForProductType($productTypeId)
	{
		// TODO: Implement getImagesForProductType() method.
	}


	/**
	 * @param int $leadImageCount
	 * @param int $smallImageCount
	 * @param boolean $onlyActive
	 * @return array
	 */
	public function getImages($leadImageCount = 1, $smallImageCount = 4, $onlyActive = true)
	{
		$leadImageQ = $this->_productTypeImage::where('is_lead', '=', true);
		if($onlyActive) $leadImageQ->where('is_active', true);
		$leadImages = $leadImageQ->inRandomOrder()->limit($leadImageCount)->get()->all();

		$smallImageQ = $this->_productTypeImage::where('is_lead', '=', false);
		if($onlyActive) $smallImageQ->where('is_active', true);
		$smallImages = $smallImageQ->inRandomOrder()->limit($smallImageCount)->get()->all();

		return array_merge($leadImages, $smallImages);
	}

}
