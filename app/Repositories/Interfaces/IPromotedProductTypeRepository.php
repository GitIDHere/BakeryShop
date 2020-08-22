<?php namespace App\Repositories\Interfaces;



interface IPromotedProductTypeRepository extends IModelRepository
{
	public function getHeaderTiles($limit);
}