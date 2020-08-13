<?php namespace App\Services;

use App\Repositories\Interfaces\ICategoryRepository;
use App\Services\Interfaces\ICategoriesService;

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
	 * @return mixed
	 */
	public function getPromotedCategories($limit = 3)
	{
		return $this->_categoryRepo->getCategories($limit, true);
	}
}