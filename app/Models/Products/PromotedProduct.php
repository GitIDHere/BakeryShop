<?php namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class PromotedProduct extends Model
{
	protected $table = 'promoted_product';

	protected $fillable = [
		'is_featured',
	];


	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function product()
	{
		return $this->belongsTo('App\Models\Products\Product', 'product_id');
	}
}