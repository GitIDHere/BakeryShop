<?php namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
	protected $table = 'categories';

	/**
	 * @var array
	 */
	protected $fillable = [
		'name',
		'is_promoted'
	];


	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function products()
	{
		return $this->belongsToMany('App\Models\Products\Product', 'product_categories', 'category_id', 'product_id');
	}

	/**
	 * @return mixed|string|string[]|null
	 */
	public function getParsedNameAttribute()
	{
		$name = strtolower($this->name);
		$name = str_ireplace(' ', '_', $name);
		// Remove special characters
		$name = preg_replace('/[^A-Za-z0-9\-]/', '', $name);
		return $name;
	}

}