<?php namespace App\Services\Interfaces;

use App\Models\Users\UserAddress;

interface IUserAddressService extends IModelService
{
	public function createAddress(int $userId, array $addressDetails) : UserAddress;

}