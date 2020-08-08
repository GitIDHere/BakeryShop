<?php namespace App\Repositories;

use App\Models\Products\Bread;
use App\Models\Products\Product;
use App\Models\Products\ProductType;
use App\Repositories\Interfaces\IBreadRepository;

class BreadRepository extends ProductRepository implements IBreadRepository
{
	/**
	 * @var Bread
	 */
	private $_bread;

	/**
	 * @var string
	 */
	private $_unit = 'loaf';

	/**
	 * @var bool
	 */
	private $_is_eaten = true;

	public function __construct(Product $bread)
	{
		parent::__construct($bread);
		$this->_bread = $bread;
	}

	/**
	 * @param ProductType $breadProductType
	 * @param $properties
	 * @return Product
	 */
	public function bake(ProductType $breadProductType, $properties)
	{
		// Set the unit of the bread
		$properties['unit'] = $this->_unit;
		$properties['is_eaten'] = $this->_is_eaten;

		$bread = new Product($properties);
		$bread->productType()->associate($breadProductType);
		$bread->save();
		return  $bread;
	}

}






















