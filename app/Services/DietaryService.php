<?php namespace App\Services;

use App\Models\Products\Interfaces\IProductModel;
use App\Repositories\Interfaces\IDietaryRepository;
use App\Services\Interfaces\IDietaryService;

class DietaryService extends ModelService implements IDietaryService
{
	private $_dietRepo;

	public function __construct(IDietaryRepository $repository)
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