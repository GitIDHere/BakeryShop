<?php namespace App\Repositories;

use App\Models\Products\Interfaces\IProductModel;
use App\Models\Products\Ingredient;
use App\Repositories\Interfaces\IIngredientRepository;

class IngredientRepository extends ModelRepository implements IIngredientRepository
{
	private $_ingredient;

	public function __construct(Ingredient $ingredient)
	{
		parent::__construct($ingredient);

		$this->_ingredient = $ingredient;
	}

	/**
	 * @param IProductModel $product
	 * @param array $ingredientList
	 * @return mixed
	 */
	public function make(IProductModel $product, array $ingredientList)
	{
		return $product->ingredients()->createMany($ingredientList)->toArray();
	}
}