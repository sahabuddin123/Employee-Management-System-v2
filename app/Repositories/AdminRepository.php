<?php
namespace App\Repositories;
 
use App\Models\Adminuser;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\AdminContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
 
/**
 * Class DepartmentRepository
 *
 * @package \App\Repositories
 */
class AdminRepository extends BaseRepository implements AdminContract
{
    use UploadAble;

    /**
 * CategoryRepository constructor.
 * @param Adminuser $model
 */
public function __construct(Adminuser $model)
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
public function listAdmin(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
{
    return $this->all($columns, $order, $sort);
}
/**
 * @param int $id
 * @return mixed
 */
public function findAdminById(int $id){
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
public function createAdmin(array $params){
    try {
        $collection = collect($params);
        $picture = null;
 
        if ($collection->has('picture') && ($params['picture'] instanceof  UploadedFile)) {
            $picture = $this->uploadOne($params['picture'], 'admins');
        }
        //$username = $collection->has('username') ? 1 : 0;
        $username=$params['username'];
        $first_name =$params['first_name'];// $collection->has('first_name') ? 1 : 0;
        $last_name =$params['last_name'];// $collection->has('last_name') ? 1 : 0;
        $email =$params['email'];// $collection->has('email') ? 1 : 0;
        $password = bcrypt($params['password']);// $collection->has('password')? 1 : 0;
        $merge = $collection->merge(compact('username','first_name','last_name','email','password','picture'));
 
        $admin = new Adminuser($merge->all());
 
        $admin->save();
 
        return $admin;
 
    } catch (QueryException $exception) {
        throw new InvalidArgumentException($exception->getMessage());
    }
}

 
/**
 * @param array $params
 * @return mixed
 */
public function updateAdmin(array $params){

    $admin = $this->findAdminById($params['id']);
    $collection = collect($params)->except('_token');
    if ($collection->has('picture') && ($params['picture'] instanceof  UploadedFile)) {
 
        if ($admin->picture != null) {
            $this->deleteOne($admin->picture);
        }
 
        $picture = $this->uploadOne($params['picture'], 'admin');
    }
   //$username = $collection->has('username') ? 1 : 0;
   $username=$params['username'];
   $first_name =$params['first_name'];// $collection->has('first_name') ? 1 : 0;
   $last_name =$params['last_name'];// $collection->has('last_name') ? 1 : 0;
   $email =$params['email'];// $collection->has('email') ? 1 : 0;
   //$password = bcrypt($params['password']);// $collection->has('password')? 1 : 0;
 
    $merge = $collection->merge(compact('username','first_name','last_name','email','picture'));
 
    $admin->update($merge->all());
 
    return $admin;
}
 
/**
 * @param $id
 * @return bool
 */
public function deleteAdmin($id){
    $admin = $this->findAdminById($id);
 
    $admin->delete();
 
    return $admin;
}
}
