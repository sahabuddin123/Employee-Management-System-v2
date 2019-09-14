<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
class Adminuser extends Model
{
    
    protected $table = 'admins';
    protected $fillable = ['username','first_name','last_name','email','password','picture'];
    protected $hidden = ['password', 'remember_token',];
        
    
    
   
}
