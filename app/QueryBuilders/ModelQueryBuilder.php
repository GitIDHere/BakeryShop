<?php namespace App\QueryBuilders;

use App\QueryBuilders\Interfaces\IBaseQueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelQueryBuilder implements IBaseQueryBuilder
{
	/**
	 * @var Model
	 */
	protected $_model;

	/**
	 * @var Builder
	 */
	protected $_builder;

	public function __construct(Model $model)
	{
		$this->_model = $model;
		$this->newBuilder();

		$this->_builder->from($model);

		$this->_builder->setModel($this->_model);
	}

	/**
	 * @param Model $model
	 * @return $this
	 */
	public function setModel(Model $model) : IBaseQueryBuilder
	{
		$this->_model = $model;
		$this->_builder->setModel($model);
		return $this;
	}

	/**
	 * @return array
	 */
	public function execute()
	{
		return $this->_builder->get()->all();
	}

	/**
	 * @param $limit
	 * @return $this
	 */
	public function limit($limit) : IBaseQueryBuilder
	{
		$this->_builder->limit($limit);
		return $this;
	}

	/**
	 * @return $this
	 */
	public function newBuilder() : IBaseQueryBuilder
	{
		$baseQueryBuilder = new \Illuminate\Database\Query\Builder(DB::connection());
		$this->_builder = new \Illuminate\Database\Eloquent\Builder($baseQueryBuilder);

		$this->_builder->setModel($this->_model);
		return $this;
	}

}