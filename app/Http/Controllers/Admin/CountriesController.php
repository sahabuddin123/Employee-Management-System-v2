<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\CountryContract;
use App\Http\Controllers\BaseController;

class CountriesController extends BaseController
{
    /* @var DepartmentContract
    */
   protected $countryRepository;

   /**
    * CategoryController constructor.
    */ /*@param CountryContract $categoryRepository
    */
   public function __construct(CountryContract $countryRepository)
   {
       $this->countryRepository = $countryRepository;
   }

   /**
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
   public function index()
   {
       $country = $this->countryRepository->listCountry();

       $this->setPageTitle('country', 'List of all country');
       return view('admin.country.index', compact('country'));

   }
   public function create()
    {
        $country = $this->countryRepository->listCountry('id', 'asc');
    
        $this->setPageTitle('country', 'Create country');
        return view('admin.country.create', compact('country'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'country_name'      =>  'required|max:191',
            'country_code'       =>  'required|max:191'
        ]);
    
        $params = $request->except('_token');
    
        $country = $this->countryRepository->createCountry($params);
    
        if (!$country) {
            return $this->responseRedirectBack('Error occurred while creating country.', 'error', true, true);
        }
        return $this->responseRedirect('admin.country.index', 'country added successfully' ,'success',false, false);
    }


    public function edit($id)
    {
        $targetcountry = $this->countryRepository->findCountryById($id);
        $country = $this->countryRepository->listCountry();
    
        $this->setPageTitle('country', 'Edit country : '.$targetcountry->name);
        return view('admin.country.edit', compact('country', 'targetcountry'));
    }
   
    public function update(Request $request)
    {
        $this->validate($request, [
            'country_name'      =>  'required|max:191',
            'country_code'       =>  'required|max:191'
        ]);
    
        $params = $request->except('_token');
    
        $country = $this->countryRepository->updateCountry($params);
    
        if (!$country) {
            return $this->responseRedirectBack('Error occurred while updating country.', 'error', true, true);
        }
        return $this->responseRedirect('admin.country.index' ,'country updated successfully' ,'success',false, false);
    }


    public function delete($id)
{
    $country = $this->countryRepository->deleteCountry($id);
 
    if (!$country) {
        return $this->responseRedirectBack('Error occurred while deleting country.', 'error', true, true);
    }
    return $this->responseRedirect('country deleted successfully' ,'success',false, false);
}
}
