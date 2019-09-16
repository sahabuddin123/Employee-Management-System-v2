<?php
namespace App\Repositories;
 
use App\Models\Salary;
use App\Traits\UploadAble;
//use Illuminate\Http\UploadedFile;
use App\Contracts\SalaryContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
 
/**
 * Class SalaryRepository
 *
 * @package \App\Repositories
 */
class SalaryRepository extends BaseRepository implements SalaryContract
{
   // use UploadAble;

    /**
 * CategoryRepository constructor.
 * @param Salary $model
 */
public function __construct(Salary $model)
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
public function listSalary(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
{
    return $this->all($columns, $order, $sort);
}
/**
 * @param int $id
 * @return mixed
 */
public function findSalaryById(int $id){
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
public function createSalary(array $params){
    try {
        $collection = collect($params);
         
        $name = $collection->has('s_amount') ? 1 : 0;
 
        $merge = $collection->merge(compact('name'));
 
        $salary = new Salary($merge->all());
 
        $salary->save();
 
        return $salary;
 
    } catch (QueryException $exception) {
        throw new InvalidArgumentException($exception->getMessage());
    }
}
 
/**
 * @param array $params
 * @return mixed
 */
public function updateSalary(array $params){
    $salary = $this->findSalaryById($params['id']);
 
    $collection = collect($params)->except('_token');
    $name = $collection->has('s_amount') ? 1 : 0;
 
    $merge = $collection->merge(compact('name'));
 
    $salary->update($merge->all());
 
    return $salary;
}
 
/**
 * @param $id
 * @return bool
 */
public function deleteSalary($id){
    $salary = $this->findSalaryById($id);
 
    $salary->delete();
 
    return $salary;
}
}
