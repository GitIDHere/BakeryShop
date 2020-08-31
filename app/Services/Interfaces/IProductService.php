<?php namespace App\Services\Interfaces;

use Illuminate\Support\Collection;

interface IProductService extends IModelService
{
	public function getFeaturedProductsByCategory(Collection $collection, $maxItemsPerCategory);

}