<?php namespace App\Services\Interfaces;

interface IProductService extends IModelService
{
	public function getFeaturedProductsByCategories(array $categories, int $itemsPerCategory) : array;
}