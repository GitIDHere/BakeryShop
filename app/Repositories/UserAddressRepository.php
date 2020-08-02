<?php namespace App\Repositories;

use App\Models\Users\UserAddress;

class UserAddressRepository extends BaseRepository implements Interfaces\IUserAddressRepository
{


	public function __construct(UserAddress $userAddress)
	{
		parent::__construct($userAddress);
	}


	/**
	 * @param int $userId
	 * @return UserAddress|null
	 */
	public function getByUser(int $userId)
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
	public function createAddress(int $userId, $addressDetails = [])
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