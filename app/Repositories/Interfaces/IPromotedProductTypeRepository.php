<?php namespace App\Repositories\Interfaces;

interface IPromotedProductTypeRepository extends IModelRepository
{
	public function getProductTypes(bool $isHeaderTile, int $limit) : array ;
}