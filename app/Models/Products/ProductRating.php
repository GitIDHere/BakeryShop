<?php namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
	protected $table = 'product_rating';

	/**
	 * @var array
	 */
	protected $fillable = [
		'avg_rating',
		'ratings_count'
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function product()
	{
		return $this->belongsTo('App\Models\Products\Product', 'product_id');
	}

}