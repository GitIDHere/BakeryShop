<?php namespace App\Repositories;

use App\Models\Products\Interfaces\IProductModel;
use App\Models\Products\Nutrition;
use App\Repositories\Interfaces\INutritionRepository;

class NutritionRepository extends ModelRepository implements INutritionRepository
{
	/**
	 * @var Nutrition
	 */
	private $_nutrition;

	public function __construct(Nutrition $nutrition)
	{
		parent::__construct($nutrition);

		$this->_nutrition = $nutrition;
	}

	/**
	 * @param IProductModel $product
	 * @param array $properties
	 * @return Nutrition
	 */
	public function make(IProductModel $product, array $properties)
	{
		$nutrition = new Nutrition($properties);
		$nutrition->product()->associate($product);
		$nutrition->save();
		return $nutrition;
	}
}