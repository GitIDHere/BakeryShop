<?php namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class ProductNutrition extends Model
{
	protected $table = 'product_nutrition';

	/**
	 * @var array
	 */
	protected $fillable = [
		'calories',
		'carbs',
		'sugar',
		'salt',
		'protein',
		'fat',
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function product()
	{
		return $this->belongsTo('App\Models\Products\Product', 'product_id');
	}

}