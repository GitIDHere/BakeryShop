<?php namespace App\Repositories;

use App\Models\Users\UserAddress;
use App\QueryBuilders\Interfaces\IUserAddressQueryBuilder;

class UserAddressRepository extends ModelRepository implements Interfaces\IUserAddressRepository
{
	/**
	 * @var UserAddress
	 */
	private $_model;

	/**
	 * @var IUserAddressQueryBuilder
	 */
	private $_queryBuilder;


	public function __construct(UserAddress $userAddress, IUserAddressQueryBuilder $queryBuilder)
	{
		parent::__construct($userAddress);

		$this->_model = $userAddress;
		$this->_queryBuilder = $queryBuilder;
	}


	/**
	 * @param int $userId
	 * @return UserAddress|null
	 */
	public function getByUser(int $userId) : UserAddress
	{
		return UserAddress::where('user_id', $userId)->first();
	}


	/**
	 * Create a UserAddress entry
	 *
	 * @param int $userId
	 * @param array $addressDetails
	 * @return UserAddress|null
	 */
	public function createAddress(int $userId, $addressDetails = []) : UserAddress
	{
		$address = new UserAddress($addressDetails);

		$address->user_id = $userId;

		if($address->save()) {
			return $address;
		} else {
			// TODO - Throw exception
		}
	}
}