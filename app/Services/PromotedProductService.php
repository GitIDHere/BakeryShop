<?php namespace App\Services;

use App\Repositories\Interfaces\IPromotedProductRepository;
use App\Services\Interfaces\IPromotedProductService;

class PromotedProductService extends ModelService implements IPromotedProductService
{
	/**
	 * @var IPromotedProductRepository
	 */
	private $_promotedProductRepo;

	public function __construct(IPromotedProductRepository $repository)
	{
		parent::__construct($repository);
		$this->_promotedProductRepo = $repository;
	}

}