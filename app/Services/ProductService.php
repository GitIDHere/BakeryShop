<?php namespace App\Services;

use App\QueryBuilders\Interfaces\IProductQueryBuilder;
use App\Repositories\Interfaces\IProductRepository;
use App\Services\Interfaces\IProductService;
use Illuminate\Support;

class ProductService extends ModelService implements IProductService
{
	/**
	 * @var IProductQueryBuilder
	 */
	private $_productQueryBuilder;


	public function __construct(IProductRepository $productRepository, IProductQueryBuilder $builder)
	{
		parent::__construct($productRepository);
		$this->_productQueryBuilder = $builder;

		$model = $this->_repo->getModel();
		$this->_productQueryBuilder->setModel($model);
	}


	/**
	 * @param Support\Collection $categories
	 * @param $maxItemsPerCategory
	 * @return Support\Collection
	 */
	public function getFeaturedProductsByCategory(Support\Collection $categories, $maxItemsPerCategory) : Support\Collection
	{
		$productList = $categories->map(function($category) use ($maxItemsPerCategory)
		{
			$product = $this->_productQueryBuilder
				->isActive(1)
				->isFeatured(1)
				->hasCategory($category)
				->limit($maxItemsPerCategory)
				->execute()
			;

			return $product;
		})
		->reject(function($collection){
			return (empty($collection));
		})
		->flatMap(function($productCollection){
			return $productCollection;
		});

		return $productList;
	}

}