<?php namespace App\Repositories\Interfaces;

use App\Models\Products\Product;
use App\Models\Products\ProductType;

interface IProductRepository extends IModelRepository
{
	# TODO - Remove ProductType
	public function createProduct(ProductType $productType, array $properties) : Product;

	public function getProductsFromCategories(array $categories, int $isActive, int $isFeatured, int $itemsPerCategory) : array;
}