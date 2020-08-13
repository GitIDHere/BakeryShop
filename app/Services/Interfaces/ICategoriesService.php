<?php namespace App\Services\Interfaces;

interface ICategoriesService extends IModelService
{
	public function getPromotedCategories($limit = 3);
}