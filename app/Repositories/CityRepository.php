<?php
namespace App\Repositories;
 
use App\Models\City;
use App\Traits\UploadAble;
//use Illuminate\Http\UploadedFile;
use App\Contracts\CityContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
 
/**
 * Class CityRepository
 *
 * @package \App\Repositories
 */
class CityRepository extends BaseRepository implements CityContract
{
   // use UploadAble;

    /**
 * CategoryRepository constructor.
 * @param Category $model
 */
public function __construct(City $model)
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
public function listCity(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
{
    return $this->all($columns, $order, $sort);
}
/**
 * @param int $id
 * @return mixed
 */
public function findCityById(int $id){
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
public function createCity(array $params){
    try {
        $collection = collect($params);
         
        $name = $collection->has('city_name') ? 1 : 0;
        $zipcode = $collection->has('zip_code') ? 1 : 0;
 
        $merge = $collection->merge(compact('name','zipcode'));
 
        $city = new City($merge->all());
 
        $city->save();
 
        return $city;
 
    } catch (QueryException $exception) {
        throw new InvalidArgumentException($exception->getMessage());
    }
}
 
/**
 * @param array $params
 * @return mixed
 */
public function updateCity(array $params){
    $city = $this->findCityById($params['id']);
 
    $collection = collect($params)->except('_token');
    $name = $collection->has('city_name') ? 1 : 0;
    $zipcode = $collection->has('zip_code') ? 1 : 0;
 
    $merge = $collection->merge(compact('name','zipcode'));
 
    $city->update($merge->all());
 
    return $city;
}
 
/**
 * @param $id
 * @return bool
 */
public function deleteCity($id){
    $city = $this->findCityById($id);
 
    $city->delete();
 
    return $city;
}
}
