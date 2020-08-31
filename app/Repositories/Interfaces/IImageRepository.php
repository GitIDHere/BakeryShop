<?php namespace App\Repositories\Interfaces;

interface IImageRepository extends IModelRepository
{
	public function getObjectImages(int $objId, string $objClass) : array;
}