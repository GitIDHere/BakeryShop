<?php namespace App\Services\Interfaces;

interface IUserAddressService extends IModelService
{
	public function createAddress($userId, $addressDetails);

}