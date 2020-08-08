<?php namespace App\Services\Interfaces;

use App\Models\Products\Interfaces\IProductModel;

interface IDietaryService extends IModelService
{
	public function make(IProductModel $product, array $properties);

}