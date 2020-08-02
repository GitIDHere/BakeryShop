<?php namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
	protected $table = 'user_addresses';

	protected $fillable = [
		'first_name',
		'surname',
		'address_line_one',
		'address_line_two',
		'city',
		'postcode',
	];

	// If you want to extra info to the displayed model
	protected $appends = [

	];

	protected $hidden = [
		'id'
	];


	/**
	 * UserAddress belongs to one User
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo('App\Models\Users\User');
	}

}