<?php namespace App\Services\Interfaces;


interface IProductTypeService extends IModelService
{
	public function createProductType($name);
}