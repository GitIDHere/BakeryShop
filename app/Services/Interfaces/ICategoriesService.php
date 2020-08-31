<?php namespace App\Services\Interfaces;


interface ICategoriesService extends IModelService
{
	public function getPromotedCategories(int $limit) : array;

}