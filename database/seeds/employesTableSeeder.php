<?php

use Illuminate\Database\Seeder;
use App\Models\Employee;
class employesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employes = new Employee();
        $employes->first_name = 'Sahab';
        $employes->last_name = 'Uddin';
        $employes->email = 'sahabuddinriyaj984@gmail.com';
        $employes->age = '23';
        $employes->phone = '018670335023';
        $employes->address = '018670335023';
        $employes->gender_id = '1';
        $employes->join_date = '2019/08/20';
        $employes->birth_date = '2019/08/20';
        $employes->dept_id = '1';
        $employes->country_id = '1';
        $employes->state_id = '1';
        $employes->city_id = '1';
        $employes->division_id = '1';
        $employes->salary_id = '1';
        $employes->age = '23';
        $employes->picture = 'no_image.png';
        $employes->save();
    }
}
