<?php namespace App\Services\Interfaces;

use App\Models\Products\ProductType;

interface IProductService extends IModelService
{
	public function createProduct(ProductType $productType, array $props);
}