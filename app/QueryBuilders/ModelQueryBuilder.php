<?php namespace App\QueryBuilders;

use App\QueryBuilders\Interfaces\IModelQueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelQueryBuilder implements IModelQueryBuilder
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
	}

	/**
	 * @return IModelQueryBuilder
	 */
	public function initQueryBuilder() : IModelQueryBuilder
	{
		$this->newBuilder();
		return $this;
	}

	/**
	 * @param int $id
	 * @return IModelQueryBuilder
	 */
	public function whereId(int $id) : IModelQueryBuilder
	{
		$this->_builder->where('id', '=', $id);
		return $this;
	}

	/**
	 * @param int $id
	 * @return IModelQueryBuilder
	 */
	public function whereIdsIn(int $id): IModelQueryBuilder
	{
		$this->_builder->whereIn('id', $id);
		return $this;
	}

	/**
	 * @param Model $model
	 * @return $this
	 */
	public function setModel(Model $model) : IModelQueryBuilder
	{
		$this->_model = $model;
		$this->_builder->setModel($model);
		return $this;
	}

	/**
	 * @param int $limit
	 * @return $this
	 */
	public function limit(int $limit) : IModelQueryBuilder
	{
		$this->_builder->limit($limit);
		return $this;
	}

	/**
	 * @param string $modelName
	 * @return IModelQueryBuilder
	 */
	public function with(string $modelName): IModelQueryBuilder
	{
		$this->_builder->with($modelName);
		return $this;
	}

	/**
	 * @param string $column
	 * @return IModelQueryBuilder
	 */
	public function orderBy(string $column): IModelQueryBuilder
	{
		$this->_builder->orderBy($column);
		return $this;
	}

	/**
	 * @return $this
	 */
	public function newBuilder() : IModelQueryBuilder
	{
		$baseQueryBuilder = new \Illuminate\Database\Query\Builder(DB::connection());
		$this->_builder = new \Illuminate\Database\Eloquent\Builder($baseQueryBuilder);

		$this->_builder->from($this->_model);
		$this->_builder->setModel($this->_model);

		return $this;
	}

	/**
	 * @return array
	 */
	public function execute() : array
	{
		return $this->_builder->get()->all();
	}
}