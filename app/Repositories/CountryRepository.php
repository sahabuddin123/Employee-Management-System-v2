<?php
namespace App\Repositories;
 
use App\Models\Country;
use App\Traits\UploadAble;
//use Illuminate\Http\UploadedFile;
use App\Contracts\CountryContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
 
/**
 * Class CountryRepository
 *
 * @package \App\Repositories
 */
class CountryRepository extends BaseRepository implements CountryContract
{
   // use UploadAble;

    /**
 * CategoryRepository constructor.
 * @param Country $model
 */
public function __construct(Country $model)
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
public function listCountry(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
{
    return $this->all($columns, $order, $sort);
}
/**
 * @param int $id
 * @return mixed
 */
public function findCountryById(int $id){
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
public function createCountry(array $params){
    try {
        $collection = collect($params);
         
        $name = $collection->has('country_name') ? 1 : 0;
        $countrycode = $collection->has('country_code') ? 1 : 0;
 
        $merge = $collection->merge(compact('name','countrycode'));
 
        $country = new Country($merge->all());
 
        $country->save();
 
        return $country;
 
    } catch (QueryException $exception) {
        throw new InvalidArgumentException($exception->getMessage());
    }
}
 
/**
 * @param array $params
 * @return mixed
 */
public function updateCountry(array $params){
    $country = $this->findCountryById($params['id']);
 
    $collection = collect($params)->except('_token');
    $name = $collection->has('country_name') ? 1 : 0;
    $countrycode = $collection->has('country_code') ? 1 : 0;
 
    $merge = $collection->merge(compact('name','countrycode'));
 
    $country->update($merge->all());
 
    return $country;
}
 
/**
 * @param $id
 * @return bool
 */
public function deleteCountry($id){
    $country = $this->findCountryById($id);
 
    $country->delete();
 
    return $country;
}
}
