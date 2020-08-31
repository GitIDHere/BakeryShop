<?php namespace App\QueryBuilders\Interfaces;

interface IImageQueryBuilder extends IModelQueryBuilder
{
	public function whereLinkedObject(int $objId, string $objClass) : IImageQueryBuilder;

	public function wherePath(string $path): IImageQueryBuilder;

	public function whereWeight(int $weight, string $op='=') : IImageQueryBuilder;
}