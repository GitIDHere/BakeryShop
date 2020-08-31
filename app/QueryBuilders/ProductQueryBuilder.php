<?php namespace App\QueryBuilders;

use App\Models\Products\Product;
use App\QueryBuilders\Interfaces\IProductQueryBuilder;

class ProductQueryBuilder extends ModelQueryBuilder implements IProductQueryBuilder
{

	public function __construct(Product $model)
	{
		parent::__construct($model);
	}

	/**
	 * @param $isActive
	 * @return $this
	 */
	public function isActive($isActive) : IProductQueryBuilder
	{
		$this->_builder->where('product.is_active','=', $isActive);
		return $this;
	}

	/**
	 * @param $isFeatured
	 * @return $this
	 */
	public function isFeatured($isFeatured) : IProductQueryBuilder
	{
		$this->_builder->whereHas('promotedProduct', function($query) use($isFeatured) {
			$query->where('promoted_product.is_featured', '=', $isFeatured);
		});

		return $this;
	}

	/**
	 * @param $category
	 * @return $this
	 */
	public function hasCategory($category) : IProductQueryBuilder
	{
		$this->_builder->whereHas('categories', function($query) use($category) {
			$query->where('categories.id', '=', $category->id);
		});
		return $this;
	}

}