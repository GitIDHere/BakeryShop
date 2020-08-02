<?php namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class ProductIngredient extends Model
{
	protected $table = 'product_ingredients';


	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function product()
	{
		return $this->belongsTo('App\Models\Products\Product', 'product_id');
	}


}