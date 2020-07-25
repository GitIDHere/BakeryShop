<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
	protected $table = 'user_profiles';

	protected $fillable = [
		'first_name',
		'surname',
		'address_line_one',
		'address_line_two',
		'city',
		'country_id',
		'postcode',
		'usa_state_id',
		'zip',
	];

	// If you want to extra info to the displayed model
	protected $appends = [
		//TODO
		// - country_name
		// - state_name
	];

	protected $hidden = [
		'id'
	];


	/**
	 * UserProfile belongs to one User
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

}