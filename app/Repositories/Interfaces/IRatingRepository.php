<?php namespace App\Repositories\Interfaces;

use App\Models\Products\Interfaces\IProductModel;

interface IRatingRepository extends IModelRepository
{
	public function make(IProductModel $product);
}