<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    //
    protected $table = 'departments';
    protected $fillable = ['first_name','last_name','username','email','password','picture'];
}