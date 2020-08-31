<?php namespace App\Repositories;

use App\Models\Products\Product;
use App\Models\Products\ProductType;
use App\QueryBuilders\Interfaces\IProductQueryBuilder;
use App\Repositories\Interfaces\IProductRepository;

class ProductRepository extends ModelRepository implements IProductRepository
{
	/**
	 * @var Product
	 */
	private $_product;

	/**
	 * @var IProductQueryBuilder
	 */
	private $_queryBuilder;


	public function __construct(Product $product, IProductQueryBuilder $queryBuilder)
	{
		parent::__construct($product);

		$this->_product = $product;
		$this->_queryBuilder = $queryBuilder;
	}

	/**
	 * @param ProductType $productType
	 * @param array $properties
	 * @return Product
	 */
	public function createProduct(ProductType $productType, array $properties) : Product
	{
		$product = new Product($properties);
		$product->productType()->associate($productType);
		$product->save();
		return $product;
	}


	/**
	 * @param array $categories
	 * @param int $isActive
	 * @param int $isFeatured
	 * @param int $itemsPerCategory
	 * @return array
	 */
	public function getProductsFromCategories(array $categories, int $isActive, int $isFeatured, int $itemsPerCategory) : array
	{

		$productList = collect($categories)->map(function($category) use ($isActive, $isFeatured, $itemsPerCategory)
		{
			$product = $this->_queryBuilder
				->initQueryBuilder()
				->isActive($isActive)
				->isFeatured($isActive)
				->hasCategory($category)
				->limit($itemsPerCategory)
				->execute()
			;

			return $product;
		})->flatten()->all();

		return $productList;
	}

}