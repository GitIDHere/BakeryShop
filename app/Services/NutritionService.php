<?php namespace App\Services;

use App\Models\Products\Interfaces\IProductModel;
use App\Repositories\Interfaces\INutritionRepository;
use App\Services\Interfaces\INutritionService;

class NutritionService extends ModelService implements INutritionService
{
	private $_nutritionRepo;


	public function __construct(INutritionRepository $repository)
	{
		parent::__construct($repository);

		$this->_nutritionRepo = $repository;
	}
}