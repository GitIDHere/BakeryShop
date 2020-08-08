<?php namespace App\Models\Products;

use App\Models\Products\Interfaces\IProductModel;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements IProductModel
{
	protected $table = 'product';

	protected $fillable = [
		'name',
		'days_till_expire',
		'width',
		'height',
		'weight',
		'img',
		'description',
		'quantity',
		'unit',
	];

	/**
	 * A Product has one ProductType
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function productType()
	{
		return $this->belongsTo('App\Models\Products\ProductType', 'product_type_id');
	}

	/**
	 * A Product has one Dietary
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function dietary()
	{
		return $this->hasOne('App\Models\Products\Dietary');
	}

	/**
	 * A Product has one Nutrition
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function nutrition()
	{
		return $this->hasOne('App\Models\Products\Nutrition');
	}

	/**
	 * A Product has many Ingredient
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function ingredients()
	{
		return $this->hasMany('App\Models\Products\Ingredient');
	}

	/**
	 * A Product has one productRating. This keeps a total rating for the product
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function productRating()
	{
		return $this->hasOne('App\Models\Products\ProductRating');
	}

	/**
	 * A Product has many UserRating
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function userRatings()
	{
		return $this->hasMany('App\Models\Products\UserRating');
	}

	/**
	 * A Product has many UserReview
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function userReviews()
	{
		return $this->hasMany('App\Models\Products\UserReview');
	}


}