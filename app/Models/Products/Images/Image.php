<?php namespace App\Models\Products\Images;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $table = 'image';

	protected $fillable = [
		'path',
	];

	/**
	 * @return mixed|string
	 */
	public function __toString()
	{
		return $this->path;
	}

	/**
	 * Get the owning imagetable model.
	 */
	public function imagetable()
	{
		return $this->morphTo();
	}

}