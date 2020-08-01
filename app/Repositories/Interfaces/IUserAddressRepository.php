<?php namespace App\Repositories\Interfaces;

interface IUserAddressRepository extends IModelRepository
{
	/**
	 * Get UserAddress by user id
	 *
	 * @param int $userId
	 * @return mixed
	 */
	public function getByUser(int $userId);


	/**
	 * Create a UserAddress entry
	 *
	 * @param int $userId
	 * @param array $addressDetails
	 * @return mixed
	 */
	public function createAddress(int $userId, $addressDetails = []);

}