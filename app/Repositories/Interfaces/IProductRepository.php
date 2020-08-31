<?php namespace App\Repositories\Interfaces;

use App\Models\Products\ProductType;
use Illuminate\Support\Collection;

interface IProductRepository extends IModelRepository
{
	# TODO - Remove ProductType
	public function createProduct(ProductType $productType, array $properties);
}