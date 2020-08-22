<?php namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class PromotedProductType extends Model
{
	protected $table = 'promoted_product_type';

	protected $fillable = [
		'show_on_home_header_tiles'
	];


	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function productType()
	{
		return $this->belongsTo('App\Models\Products\ProductType', 'product_type_id');
	}

}