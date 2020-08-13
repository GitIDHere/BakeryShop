<?php namespace App\Repositories;

use App\Models\Products\Categories;
use App\Repositories\Interfaces\ICategoryRepository;

class CategoryRepository extends ModelRepository implements ICategoryRepository
{
	/**
	 * @var Categories
	 */
	private $_categories;

	public function __construct(Categories $categories)
	{
		parent::__construct($categories);
		$this->_categories = $categories;
	}

	/**
	 * @param int $limit
	 * @param bool|null $onlyPromoted - Null = all | true = only promoted | false = not promoted
	 * @return mixed
	 */
	public function getCategories($limit, bool $onlyPromoted = null)
	{
		$catModel = $this->_categories;

		if ($onlyPromoted !== null) {
			$catModel = $catModel->where('is_promoted', $onlyPromoted);
		}

		$catResult = $catModel->limit($limit)->get();

		return $catResult;
	}
}