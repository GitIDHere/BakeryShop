<?php namespace App\Repositories\Interfaces;

use App\Models\Products\ProductType;

interface IBreadRepository extends IProductRepository
{
	public function bake(ProductType $productType, $properties);
}