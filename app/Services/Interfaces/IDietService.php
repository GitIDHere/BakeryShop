<?php namespace App\Services\Interfaces;

use App\Models\Products\Interfaces\IProductModel;

interface IDietService extends IModelService
{
	public function make(IProductModel $product, array $properties);

}