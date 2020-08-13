<?php namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{

	protected $table = 'product_price';

	protected $fillable = [
		'price_per_unit',
		'discounted_percentage',
		'vat',
	];


	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function product()
	{
		return $this->belongsTo('App\Models\Products\Product');
	}

	/**
	 * Get the discounted price
	 *
	 * @param $value
	 * @return float|int
	 */
	public function getDiscountedPriceAttribute($value)
	{
		return ($this->price_per_unit * ($this->discounted_percentage / 100));
	}

}