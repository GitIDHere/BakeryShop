<?php namespace App\Services\Interfaces;

use App\Models\Products\ProductType;

interface IProductTypeService extends IModelService
{
	public function createProductType(string $name) : ProductType;
}