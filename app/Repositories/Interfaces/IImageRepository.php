<?php namespace App\Repositories\Interfaces;

interface IImageRepository extends IModelRepository
{
	public function getImagesBy($objCollection, $orderBy);
}