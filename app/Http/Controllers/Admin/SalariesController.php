<?php

namespace App\Http\Controllers\Admin;
 
use Illuminate\Http\Request;
use App\Contracts\SalaryContract;
use App\Http\Controllers\BaseController;


class SalariesController extends BaseController
{
    /* @var SalaryContract
    */
   protected $salaryRepository;

   /**
    * CategoryController constructor.
    */ /*@param CategoryContract $categoryRepository
    */
   public function __construct(SalaryContract $salaryRepository)
   {
       $this->salaryRepository = $salaryRepository;
   }

   /**
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
   public function index()
   {
       $salary = $this->salaryRepository->listSalary();

       $this->setPageTitle('Salary', 'List of all Salarys');
       return view('admin.salary.index', compact('salary'));

   }
   public function create()
{
    $salary = $this->salaryRepository->listSalary('id', 'asc');
 
    $this->setPageTitle('Salary', 'Create Salary');
    return view('admin.salary.create', compact('salary'));
}
    public function store(Request $request)
    {
        $this->validate($request, [
            's_amount'      =>  'required|max:191'
        ]);
    
        $params = $request->except('_token');
    
        $salary = $this->salaryRepository->createSalary($params);
    
        if (!$salary) {
            return $this->responseRedirectBack('Error occurred while creating Salary.', 'error', true, true);
        }
        return $this->responseRedirect('admin.salary.index', 'Salary added successfully' ,'success',false, false);
    }


    public function edit($id)
    {
        $targetsalary = $this->salaryRepository->findSalaryById($id);
        $salary = $this->salaryRepository->listSalary();
    
        $this->setPageTitle('Salary', 'Edit Salary : '.$targetsalary->name);
        return view('admin.salary.edit', compact('salary', 'targetsalary'));
    }
   
    public function update(Request $request)
    {
        $this->validate($request, [
            's_amount'      =>  'required|max:191'
        ]);
    
        $params = $request->except('_token');
    
        $salary = $this->salaryRepository->updateSalary($params);
    
        if (!$salary) {
            return $this->responseRedirectBack('Error occurred while updating Salary.', 'error', true, true);
        }
        return $this->responseRedirectBack('Salary updated successfully' ,'success',false, false);
    }


    public function delete($id)
{
    $salary = $this->salaryRepository->deleteSalary($id);
 
    if (!$salary) {
        return $this->responseRedirectBack('Error occurred while deleting Salary.', 'error', true, true);
    }
    return $this->responseRedirect('admin.salary.index', 'Salary deleted successfully' ,'success',false, false);
}
}

