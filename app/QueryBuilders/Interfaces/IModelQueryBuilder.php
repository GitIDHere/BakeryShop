<?php namespace App\QueryBuilders\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface IModelQueryBuilder
{
	public function initQueryBuilder() : IModelQueryBuilder;

	public function execute() : array;

	public function setModel(Model $model) : IModelQueryBuilder;

	public function whereId(int $id) : IModelQueryBuilder;

	public function whereIdsIn(int $id) : IModelQueryBuilder;

	public function limit(int $limit) : IModelQueryBuilder;

	public function with(string $modelName) : IModelQueryBuilder;

	public function orderBy(string $column) : IModelQueryBuilder;

	public function newBuilder() : IModelQueryBuilder;
}