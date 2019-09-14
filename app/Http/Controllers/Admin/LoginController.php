<?php

namespace App\Http\Controllers\Admin;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    //
    use AuthenticatesUsers;
    //adminprotected key
    protected $redirectTo = '/admin';
    //admin access 
    public function __construct(){
        $this->middleware('guest:admin')->except('logout');
    }
//show login page
    public function ShowLoginForm(){
        return view('admin.auth.login');
    }
//user if admin from input==db input, then admin access to dashboard else returnback admin.login
    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if(Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ],
        $request->get('remember'))){
            return redirect()->intended(route('admin.dashboard'));
        }
        return back()->withInput($request->only('email','remember'));
    }
// admin logout of session expire
public function logout(Request $request) 
{ 
    Auth::guard('admin')->logout(); 
    $request->session()->invalidate(); 
    return redirect()->route('admin.login'); 
} 
}
