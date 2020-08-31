<?php namespace App\Repositories;

use App\Models\Products\ProductType;
use App\QueryBuilders\Interfaces\IProductQueryBuilder;
use App\Repositories\Interfaces\IProductTypeRepository;

class ProductTypeRepository extends ModelRepository implements IProductTypeRepository
{
	/**
	 * @var ProductType
	 */
	private $_productTypeModel;

	/**
	 * @var IProductQueryBuilder
	 */
	private $_queryBuilder;


	public function __construct(ProductType $model, IProductQueryBuilder $queryBuilder)
	{
		parent::__construct($model);

		$this->_productTypeModel = $model;
		$this->_queryBuilder = $queryBuilder;
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