<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
        $admin->first_name = 'Sahab';
        $admin->last_name = 'Uddin';
        $admin->username = 'sahabuddin123';
        $admin->email = 'sahabuddinriyaj984@gmail.com';
        $admin->password = bcrypt('1032000');
        $admin->picture = 'no_image.png';
        $admin->save();
    }
}
