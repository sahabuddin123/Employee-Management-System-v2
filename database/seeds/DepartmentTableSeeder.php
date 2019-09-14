<?php

use Illuminate\Database\Seeder;
use App\Models\Department;
class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   $department = new Department();
        $department->dept_name = 'Teacher';
        $department->save();
        $department = new Department();
        $department->dept_name = 'Driver';
        $department->save();
       
    }
}
