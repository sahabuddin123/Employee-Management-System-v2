<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Division;
use App\Models\Country;
use App\Models\City;
use App\Models\State;
use App\Models\Salary;
use App\Models\Admin;
use Carbon\Carbon;
use DB;
class DashboardController extends BaseController
{
     /**
     * Show Dashboard View
     *
     * @return View
     */
    public function index(){
        //get Current date and time
        $date_current = Carbon::now()->toDateTimeString();
        //get date and time of previous month
        /**
         *  subMonths() means it will subtract the month with
         *  the given argument.
         */
        $prev_date1 = $this->getPrevDate(1);
        $prev_date2 = $this->getPrevDate(2);
        $prev_date3 = $this->getPrevDate(3);
        $prev_date4 = $this->getPrevDate(4);

        /**
         *  get count of employee between two given dates.
         */
        $emp_count_1 = Employee::whereBetween('join_date',[$prev_date1,$date_current])->count();
        $emp_count_2 = Employee::whereBetween('join_date',[$prev_date2,$prev_date1])->count();
        $emp_count_3 = Employee::whereBetween('join_date',[$prev_date3,$prev_date2])->count();
        $emp_count_4 = Employee::whereBetween('join_date',[$prev_date4,$prev_date3])->count();

        $t_admins = Admin::all()->count();
        $t_employees = Employee::all()->count();
        $t_countries = Country::all()->count();
        $t_states = State::all()->count();
        $t_cities = City::all()->count();
        $t_departments = Department::all()->count();
        $t_divisions = Division::all()->count();
        $t_salaries = Salary::all()->count();


        return view('admin.dashboard.index')
            ->with([
                'emp_count_1'     =>  $emp_count_1,
                'emp_count_2'     =>  $emp_count_2,
                'emp_count_3'     =>  $emp_count_3,
                'emp_count_4'     =>  $emp_count_4,
                't_employees'     =>  $t_employees,
                't_countries'     =>  $t_countries,
                't_cities'        =>  $t_cities,
                't_states'        =>  $t_states,
                't_salaries'      =>  $t_salaries,
                't_divisions'     =>  $t_divisions,
                't_departments'   =>  $t_departments,
                't_admins'        =>  $t_admins
            ]);
    }

    /**
     *  get the sub month of the given integer
     */
    private function getPrevDate($num){
        return Carbon::now()->subMonths($num)->toDateTimeString();
    }
}
