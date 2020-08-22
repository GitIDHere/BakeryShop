<?php namespace App\Repositories;

use App\Models\Products\PromotedProductType;
use App\Repositories\Interfaces\IPromotedProductTypeRepository;

class PromotedProductTypeRepository extends ModelRepository implements IPromotedProductTypeRepository
{
	/**
	 * @var PromotedProductType
	 */
	private $_promotedProductType;

	public function __construct(PromotedProductType $promotedProductType)
	{
		parent::__construct($promotedProductType);
		$this->_promotedProductType = $promotedProductType;
	}

	/**
	 * @param $limit
	 * @return mixed
	 */
	public function getHeaderTiles($limit)
	{
		return PromotedProductType::where('show_on_home_header_tiles', true)
			->with('producttype')
			->limit($limit)
			->get()
			->map(function($promotedProductType){
				return $promotedProductType->producttype;
			})
		;
	}

}