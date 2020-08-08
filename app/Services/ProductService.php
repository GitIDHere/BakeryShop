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
	 * @param \App\Models\Products\ProductType $productType
	 * @param array $props
	 * @return mixed
	 */
	public function createProduct($productType, $props)
	{
		return $this->_productRepo->createProduct($productType, $props);
	}

}