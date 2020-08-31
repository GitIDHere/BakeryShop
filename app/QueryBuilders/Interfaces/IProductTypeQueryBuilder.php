<?php namespace App\QueryBuilders\Interfaces;


interface IProductTypeQueryBuilder extends IModelQueryBuilder
{
	public function whereName(string $name) : IProductTypeQueryBuilder;
}