<?php namespace App\Repositories;

use App\Models\Products\Interfaces\IProductModel;
use App\Models\Products\ProductDiet;
use App\Repositories\Interfaces\IDietRepository;

class DietRepository extends ModelRepository implements IDietRepository
{
	/**
	 * @var ProductDiet
	 */
	private $_diet;

	public function __construct(ProductDiet $diet)
	{
		parent::__construct($diet);

		$this->_diet = $diet;
	}

	/**
	 * @param IProductModel $product
	 * @param array $properties
	 * @return ProductDiet
	 */
	public function make(IProductModel $product, $properties)
	{
		$diet = new ProductDiet($properties);
		$diet->product()->associate($product);
		$diet->save();
		return $diet;
	}

}