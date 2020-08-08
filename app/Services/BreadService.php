<?php namespace App\Services;

use App\Repositories\Interfaces\IBreadRepository;
use App\Repositories\Interfaces\IDietRepository;
use App\Repositories\Interfaces\IIngredientRepository;
use App\Repositories\Interfaces\INutritionRepository;
use App\Repositories\Interfaces\IRatingRepository;
use App\Services\Interfaces\IBreadService;
use App\Services\Interfaces\IDietService;
use App\Services\Interfaces\IIngredientService;
use App\Services\Interfaces\INutritionService;
use App\Services\Interfaces\IRatingService;

class BreadService extends ProductService implements IBreadService
{
	/**
	 * @var IDietService
	 */
	private $_dietService;
	/**
	 * @var INutritionService
	 */
	private $_nutritionService;
	/**
	 * @var IIngredientService
	 */
	private $_ingredientService;
	/**
	 * @var IRatingService
	 */
	private $_ratingService;
	/**
	 * @var IBreadRepository
	 */
	private $_breadRepo;


	public function __construct(IBreadRepository $breadRepository, IDietService $dietService,
		INutritionService $nutritionService, IIngredientService $ingredientService, IRatingService $ratingService)
	{
		parent::__construct($breadRepository);

		$this->_breadRepo = $breadRepository;
		$this->_dietService = $dietService;
		$this->_nutritionService = $nutritionService;
		$this->_ingredientService = $ingredientService;
		$this->_ratingService = $ratingService;
	}


	/**
	 * @param \App\Models\Products\ProductType $breadProductType
	 * @param array $breadVals
	 * @param array $dietVals
	 * @param array $nutritionVals
	 * @param array $ingredientVals
	 * @return bool
	 */
	public function makeBread($breadProductType, $breadVals, $dietVals, $nutritionVals, $ingredientVals)
	{
		if(is_object($breadProductType))
		{
			$bread = $this->_breadRepo->bake($breadProductType, $breadVals);

			if (is_object($bread))
			{
				$this->_dietService->make($bread, $dietVals);
				$this->_nutritionService->make($bread, $nutritionVals);
				$this->_ingredientService->make($bread, $ingredientVals);
				$this->_ratingService->make($bread);
				return $bread;
			}
		}

		return false;
	}
}

