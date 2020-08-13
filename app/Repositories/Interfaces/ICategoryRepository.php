<?php namespace App\Repositories\Interfaces;

interface ICategoryRepository extends IModelRepository
{
	public function getCategories(int $limit, bool $onlyPromoted = null);
}