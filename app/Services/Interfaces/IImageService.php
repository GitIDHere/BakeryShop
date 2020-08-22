<?php namespace App\Services\Interfaces;

interface IImageService extends IModelService
{
	public function getImagesFor($objColl, $orderBy);
}