<?php namespace App\Repositories;

use App\Models\Products\Interfaces\IProductModel;
use App\Models\Products\ProductNutrition;
use App\Repositories\Interfaces\INutritionRepository;

class NutritionRepository extends ModelRepository implements INutritionRepository
{
	/**
	 * @var ProductNutrition
	 */
	private $_nutrition;

	public function __construct(ProductNutrition $nutrition)
	{
		parent::__construct($nutrition);

		$this->_nutrition = $nutrition;
	}

	/**
	 * @param IProductModel $product
	 * @param array $properties
	 * @return ProductNutrition
	 */
	public function make(IProductModel $product, array $properties)
	{
		$nutrition = new ProductNutrition($properties);
		$nutrition->product()->associate($product);
		$nutrition->save();
		return $nutrition;
	}
}