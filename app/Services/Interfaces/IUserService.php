<?php namespace App\Services\Interfaces;


use App\Models\Users\User;

interface IUserService extends IModelService
{
	public function registerUser(string $email, string $password) : User;

}