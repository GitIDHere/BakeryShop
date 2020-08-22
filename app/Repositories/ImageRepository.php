<?php namespace App\Repositories;

use App\Models\Products\Images\Image;
use App\Repositories\Interfaces\IImageRepository;

class ImageRepository extends ModelRepository implements IImageRepository
{
	private $_image;

	public function __construct(Image $image)
	{
		parent::__construct($image);
		$this->_image = $image;
	}

	/**
	 * @param $objCollection
	 * @param $orderBy
	 * @return \Illuminate\Support\Collection
	 */
	public function getImagesBy($objCollection, $orderBy)
	{
		$imgArray = [];
		$objCollection->each(function($obj) use (&$imgArray)
		{
			$imgs = $obj->image->all();
			if (!empty($imgs)) {
				foreach ($imgs as $img) {
					$imgArray[] = $img;
				}
			}
		});

		$orderCol = $orderBy['col'];
		$orderDir = strtolower($orderBy['dir']);

		uasort($imgArray, function ($a, $b) use($orderCol, $orderDir)
		{

			if (isset($a->{$orderCol}) == false || isset($b->{$orderCol}) == false) {
				return  1;
			}

			if ($orderDir == 'desc') {
				return $a->{$orderCol} > $b->{$orderCol} ? -1 : 1;
			}

			if ($orderDir == 'asc') {
				return $a->{$orderCol} > $b->{$orderCol} ? 1 : -1;
			}

			return 0;
		});

		return collect($imgArray);
	}

}