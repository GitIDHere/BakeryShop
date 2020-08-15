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
	 * @param bool $onlyPromoted
	 * @return mixed
	 */
	public function getCategories($limit = 3, $onlyPromoted = null)
	{
		return $this->_categoryRepo->getCategories($limit, $onlyPromoted);
	}

	/**
	 * @param Collection $categoryCollection
	 * @param int $maxItemsPerCategory
	 * @param bool $onlyActive
	 * @return mixed
	 */
	public function getProducts(Collection $categoryCollection, $maxItemsPerCategory = 6, $onlyActive = null)
	{
		return $this->_categoryRepo->getProducts($categoryCollection, $maxItemsPerCategory, $onlyActive);
	}
}