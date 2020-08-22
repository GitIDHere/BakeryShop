<?php namespace App\Services;

use App\Repositories\Interfaces\IModelRepository;

class ModelService implements Interfaces\IModelService
{
	protected  $_repo;

	public function __construct(IModelRepository $repository)
	{
		$this->_repo = $repository;
	}
}