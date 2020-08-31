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


	/**
	 * @param $limit
	 * @return mixed
	 */
	public function getHeaderTiles(int  $limit) : array
	{
		$promotedProductTypes = $this->_promotedProductTypeRepo->getProductTypes(true, $limit);

		return collect($promotedProductTypes)->map(function($promotedProductType){
				return $promotedProductType->producttype;
			})->flatten()->all()
		;
	}

}