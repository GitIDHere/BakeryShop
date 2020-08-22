<?php namespace App\Repositories\Interfaces;

interface IProductTypeRepository extends IModelRepository
{
	public static function getByName($name);

	public function getProductTypes($limit);
}