<?php namespace App\Repositories;

use App\Models\UserProfile;

class UserProfileRepository extends BaseRepository implements Interfaces\IUserProfileRepository
{


	public function __construct(UserProfile $userProfile)
	{
		parent::__construct($userProfile);
	}


	/**
	 * @param int $userId
	 * @return UserProfile|null
	 */
	public function getByUser(int $userId)
	{
		return UserProfile::where('user_id', $userId)->first();
	}


	/**
	 * Create a UserProfile entry
	 *
	 * @param int $userId
	 * @param string $firstName
	 * @param string $surname
	 * @param string $addressLineOne
	 * @param string $addressLineTwo
	 * @param string $city
	 * @param string $postcode
	 * @return UserProfile|null
	 * @throws ResourceCreateException
	 */
	public function createProfile(int $userId, $firstName, $surname, $addressLineOne, $addressLineTwo, $city, $postcode)
	{
		$userProfile = new UserProfile();

		$userProfile->user_id = $userId;
		$userProfile->first_name = $firstName;
		$userProfile->surname = $surname;
		$userProfile->address_line_one = $addressLineOne;
		$userProfile->address_line_two = $addressLineTwo;
		$userProfile->city = $city;
		$userProfile->postcode = $postcode;

		if($userProfile->save()) {
			return $userProfile;
		} else {
			// TODO - Throw exception
		}
	}
}