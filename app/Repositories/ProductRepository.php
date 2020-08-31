<?php namespace App\Repositories;

use App\Models\Products\Product;
use App\Models\Products\ProductType;
use App\Repositories\Interfaces\IProductRepository;

class ProductRepository extends ModelRepository implements IProductRepository
{
	/**
	 * @var Product
	 */
	private $_product;

	public function __construct(Product $product)
	{
		parent::__construct($product);
		$this->_product = $product;
	}

	/**
	 * @param ProductType $productType
	 * @param array $properties
	 * @return Product
	 */
	public function createProduct(ProductType $productType, array $properties)
	{
		$product = new Product($properties);
		$product->productType()->associate($productType);
		$product->save();
		return $product;
	}

}