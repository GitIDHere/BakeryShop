<?php namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class UserRating extends Model
{
	protected $table = 'user_ratings';


	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function product()
	{
		return $this->belongsTo('App\Models\Products\Product', 'product_id');
	}

}