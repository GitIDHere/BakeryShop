<?php namespace App\QueryBuilders\Interfaces;

interface IUserAddressQueryBuilder extends IModelQueryBuilder
{
	public function whereUserId(int $userId) : IUserAddressQueryBuilder;

	public function whereName(string $firstName, string $surname) : IUserAddressQueryBuilder;

	public function wherePostcode(string $postcode) : IUserAddressQueryBuilder;
}