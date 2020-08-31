<?php namespace App\QueryBuilders\Interfaces;

interface IPromotedProductTypeQueryBuilder extends IModelQueryBuilder
{
	public function whereShowOnHeaderTiles(bool $isShowOnHeaderTile) : IPromotedProductTypeQueryBuilder;

	public function whereProductTypeIn(array $productTypes);
}