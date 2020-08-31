<?php namespace App\QueryBuilders;

use App\Models\Products\Categories;
use App\QueryBuilders\Interfaces\ICategoryQueryBuilder;

class CategoryQueryBuilder extends ModelQueryBuilder implements ICategoryQueryBuilder
{

	public function __construct(Categories $model)
	{
		parent::__construct($model);
	}

	/**
	 * @param bool $isPromoted
	 * @return ICategoryQueryBuilder
	 */
	public function isPromoted(bool $isPromoted): ICategoryQueryBuilder
	{
		$this->_builder->where('is_promoted', '=', $isPromoted);
		return $this;
	}

	/**
	 * @param string $name
	 * @return ICategoryQueryBuilder
	 */
	public function whereName(string $name): ICategoryQueryBuilder
	{
		$this->_builder->where('name', '=', $name);
		return $this;
	}

	/**
	 * @param array $categoryNames
	 * @return ICategoryQueryBuilder
	 */
	public function whereNameIn(array $categoryNames): ICategoryQueryBuilder
	{
		$this->_builder->whereIn('name', $categoryNames);
		return $this;
	}
}