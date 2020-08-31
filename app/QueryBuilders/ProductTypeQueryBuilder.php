<?php namespace App\QueryBuilders;

use App\Models\Products\ProductType;
use App\QueryBuilders\Interfaces\IProductTypeQueryBuilder;

class ProductTypeQueryBuilder extends ModelQueryBuilder implements IProductTypeQueryBuilder
{

	public function __construct(ProductType $model)
	{
		parent::__construct($model);
	}

	/**
	 * @param $name
	 * @return IProductTypeQueryBuilder
	 */
	public function whereName($name): IProductTypeQueryBuilder
	{
		$this->_builder->where('name', '=', $name);
		return $this;
	}
}