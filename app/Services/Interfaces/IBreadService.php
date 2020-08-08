<?php namespace App\Services\Interfaces;

use App\Models\Products\ProductType;

interface IBreadService extends IProductService
{
	public function makeBread(ProductType $breadProductType, array $breadVals, array $dietVals,
							  array $nutritionVals, array $ingredientVals);
}