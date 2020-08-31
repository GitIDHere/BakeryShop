<?php namespace App\QueryBuilders;

use App\Models\Users\UserAddress;
use App\QueryBuilders\Interfaces\IUserAddressQueryBuilder;

class UserAddressQueryBuilder extends ModelQueryBuilder implements IUserAddressQueryBuilder
{

	public function __construct(UserAddress $model)
	{
		parent::__construct($model);
	}

	/**
	 * @param int $userId
	 * @return IUserAddressQueryBuilder
	 */
	public function whereUserId(int $userId): IUserAddressQueryBuilder
	{
		$this->_builder->where('user_id', '=', $userId);
		return $this;
	}

	/**
	 * @param string $firstName
	 * @param string $surname
	 * @return IUserAddressQueryBuilder
	 */
	public function whereName(string $firstName, string $surname = ''): IUserAddressQueryBuilder
	{
		$this->_builder->where('first_name', '=', $firstName);
		if(!empty($surname)) {
			$this->_builder->where('surname', '=', $surname);
		}
		return $this;
	}

	/**
	 * @param string $postcode
	 * @return IUserAddressQueryBuilder
	 */
	public function wherePostcode(string $postcode): IUserAddressQueryBuilder
	{
		$this->_builder->where('postcode', '=', $postcode);
		return $this;
	}
}