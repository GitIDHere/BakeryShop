<?php namespace App\Repositories\Interfaces;

interface IProductTypeImageRepository extends IModelRepository
{

	public function getImagesForProductType($productTypeId);

	public function getImages($leadImageCount = null, $smallImageCount = null, $onlyActive = true);

}