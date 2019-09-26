<?php
namespace App\Repositories;
 
use App\Models\Employee;

use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\EmployeesContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Str;
/**
 * Class DepartmentRepository
 *
 * @package \App\Repositories
 */
class EmployeesRepository extends BaseRepository implements EmployeesContract
{
    use UploadAble;

    /**
 * CategoryRepository constructor.
 * @param Employee $model
 */
public function __construct(Employee $model)
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
public function listEmployees(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
{   
    return $this->all($columns, $order, $sort);
}
/**
 * @param int $id
 * @return mixed
 */
public function findEmployeesById(int $id){
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
public function createEmployees(array $params){
    try {
        $collection = collect($params);
        $picture = null;
 
        if ($collection->has('picture') && ($params['picture'] instanceof  UploadedFile)) {
            $picture = $this->uploadOne($params['picture'], 'employees');
        }

        $first_name  = $params['first_name'];
        $last_name   = $params['last_name'];
        $email       = $params['email'];
        $age         = $params['age'];
        $phone       = $params['phone'];
        $address     = $params['address'];
        $gender_id   = $params['gender_id'];
        $salary_id   = $params['salary_id'];
        $dept_id     = $params['dept_id'];
        $state_id    = $params['state_id'];
        $city_id     = $params['city_id'];
        $country_id  = $params['country_id'];
        $join_date   = date('Y-m-d', strtotime(Str::replaceFirst('-', '/', $params['join_date'])));
        $birth_date  = date('Y-m-d', strtotime(Str::replaceFirst('-', '/', $params['birth_date'])));
        $division_id = $params['division_id'];
    
        $merge = $collection->merge(compact('first_name','last_name','email','age','phone','address','gender_id',
                                            'salary_id','dept_id','state_id','city_id','country_id',
                                            'join_date','birth_date','division_id','picture'));

        $employee = new Employee($merge->all());
        $employee->save();
        return $employee;

    } catch (QueryException $exception) {
        throw new InvalidArgumentException($exception->getMessage());
    }
}


/**
 * @param array $params
 * @return mixed
 */
public function updateEmployees(array $params){

    $employee = $this->findEmployeesById($params['id']);
    $collection = collect($params)->except('_token');
    if ($collection->has('picture') && ($params['picture'] instanceof  UploadedFile)) {
 
        if ($employee->picture != null) {
            $this->deleteOne($employee->picture);
        }
 
        $picture = $this->uploadOne($params['picture'], 'employee');
    }
        $first_name  = $params['first_name'];
        $last_name   = $params['last_name'];
        $email       = $params['email'];
        $age         = $params['age'];
        $phone       = $params['phone'];
        $address     = $params['address'];
        $gender_id   = $params['gender_id'];
        $salary_id   = $params['salary_id'];
        $dept_id     = $params['dept_id'];
        $state_id    = $params['state_id'];
        $city_id     = $params['city_id'];
        $country_id  = $params['country_id'];
        $join_date   = date('Y-m-d', strtotime(Str::replaceFirst('-', '/', $params['join_date'])));
        $birth_date  = date('Y-m-d', strtotime(Str::replaceFirst('-', '/', $params['birth_date'])));
        $division_id = $params['division_id'];

        $merge = $collection->merge(compact('first_name','last_name','email','age','phone','address','gender_id',
                                            'salary_id','dept_id','state_id','city_id','country_id',
                                            'join_date','birth_date','division_id','picture'));
 
    $employee->update($merge->all());
 
    return $employee;
}
 
/**
 * @param $id
 * @return bool
 */
public function deleteEmployees($id){
    $employee = $this->findEmployeesById($id);
 
    $employee->delete();
 
    return $employee;
}
}
