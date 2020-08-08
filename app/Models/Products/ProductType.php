<?php namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
	protected $table = 'product_type';

	/**
	 * @var array
	 */
	protected $fillable = [
		'name'
	];

	/**
	 * ProductType has many Product
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function products()
	{
		return $this->hasMany('App\Models\Products\Product');
	}

}