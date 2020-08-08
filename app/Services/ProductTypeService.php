<?php namespace App\Services;

use App\Repositories\Interfaces\IProductTypeRepository;
use App\Services\Interfaces\IProductTypeService;

class ProductTypeService extends ModelService implements IProductTypeService
{
	/**
	 * @var null|IProductTypeRepository
	 */
	private $_productTypeRepo = null;


	public function __construct(IProductTypeRepository $productTypeRepository)
	{
		parent::__construct($productTypeRepository);

		$this->_productTypeRepo = $productTypeRepository;
	}

	/**
	 * @param $name
	 * @return mixed
	 */
	public function createProductType($name)
	{
		// Check if the ProductType doesn't already exist
		$existingProductType = $this->_productTypeRepo->getByName($name);

		if(empty($existingProductType)) {
			$existingProductType = $this->_productTypeRepo->create($name);
		}

		return $existingProductType;
	}
}