<?php namespace App\Repositories\Interfaces;

interface ICategoryRepository extends IModelRepository
{
	public function getPromotedCategories(int $limit, bool $isPromoted) : array ;
}