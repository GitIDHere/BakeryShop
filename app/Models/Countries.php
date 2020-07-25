<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
	protected $table = 'countries';


	protected $fillable = [
		'country_name',
		'iso_code',
		// This is a string, but represents a numeric entry to account for E.G. `004`
		'iso_code_numeric',
	];

}