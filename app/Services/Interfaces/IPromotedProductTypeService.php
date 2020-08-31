<?php namespace App\Services\Interfaces;

interface IPromotedProductTypeService extends IModelService
{
	public function getHeaderTiles(int $limit) : array;
}