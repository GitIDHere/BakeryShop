<?php namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
	protected $table = 'product_ingredients';

	/**
	 * @var array
	 */
	protected $fillable = [
		'name'
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function product()
	{
		return $this->belongsTo('App\Models\Products\Product', 'product_id');
	}


}