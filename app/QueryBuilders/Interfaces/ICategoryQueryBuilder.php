<?php namespace App\QueryBuilders\Interfaces;

interface ICategoryQueryBuilder extends IModelQueryBuilder
{
	public function isPromoted(bool $isPromoted) : ICategoryQueryBuilder;

	public function whereName(string $name) : ICategoryQueryBuilder;

	public function whereNameIn(array $categoryNames) : ICategoryQueryBuilder;
}