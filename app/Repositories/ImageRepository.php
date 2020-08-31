<?php namespace App\Repositories;

use App\Models\Products\Images\Image;
use App\Models\Products\Product;
use App\Models\Products\ProductType;
use App\QueryBuilders\Interfaces\IImageQueryBuilder;
use App\Repositories\Interfaces\IImageRepository;

class ImageRepository extends ModelRepository implements IImageRepository
{
	/**
	 * @var Image
	 */
	private $_image;

	/**
	 * @var IImageQueryBuilder
	 */
	private $_queryBuilder;


	public function __construct(Image $image, IImageQueryBuilder $builder)
	{
		parent::__construct($image);

		$this->_image = $image;
		$this->_queryBuilder = $builder;
	}


	/**
	 * @param int $objId
	 * @param string $objClass
	 * @return array
	 */
	public function getObjectImages(int $objId, string $objClass) : array
	{
		$images = $this->_queryBuilder
			->initQueryBuilder()
			->whereLinkedObject($objId, $objClass)
			->orderBy('weight', 'desc')
			->execute()
		;

		return $images;
	}
}