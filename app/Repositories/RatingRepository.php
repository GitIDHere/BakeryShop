<?php namespace App\Repositories;

use App\Models\Products\Interfaces\IProductModel;
use App\Models\Products\ProductRating;
use App\Repositories\Interfaces\IRatingRepository;

class RatingRepository extends ModelRepository implements IRatingRepository
{
	/**
	 * @var ProductRating
	 */
	private $_ratingRepo;

	public function __construct(ProductRating $rating)
	{
		parent::__construct($rating);

		$this->_ratingRepo = $rating;
	}

	/**
	 * @param IProductModel $product
	 * @return ProductRating
	 */
	public function make(IProductModel $product)
	{
		$diet = new ProductRating();
		$diet->product()->associate($product);
		$diet->save();
		return $diet;
	}
}