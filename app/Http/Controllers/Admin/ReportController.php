<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\EmployeesContract;
use App\Http\Controllers\BaseController;
use Carbon\Carbon;
use App\Models\Employee;
use PDF;
use App;
use DB;
class ReportController extends BaseController
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
        return view('admin.report.index', compact('employee'));
    }
     /**
     *  Generate PDF
     * 
     * @return \Illuminate\Http\Response
     */
    public function makeempReport(){
        $employees = $this->employeesRepository->listEmployees();
        //generate pdf
        $pdf = PDF::loadView('admin.report.empreport',['employees' => $employees])->setPaper('a4', 'landscape');
        return $pdf->stream('Employee_hired_report');
    }
     /**
     *  Generate PDF
     * 
     * @return \Illuminate\Http\Response
     */
    public function makeReport($id){
        $employee = $this->employeesRepository->findEmployeesById($id);
        //generate pdf
        $pdf = PDF::loadView('admin.report.report',compact('employee'))->setPaper('a4', 'portrait');
        return $pdf->stream('Employee_hired_report');
    }
}
