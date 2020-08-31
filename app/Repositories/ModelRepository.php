<?php namespace App\Repositories;

use App\QueryBuilders\ModelQueryBuilder;
use App\Repositories\Interfaces\IModelRepository;
use Illuminate\Database\Eloquent\Model;

class ModelRepository extends ModelQueryBuilder implements IModelRepository
{
	/**
	 * @var Model
	 */
	protected $_model;


	public function __construct(Model $model)
	{
		parent::__construct($model);

		$this->_model = $model;
	}

	/**
	 * @return Model
	 */
	public function getModel()
	{
		return $this->_model;
	}

	/**
	 * Check if an entry exists in the database for the model record
	 * @param Model $model
	 * @param $params
	 * @return bool
	 */
	public function exists($params)
	{
		$query = $this->_model::query();
		foreach ($params as $param) {
			$query->where($param['col'], $param['op'], $param['val']);
		}
		return $query->exists();
	}

	/**
	 * @param array $props
	 * @return Model
	 */
	public function create($props)
	{
		$newRecord = $this->_model::create($props);
		return $newRecord;
	}

	/**
	 * @param $id
	 * @param array $values
	 * @return int
	 */
	public function update(int $id, array $values)
	{
		return $this->_model::where('id', $id)->update($values);
	}

	/**
	 * Delete a record
	 *
	 * @param $id
	 * @return int
	 */
	public function delete($id)
	{
		return $this->_model::destroy($id);
	}


	/**
	 * Find a record
	 *
	 * @param $id
	 * @return mixed
	 */
	public function get($id)
	{
		return $this->_model::find($id);
	}
}