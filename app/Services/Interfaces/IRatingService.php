<?php namespace App\Services\Interfaces;

use App\Models\Products\Interfaces\IProductModel;

interface IRatingService extends IModelService
{
	public function make(IProductModel $product);
}