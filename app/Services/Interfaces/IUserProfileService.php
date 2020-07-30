<?php namespace App\Services\Interfaces;

interface IUserProfileService extends IModelService
{
	public function createProfile($userId, $firstName, $surname, $addressLineOne, $addressLineTwo, $city, $postcode);

}