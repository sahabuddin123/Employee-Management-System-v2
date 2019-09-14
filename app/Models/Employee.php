<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Employee extends Model
{
    //
    use SoftDeletes;
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    /**
     *  Below all methods are creating Eloquent's One to Many (inverse) Relationships.
     *  for example, many employees can have a same department.
     *
     */

    /**
     * @return object
     */
    public function empDepartment(){
        /**
         *  return department which belongs to an employee.
         *  first parameter is the model and second is a
         *  foreign key.
         */
        return $this->belongsTo('App\Models\Department','dept_id');
    }

    /**
     * @return object
     */
    public function empDivision(){
        return $this->belongsTo('App\Models\Division','division_id');
    }

    /**
     * @return object
     */
    public function empCountry(){
        return $this->belongsTo('App\Models\Country','country_id');
    }

    /**
     * @return object
     */
    public function empState(){
        return $this->belongsTo('App\Models\State','state_id');
    }

    /**
     * @return object
     */
    public function empCity(){
        return $this->belongsTo('App\Models\City','city_id');
    }

    /**
     * @return object
     */
    public function empSalary(){
        return $this->belongsTo('App\Models\Salary','salary_id');
    }

    /**
     * @return object
     */
    public function empGender(){
        return $this->belongsTo('App\Models\Gender','gender_id');
    }
}
