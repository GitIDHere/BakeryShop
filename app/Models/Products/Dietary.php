<?php namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class Dietary extends Model
{
    protected $table = 'product_dietary';

	/**
	 * @var array
	 */
    protected $fillable = [
		'is_vegetarian',
		'is_gluten_free',
		'is_vegan',
	];


	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function product()
	{
		return $this->belongsTo('App\Models\Products\Product', 'product_id');
	}

}
