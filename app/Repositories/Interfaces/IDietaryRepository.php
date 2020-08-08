<?php namespace App\Repositories\Interfaces;

use App\Models\Products\Interfaces\IProductModel;

interface IDietaryRepository extends IModelRepository
{
	public function make(IProductModel $product, array $properties);
}