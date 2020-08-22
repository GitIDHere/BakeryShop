<?php namespace App\Repositories;

use App\Models\Products\Product;
use App\Models\Products\ProductType;
use App\Repositories\Interfaces\IProductRepository;
use Illuminate\Support\Collection;

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


	/**
	 * @param Collection $categories
	 * @param $maxProductsPerCategory
	 * @return Collection
	 */
	public function getPromotedProductsByCategory(Collection $categories, $maxProductsPerCategory)
	{
		/*
		 * For each of the categories get products that are:
		 * 	- active
		 * 	- featured (PromotedProducts)
		 * 	- category (Categories)
		 */

		$productList = $categories->map(function($category) use ($maxProductsPerCategory)
		{
			$product = $this->_product->where('is_active', 1)
				->whereHas('categories', function($query) use($category) {
					$query->where('categories.id', '=', $category->id);
				})
				->whereHas('promotedProduct', function($query){
					$query->where('promoted_product.is_featured', '=', 1);
				})
				->limit($maxProductsPerCategory)
				->get()
				->all()
			;

			return $product;
		})
		->reject(function($collection){
			return (empty($collection));
		})
		->flatMap(function($productCollection){
			return $productCollection;
		})
		;

		return $productList;
	}



}