<?php namespace App\Services;

use App\Repositories\Interfaces\ICategoryRepository;
use App\Services\Interfaces\ICategoriesService;
use Illuminate\Database\Eloquent\Collection;

class CategoryService extends ModelService implements ICategoriesService
{
	/**
	 * @var ICategoryRepository
	 */
	private $_categoryRepo;


	public function __construct(ICategoryRepository $categoryRepo)
	{
		parent::__construct($categoryRepo);
		$this->_categoryRepo = $categoryRepo;
	}


	/**
	 * @param int $limit
	 * @return array
	 */
	public function getPromotedCategories(int $limit) : array
	{
		return $this->_categoryRepo->getPromotedCategories($limit,true);
	}

}