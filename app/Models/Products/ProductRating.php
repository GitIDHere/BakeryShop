<?php namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
	protected $table = 'product_ratings';


	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function product()
	{
		return $this->belongsTo('App\Models\Products\Product', 'product_id');
	}

}