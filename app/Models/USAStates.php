<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class USAStates extends Model
{
	protected $table = 'usa_states';

	protected $fillable = [
		'state_name',
		'alpha_code',
	];

}