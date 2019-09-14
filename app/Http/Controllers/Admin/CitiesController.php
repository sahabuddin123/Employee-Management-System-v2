<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\CityContract;
use App\Http\Controllers\BaseController;

class CitiesController extends BaseController
{
    /* @var DepartmentContract
    */
   protected $cityRepository;

   /**
    * CategoryController constructor.
    */ /*@param CategoryContract $categoryRepository
    */
   public function __construct(CityContract $cityRepository)
   {
       $this->cityRepository = $cityRepository;
   }

   /**
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
   public function index()
   {
       $city = $this->cityRepository->listCity();

       $this->setPageTitle('City', 'List of all City');
       return view('admin.city.index', compact('city'));

   }
   public function create()
{
    $city = $this->cityRepository->listCity('id', 'asc');
 
    $this->setPageTitle('City', 'Create City');
    return view('admin.city.create', compact('city'));
}
    public function store(Request $request)
    {
        $this->validate($request, [
            'city_name'      =>  'required|max:191',
            'zip_code'       =>  'required|max:191'
        ]);
    
        $params = $request->except('_token');
    
        $city = $this->cityRepository->createCity($params);
    
        if (!$city) {
            return $this->responseRedirectBack('Error occurred while creating city.', 'error', true, true);
        }
        return $this->responseRedirect('admin.city.index', 'city added successfully' ,'success',false, false);
    }


    public function edit($id)
    {
        $targetcity = $this->cityRepository->findCityById($id);
        $city = $this->cityRepository->listCity();
    
        $this->setPageTitle('City', 'Edit City : '.$targetcity->name);
        return view('admin.city.edit', compact('city', 'targetcity'));
    }
   
    public function update(Request $request)
    {
        $this->validate($request, [
            'city_name'      =>  'required|max:191',
            'zip_code'       =>  'required|max:191'
        ]);
    
        $params = $request->except('_token');
    
        $city = $this->cityRepository->updateCity($params);
    
        if (!$city) {
            return $this->responseRedirectBack('Error occurred while updating City.', 'error', true, true);
        }
        return $this->responseRedirectBack('City updated successfully' ,'success',false, false);
    }


    public function delete($id)
{
    $city = $this->cityRepository->deleteCity($id);
 
    if (!$city) {
        return $this->responseRedirectBack('Error occurred while deleting city.', 'error', true, true);
    }
    return $this->responseRedirect('admin.city.index', 'city deleted successfully' ,'success',false, false);
}
}

