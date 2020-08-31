<?php namespace App\QueryBuilders\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface IBaseQueryBuilder
{
	public function setModel(Model $model);

	public function execute();

	public function limit($limit) : IBaseQueryBuilder;

	public function newBuilder() : IBaseQueryBuilder;
}