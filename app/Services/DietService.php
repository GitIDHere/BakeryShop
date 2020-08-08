<?php namespace App\Services;

use App\Models\Products\Interfaces\IProductModel;
use App\Repositories\Interfaces\IDietRepository;
use App\Services\Interfaces\IDietService;

class DietService extends ModelService implements IDietService
{
	private $_dietRepo;

	public function __construct(IDietRepository $repository)
	{
		parent::__construct($repository);

		$this->_dietRepo = $repository;
	}

	/**
	 * @param IProductModel $product
	 * @param array $properties
	 * @return mixed
	 */
	public function make(IProductModel $product, array $properties)
	{
		return $this->_dietRepo->make($product, $properties);
	}
}