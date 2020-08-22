<?php namespace App\Repositories;

use App\Models\Products\PromotedProduct;
use App\Repositories\Interfaces\IPromotedProductRepository;

class PromotedProductRepository extends ModelRepository implements IPromotedProductRepository
{
	/**
	 * @var PromotedProduct
	 */
	private $_promotedProduct;

	public function __construct(PromotedProduct $promotedProduct)
	{
		parent::__construct($promotedProduct);
		$this->_promotedProduct = $promotedProduct;
	}


}