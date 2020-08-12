<?php namespace App\Http\View\Composers;

use App\Services\Interfaces\IProductTypeImageService;
use Illuminate\View\View;

class HomeCategorySectionComposer
{
	/**
	 * @var IProductTypeImageService
	 */
	private $_productTypeImageService;


	public function __construct(IProductTypeImageService $productTypeImageService)
	{
		$this->_productTypeImageService = $productTypeImageService;
	}


	/**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
	public function compose(View $view)
	{
		$imageCollection = $this->_productTypeImageService->getCategorySectionImages();
		$leadCategories = $imageCollection->where('is_lead', 1)->all();
		$smallCategories = $imageCollection->where('is_lead', 0)->all();

		$view->with('large_tiles', $leadCategories)->with('small_tiles', $smallCategories);
	}

}