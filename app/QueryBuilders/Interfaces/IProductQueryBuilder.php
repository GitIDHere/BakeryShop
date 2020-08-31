<?php namespace App\QueryBuilders\Interfaces;

interface IProductQueryBuilder extends IBaseQueryBuilder
{
	public function isActive($isActive) : IProductQueryBuilder;

	public function isFeatured($isFeatured) : IProductQueryBuilder;

	public function hasCategory($category) : IProductQueryBuilder;

}