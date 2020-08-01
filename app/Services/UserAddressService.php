<?php namespace App\Services;

use App\Repositories\Interfaces\IUserAddressRepository;
use App\Services\Interfaces\IUserAddressService;

class UserAddressService extends BaseService implements IUserAddressService
{
	private $_userAddressRepo;


	public function __construct(IUserAddressRepository $userAddressRepo)
	{
		parent::__construct($userAddressRepo);
		$this->_userAddressRepo = $userAddressRepo;
	}


	/**
	 * @param $userId
	 * @param array $addressDetails
	 * @return mixed
	 */
	public function createAddress($userId, $addressDetails = [])
	{
		$existParams[] = [
			'col' => 'user_id',
			'op' => '=',
			'val' => $userId,
		];

		//Check if an entry already doesn't exist
		if($this->_userAddressRepo->exists($existParams)) {
			//Return the existing profile
			return $this->_userAddressRepo->getByUser($userId);
		}

		return $this->_userAddressRepo->createAddress($userId, $addressDetails);
	}

}