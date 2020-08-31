<?php namespace App\Repositories;

use App\Models\Products\PromotedProductType;
use App\QueryBuilders\Interfaces\IPromotedProductTypeQueryBuilder;
use App\Repositories\Interfaces\IPromotedProductTypeRepository;

class PromotedProductTypeRepository extends ModelRepository implements IPromotedProductTypeRepository
{
	/**
	 * @var PromotedProductType
	 */
	private $_promotedProductType;

	/**
	 * @var IPromotedProductTypeQueryBuilder
	 */
	private $_queryBuilder;

	public function __construct(PromotedProductType $promotedProductType, IPromotedProductTypeQueryBuilder $queryBuilder)
	{
		parent::__construct($promotedProductType);

		$this->_promotedProductType = $promotedProductType;
		$this->_queryBuilder = $queryBuilder;
	}


	/**
	 * @param bool $isHeaderTile
	 * @param int $limit
	 * @return array
	 */
	public function getProductTypes(bool $isHeaderTile, int $limit) :array
	{
		return $this->_queryBuilder
			->initQueryBuilder()
			->whereShowOnHeaderTiles($isHeaderTile)
			->with('producttype')
			->limit($limit)
			->execute()
		;
	}

}