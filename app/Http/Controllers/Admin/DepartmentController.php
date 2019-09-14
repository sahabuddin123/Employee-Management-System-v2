<?php

namespace App\Http\Controllers\Admin;
 
use Illuminate\Http\Request;
use App\Contracts\DepartmentContract;
use App\Http\Controllers\BaseController;


class DepartmentController extends BaseController
{
    /* @var DepartmentContract
    */
   protected $departmentRepository;

   /**
    * CategoryController constructor.
    */ /*@param CategoryContract $categoryRepository
    */
   public function __construct(DepartmentContract $departmentRepository)
   {
       $this->departmentRepository = $departmentRepository;
   }

   /**
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
   public function index()
   {
       $departments = $this->departmentRepository->listDepartment();

       $this->setPageTitle('Department', 'List of all departments');
       return view('admin.departments.index', compact('departments'));

   }
   public function create()
{
    $departments = $this->departmentRepository->listDepartment('id', 'asc');
 
    $this->setPageTitle('Department', 'Create Department');
    return view('admin.departments.create', compact('departments'));
}
    public function store(Request $request)
    {
        $this->validate($request, [
            'dept_name'      =>  'required|max:191'
        ]);
    
        $params = $request->except('_token');
    
        $department = $this->departmentRepository->createDepartment($params);
    
        if (!$department) {
            return $this->responseRedirectBack('Error occurred while creating Department.', 'error', true, true);
        }
        return $this->responseRedirect('admin.departments.index', 'Department added successfully' ,'success',false, false);
    }


    public function edit($id)
    {
        $targetdepartment = $this->departmentRepository->findDepartmentById($id);
        $department = $this->departmentRepository->listDepartment();
    
        $this->setPageTitle('Department', 'Edit Department : '.$targetdepartment->name);
        return view('admin.departments.edit', compact('department', 'targetdepartment'));
    }
   
    public function update(Request $request)
    {
        $this->validate($request, [
            'dept_name'      =>  'required|max:191'
        ]);
    
        $params = $request->except('_token');
    
        $department = $this->departmentRepository->updateDepartment($params);
    
        if (!$department) {
            return $this->responseRedirectBack('Error occurred while updating Department.', 'error', true, true);
        }
        return $this->responseRedirectBack('Department updated successfully' ,'success',false, false);
    }


    public function delete($id)
{
    $department = $this->departmentRepository->deleteDepartment($id);
 
    if (!$department) {
        return $this->responseRedirectBack('Error occurred while deleting department.', 'error', true, true);
    }
    return $this->responseRedirect('admin.departments.index', 'department deleted successfully' ,'success',false, false);
}
}
