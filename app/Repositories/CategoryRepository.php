<?php namespace App\Repositories;

use App\Models\Products\Categories;
use App\QueryBuilders\Interfaces\ICategoryQueryBuilder;
use App\Repositories\Interfaces\ICategoryRepository;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository extends ModelRepository implements ICategoryRepository
{
	/**
	 * @var Categories
	 */
	private $_categories;

	/**
	 * @var ICategoryQueryBuilder
	 */
	private $_queryBuilder;


	public function __construct(Categories $categories, ICategoryQueryBuilder $builder)
	{
		parent::__construct($categories);

		$this->_categories = $categories;
		$this->_queryBuilder = $builder;
	}

	/**
	 * @param int $limit
	 * @param bool $isPromoted
	 * @return array
	 */
	public function getPromotedCategories($limit, bool $isPromoted) : array
	{
		$categories = $this->_queryBuilder
			->initQueryBuilder()
			->isPromoted($isPromoted)
			->limit($limit)
			->execute()
		;

		return $categories;
	}

}