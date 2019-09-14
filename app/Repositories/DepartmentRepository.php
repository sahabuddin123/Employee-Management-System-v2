<?php
namespace App\Repositories;
 
use App\Models\Department;
use App\Traits\UploadAble;
//use Illuminate\Http\UploadedFile;
use App\Contracts\DepartmentContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
 
/**
 * Class DepartmentRepository
 *
 * @package \App\Repositories
 */
class DepartmentRepository extends BaseRepository implements DepartmentContract
{
   // use UploadAble;

    /**
 * CategoryRepository constructor.
 * @param Category $model
 */
public function __construct(Department $model)
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
public function listDepartment(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
{
    return $this->all($columns, $order, $sort);
}
/**
 * @param int $id
 * @return mixed
 */
public function findDepartmentById(int $id){
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
public function createDepartment(array $params){
    try {
        $collection = collect($params);
         
        $name = $collection->has('dept_name') ? 1 : 0;
 
        $merge = $collection->merge(compact('name'));
 
        $department = new Department($merge->all());
 
        $department->save();
 
        return $department;
 
    } catch (QueryException $exception) {
        throw new InvalidArgumentException($exception->getMessage());
    }
}
 
/**
 * @param array $params
 * @return mixed
 */
public function updateDepartment(array $params){
    $department = $this->findDepartmentById($params['id']);
 
    $collection = collect($params)->except('_token');
    $name = $collection->has('dept_name') ? 1 : 0;
 
    $merge = $collection->merge(compact('name'));
 
    $department->update($merge->all());
 
    return $department;
}
 
/**
 * @param $id
 * @return bool
 */
public function deleteDepartment($id){
    $department = $this->findDepartmentById($id);
 
    $department->delete();
 
    return $department;
}
}
