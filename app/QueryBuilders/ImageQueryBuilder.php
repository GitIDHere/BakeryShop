<?php namespace App\QueryBuilders;

use App\Models\Products\Images\Image;
use App\QueryBuilders\Interfaces\IImageQueryBuilder;

class ImageQueryBuilder extends ModelQueryBuilder implements IImageQueryBuilder
{

	public function __construct(Image $model)
	{
		parent::__construct($model);
	}

	/**
	 * @param int $objId
	 * @param string $objClass
	 * @return IImageQueryBuilder
	 */
	public function whereLinkedObject(int $objId, string $objClass): IImageQueryBuilder
	{
		$this->_builder
			->where('imagetable_id', '=', $objId)
			->where('imagetable_type', '=', $objClass)
		;
		return $this;
	}

	/**
	 * @param string $path
	 * @return IImageQueryBuilder
	 */
	public function wherePath(string $path): IImageQueryBuilder
	{
		$this->_builder->where('path', '=', $path);
		return $this;
	}

	/**
	 * @param $weight
	 * @param $op
	 * @return IImageQueryBuilder
	 */
	public function whereWeight($weight, $op='='): IImageQueryBuilder
	{
		$this->_builder->where('weight', $op, $weight);
		return $this;
	}

}