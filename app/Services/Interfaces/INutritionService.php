<?php namespace App\Services\Interfaces;

use App\Models\Products\Interfaces\IProductModel;

interface INutritionService extends IModelService
{
	public function make(IProductModel $product, array $properties);
}