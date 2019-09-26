<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\EmployeesContract;
use App\Http\Controllers\BaseController;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Country;
use App\Models\City;
use App\Models\Salary;
use App\Models\Division;
use App\Models\State;
use App\Models\Gender;
use DB;
class EmpolyeesController extends BaseController
{   
    /**
     * @var EmployeesContract
     */
    protected $employeesRepository;
 
    /**
     * CategoryController constructor.
     * @param EmployeesContract $employeesRepository
     */
    public function __construct(EmployeesContract $employeesRepository)
    {
        $this->employeesRepository = $employeesRepository;
    }
 
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $employee = $this->employeesRepository->listEmployees();
        
        $this->setPageTitle('Employee', 'List of all Employees');
        return view('admin.employees.index', compact('employee'));
 //;Employee::Paginate(4);->with('employee',$employee)

    }
    
    /**
     * create new Employee 
     * 
     */

    public function create()
    {
        $employee = $this->employeesRepository->listEmployees('id', 'asc');

        $departments = Department::orderBy('dept_name','asc')->get();
        $countries = Country::orderBy('country_name','asc')->get();
        $cities = City::orderBy('city_name','asc')->get();
        $states = State::orderBy('state_name','asc')->get();
        $salaries = Salary::orderBy('s_amount','asc')->get();
        $divisions = Division::orderBy('division_name','asc')->get();
        $genders = Gender::orderBy('gender_name','asc')->get();

        $this->setPageTitle('Employees', 'Create Employees');
        return view('admin.employees.create', compact('employee'))->with([
            'departments'  => $departments,
            'countries'    => $countries,
            'cities'       => $cities,
            'states'       => $states,
            'salaries'     => $salaries,
            'divisions'    => $divisions,
            'genders'      => $genders
        ]);
    }
    /**
     * Store new Employee
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'first_name'     =>  'required|min:3|max:50',
        //     'last_name'      =>  'required|min:3|max:50',
        //     'email'          =>  'required|email|max:250',
        //     'age'            =>  'required|min:2|max:2',
        //     'phone'          =>  'required|max:13',
        //     'address'        =>  'required|min:10|max:500',
        //     'gender_id'      =>  'required',
        //     'salary_id'      =>  'required',
        //     'dept_id'        =>  'required',
        //     'state_id'       =>  'required',
        //     'city_id'        =>  'required',
        //     'country_id'     =>  'required', 
        //     'join_date'      =>  'required',
        //     'birth_date'     =>  'required',
        //     'division_id'    =>  'required',
        //     'picture'        =>  'mimes:jpg,jpeg,png|max:1000'  
        // ]);
        // $params = $request->all;
        // return view('admin.employees.test' , compact('params'));
       $params = $request->except('_token');
    
        $employee = $this->employeesRepository->createEmployees($params);
    
        if (!$employee) {
            return $this->responseRedirectBack('Error occurred while creating Employees.', 'error', true, true);
        }
        return $this->responseRedirect('admin.employees.index', 'Employees added Successfully' ,'success',false, false);
    }
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $employee = $this->employeesRepository->findEmployeesById($id);
        $employees = $this->employeesRepository->listEmployees();
        $departments = Department::orderBy('dept_name','asc')->get();
        $countries = Country::orderBy('country_name','asc')->get();
        $cities = City::orderBy('city_name','asc')->get();
        $states = State::orderBy('state_name','asc')->get();
        $salaries = Salary::orderBy('s_amount','asc')->get();
        $divisions = Division::orderBy('division_name','asc')->get();
        $genders = Gender::orderBy('gender_name','asc')->get();
        $this->setPageTitle('Employees', 'Edit Employees : '.$employee->name);
        return view('admin.employees.edit', compact('employees', 'employee'))->with([
            'departments'  => $departments,
            'countries'    => $countries,
            'cities'       => $cities,
            'states'       => $states,
            'salaries'     => $salaries,
            'divisions'    => $divisions,
            'genders'      => $genders
        ]);
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        // $this->validate($request, [
        //     'first_name'     =>  'required|min:3|max:50',
        //     'last_name'      =>  'required|min:3|max:50',
        //     'email'          =>  'required|email|max:250',
        //     'phone'          =>  'required|max:13',
        //     'address'        =>  'required|min:10|max:500',
        //     'gender_id'      =>  'required',
        //     'join_date'      =>  'required',
        //     'birth_date'     =>  'required',
        //     'dept_id'        =>  'required',
        //     'country_id'     =>  'required',
        //     'state_id'       =>  'required',
        //     'city_id'        =>  'required',
        //     'division_id'    =>  'required',
        //     'salary_id'      =>  'required',  
        //     'age'            =>  'required|min:2|max:2',
        //     'picture'        =>  'mimes:jpg,jpeg,png|max:1000'
        // ]);
    
        $params = $request->except('_token');
    
        $employee = $this->employeesRepository->updateEmployees($params);
    
        if (!$employee) {
            return $this->responseRedirectBack('Error occurred while updating Employees.', 'error', true, true);
        }
        return $this->responseRedirectBack('Employees updated successfully' ,'success',false, false);
    }
    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        $employee = $this->employeesRepository->findEmployeesById($id);
        //$admins = $this->adminRepository->listAdmin();
        $this->setPageTitle('Employees', 'View Employees : '.$employee->name);
        return view('admin.employees.view', compact('employee'));
    }
    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $employee = $this->employeesRepository->deleteEmployees($id);
    
        if (!$employee) {
            return $this->responseRedirectBack('Error occurred while deleting Employees.', 'error', true, true);
        }
        return $this->responseRedirect('admin.employees.index', 'Employees deleted successfully' ,'success',false, false);
    }
}
