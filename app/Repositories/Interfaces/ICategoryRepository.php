<?php namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ICategoryRepository extends IModelRepository
{
	public function getCategories(int $limit, bool $onlyPromoted = null);

	public function getProducts(Collection $categoryCollection, $maxItemsPerCategory = 6, $onlyActive = null);
}