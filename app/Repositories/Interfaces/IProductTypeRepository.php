<?php namespace App\Repositories\Interfaces;

interface IProductTypeRepository extends IModelRepository
{
	public static function getByName($name);
}