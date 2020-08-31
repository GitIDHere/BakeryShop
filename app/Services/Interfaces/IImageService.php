<?php namespace App\Services\Interfaces;

interface IImageService extends IModelService
{
	public function getProductTypeImages(int $productTypeId) : array;

	public function getProductImages(int $productId) : array;
}