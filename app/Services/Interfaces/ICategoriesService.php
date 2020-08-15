<?php namespace App\Services\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ICategoriesService extends IModelService
{
	public function getCategories($limit = 3, $onlyPromoted = null);

	public function getProducts(Collection $categoryCollection, $limit = 6, $onlyActive = null);
}