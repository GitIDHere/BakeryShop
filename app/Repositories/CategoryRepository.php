<?php namespace App\Repositories;

use App\Models\Products\Categories;
use App\Repositories\Interfaces\ICategoryRepository;
use Illuminate\Database\Eloquent\Collection;

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


	/**
	 * For each of the categories, get the products
	 *
	 * @param Collection $categoryCollection
	 * @param int $maxItemsPerCategory
	 * @param bool $onlyActive
	 * @return Collection|\Illuminate\Support\Collection
	 */
	public function getProducts(Collection $categoryCollection, $maxItemsPerCategory = 6, $onlyActive = null)
	{
		$products = $categoryCollection->map(function($category) use ($maxItemsPerCategory, $onlyActive) {
			$products = $category->products();
			if ($onlyActive !== null) {
				$products->where('is_active', $onlyActive);
			}
			return $products->limit($maxItemsPerCategory)->get()->all();
		});

		return $products;
	}

}