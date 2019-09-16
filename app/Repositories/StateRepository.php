<?php
namespace App\Repositories;
 
use App\Models\State;
use App\Traits\UploadAble;
//use Illuminate\Http\UploadedFile;
use App\Contracts\StateContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
 
/**
 * Class StateRepository
 *
 * @package \App\Repositories
 */
class StateRepository extends BaseRepository implements StateContract
{
   // use UploadAble;

    /**
 * CategoryRepository constructor.
 * @param State $model
 */
public function __construct(State $model)
{
    parent::__construct($model);
    $this->model = $model;
}
/**
 * @param string $order
 * @param string $sort
 * @param array $columns
 * @return mixed
 */
public function listState(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
{
    return $this->all($columns, $order, $sort);
}
/**
 * @param int $id
 * @return mixed
 */
public function findStateById(int $id){
    try {
        return $this->findOneOrFail($id);
 
    } catch (ModelNotFoundException $e) {
 
        throw new ModelNotFoundException($e);
    }
}
 
/**
 * @param array $params
 * @return mixed
 */
public function createState(array $params){
    try {
        $collection = collect($params);
         
        $name = $collection->has('state_name') ? 1 : 0;
 
        $merge = $collection->merge(compact('name'));
 
        $state = new State($merge->all());
 
        $state->save();
 
        return $state;
 
    } catch (QueryException $exception) {
        throw new InvalidArgumentException($exception->getMessage());
    }
}
 
/**
 * @param array $params
 * @return mixed
 */
public function updateState(array $params){
    $state = $this->findStateById($params['id']);
 
    $collection = collect($params)->except('_token');
    $name = $collection->has('state_name') ? 1 : 0;
 
    $merge = $collection->merge(compact('name'));
 
    $state->update($merge->all());
 
    return $state;
}
 
/**
 * @param $id
 * @return bool
 */
public function deleteState($id){
    $state = $this->findStateById($id);
 
    $state->delete();
 
    return $state;
}
}
