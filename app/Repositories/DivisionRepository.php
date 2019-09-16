<?php
namespace App\Repositories;
 
use App\Models\Division;
use App\Traits\UploadAble;
//use Illuminate\Http\UploadedFile;
use App\Contracts\DivisionContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
 
/**
 * Class DivisionRepository
 *
 * @package \App\Repositories
 */
class DivisionRepository extends BaseRepository implements DivisionContract
{
   // use UploadAble;

    /**
 * CategoryRepository constructor.
 * @param Division $model
 */
public function __construct(Division $model)
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
public function listDivision(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
{
    return $this->all($columns, $order, $sort);
}
/**
 * @param int $id
 * @return mixed
 */
public function findDivisionById(int $id){
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
public function createDivision(array $params){
    try {
        $collection = collect($params);
         
        $name = $collection->has('division_name') ? 1 : 0;
 
        $merge = $collection->merge(compact('name'));
 
        $division = new Division($merge->all());
 
        $division->save();
 
        return $division;
 
    } catch (QueryException $exception) {
        throw new InvalidArgumentException($exception->getMessage());
    }
}
 
/**
 * @param array $params
 * @return mixed
 */
public function updateDivision(array $params){
    $division = $this->findDivisionById($params['id']);
 
    $collection = collect($params)->except('_token');
    $name = $collection->has('division_name') ? 1 : 0;
 
    $merge = $collection->merge(compact('name'));
 
    $division->update($merge->all());
 
    return $division;
}
 
/**
 * @param $id
 * @return bool
 */
public function deleteDivision($id){
    $division = $this->findDivisionById($id);
 
    $division->delete();
 
    return $division;
}
}
