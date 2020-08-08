<?php namespace App\Repositories\Interfaces;

use App\Models\Products\Interfaces\IProductModel;

interface IIngredientRepository extends IModelRepository
{
	public function make(IProductModel $product, array $ingredientList);
}