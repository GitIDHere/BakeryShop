<?php namespace App\Repositories\Interfaces;

interface IUserProfileRepository extends IModelRepository
{
	/**
	 * Get UserProfile by user id
	 *
	 * @param int $userId
	 * @return mixed
	 */
	public function getByUser(int $userId);


	/**
	 * Create a UserProfile entry
	 *
	 * @param int $userId
	 * @param $firstName
	 * @param $surname
	 * @param $addressLineOne
	 * @param $addressLineTwo
	 * @param $city
	 * @param $postcode
	 * @return mixed
	 */
	public function createProfile(int $userId, $firstName, $surname, $addressLineOne, $addressLineTwo, $city, $postcode);

}