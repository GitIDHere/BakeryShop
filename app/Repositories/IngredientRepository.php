<?php namespace App\Repositories;

use App\Models\Products\Interfaces\IProductModel;
use App\Models\Products\ProductIngredient;
use App\Repositories\Interfaces\IIngredientRepository;

class IngredientRepository extends ModelRepository implements IIngredientRepository
{
	private $_ingredient;

	public function __construct(ProductIngredient $ingredient)
	{
		parent::__construct($ingredient);

		$this->_ingredient = $ingredient;
	}

	/**
	 * @param IProductModel $product
	 * @param array $ingredientList
	 * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
	 */
	public function make(IProductModel $product, array $ingredientList)
	{
		return $product->productIngredients()->createMany($ingredientList)->toArray();
	}
}