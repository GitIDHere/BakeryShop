<?php namespace App\Services;

use App\Repositories\Interfaces\IPromotedProductTypeRepository;
use App\Services\Interfaces\IPromotedProductTypeService;

class PromotedProductTypeService extends ModelService implements IPromotedProductTypeService
{
	/**
	 * @var null|IPromotedProductTypeRepository
	 */
	private $_promotedProductTypeRepo = null;


	public function __construct(IPromotedProductTypeRepository $promotedProductTypeRepository)
	{
		parent::__construct($promotedProductTypeRepository);

		$this->_promotedProductTypeRepo = $promotedProductTypeRepository;
	}

}