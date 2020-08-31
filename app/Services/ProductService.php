<?php namespace App\Services;

use App\Repositories\Interfaces\IProductRepository;
use App\Services\Interfaces\IProductService;

class ProductService extends ModelService implements IProductService
{
	/**
	 * @var IProductRepository
	 */
	private $_productRepo;


	public function __construct(IProductRepository $productRepository)
	{
		parent::__construct($productRepository);

		$this->_productRepo = $productRepository;
	}


	/**
	 * @param array $categories
	 * @param int $itemsPerCategory
	 * @return array
	 */
	public function getFeaturedProductsByCategories(array $categories, int $itemsPerCategory): array
	{
		$productList = $this->_productRepo->getProductsFromCategories($categories, true, true, $itemsPerCategory);
		return $productList;
	}

}