<?php namespace App\Models\Products\Images;

use Illuminate\Database\Eloquent\Model;

class ProductTypeImage extends Model
{
	protected $table = 'product_type_image';

	protected $fillable = [
		'tile_image'
	];



	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function productType()
	{
		return $this->belongsTo('App\Models\Products\ProductType', 'product_type_id');
	}

}