<?php namespace App\Repositories\Interfaces;

use App\Models\Users\UserAddress;

interface IUserAddressRepository extends IModelRepository
{
	/**
	 * Get UserAddress by user id
	 *
	 * @param int $userId
	 * @return mixed
	 */
	public function getByUser(int $userId) : UserAddress;


	/**
	 * Create a UserAddress entry
	 *
	 * @param int $userId
	 * @param array $addressDetails
	 * @return mixed
	 */
	public function createAddress(int $userId, $addressDetails = []) : UserAddress;

}