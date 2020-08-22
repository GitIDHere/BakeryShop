<?php namespace App\Services;

use App\Repositories\Interfaces\IImageRepository;
use App\Services\Interfaces\IImageService;

class ImageService extends ModelService implements IImageService
{
	private $_imgRepo;

	public function __construct(IImageRepository $imgRepo)
	{
		parent::__construct($imgRepo);
		$this->_imgRepo = $imgRepo;
	}

	/**
	 * @param $objColl
	 * @param $orderBy
	 * @return mixed
	 */
	public function getImagesFor($objColl, $orderBy)
	{
		$imgColl = $this->_imgRepo->getImagesBy($objColl, $orderBy);
		return $imgColl;
	}
}