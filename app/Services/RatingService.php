<?php namespace App\Services;

use App\Models\Products\Interfaces\IProductModel;
use App\Repositories\Interfaces\IRatingRepository;
use App\Services\Interfaces\IRatingService;

class RatingService extends ModelService implements IRatingService
{
	private $_ratingRepo;

	public function __construct(IRatingRepository $repository)
	{
		parent::__construct($repository);

		$this->_ratingRepo = $repository;
	}

}