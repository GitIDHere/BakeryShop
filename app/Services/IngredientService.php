<?php namespace App\Services;

use App\Models\Products\Interfaces\IProductModel;
use App\Repositories\Interfaces\IIngredientRepository;
use App\Services\Interfaces\IIngredientService;

class IngredientService extends ModelService implements IIngredientService
{
	private $_ingredientRepo;


	public function __construct(IIngredientRepository $repository)
	{
		parent::__construct($repository);

		$this->_ingredientRepo = $repository;
	}

}