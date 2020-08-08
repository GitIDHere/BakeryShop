<?php namespace App\Repositories;

use App\Models\Products\Dietary;
use App\Models\Products\Interfaces\IProductModel;
use App\Repositories\Interfaces\IDietaryRepository;

class DietaryRepository extends ModelRepository implements IDietaryRepository
{
	/**
	 * @var Dietary
	 */
	private $_diet;

	public function __construct(Dietary $diet)
	{
		parent::__construct($diet);

		$this->_diet = $diet;
	}

	/**
	 * @param IProductModel $product
	 * @param array $properties
	 * @return Dietary
	 */
	public function make(IProductModel $product, $properties)
	{
		$diet = new Dietary($properties);
		$diet->product()->associate($product);
		$diet->save();
		return $diet;
	}

}