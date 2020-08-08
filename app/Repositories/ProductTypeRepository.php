<?php namespace App\Repositories;

use App\Models\Products\ProductType;
use App\Repositories\Interfaces\IProductTypeRepository;

class ProductTypeRepository extends ModelRepository implements IProductTypeRepository
{
	/**
	 * @var ProductType
	 */
	private $_productTypeModel;


	public function __construct(ProductType $model)
	{
		parent::__construct($model);

		$this->_productTypeModel = $model;
	}

	/**
	 * @param $name
	 * @return mixed
	 */
	public static function getByName($name)
	{
		return ProductType::where('name', $name)->first();
	}

}