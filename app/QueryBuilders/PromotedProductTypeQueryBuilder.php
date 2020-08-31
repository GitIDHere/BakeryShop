<?php namespace App\QueryBuilders;

use App\Models\Products\PromotedProductType;
use App\QueryBuilders\Interfaces\IPromotedProductTypeQueryBuilder;

class PromotedProductTypeQueryBuilder extends ModelQueryBuilder implements IPromotedProductTypeQueryBuilder
{

	public function __construct(PromotedProductType $model)
	{
		parent::__construct($model);
	}

	/**
	 * @param bool $isShowOnHeaderTile
	 * @return IPromotedProductTypeQueryBuilder
	 */
	public function whereShowOnHeaderTiles(bool $isShowOnHeaderTile): IPromotedProductTypeQueryBuilder
	{
		$this->_builder->where('show_on_home_header_tiles', $isShowOnHeaderTile);
		return $this;
	}

	/**
	 * @param array $productTypes
	 * @return $this
	 */
	public function whereProductTypeIn(array $productTypes)
	{
		$this->_builder->whereIn('product_type_id', $productTypes);
		return $this;
	}
}