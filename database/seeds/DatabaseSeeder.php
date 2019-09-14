<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        //AdminTableSeeder
         $this->call(AdminTableSeeder::class);
        //GendersTableSeeder
         $this->call(GendersTableSeeder::class);
          //SettingsTableSeeder
         $this->call(SettingsTableSeeder::class);
         //DepartmentTableSeeder
         $this->call(DepartmentTableSeeder::class);
         
        
    }
}
