<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Http\Requests\UserSignup;
use App\User;
use App\Http\Requests\UserLogin;
class UserController extends Controller
{
    public function DisplaySignup () {
        return View('user.signup');
    }
    public function processSignup(UserSignup $request) {
        User::store($request);
        return redirect('login');
    }
    public function displayLogin (){
        return View('user.login');
    }
    
    public function processLogin (UserLogin $request){
        if(User::loginUser($request)){
            return redirect('shop')->with('status', 'Welcom' . ucfirst(session('name')) . ' enjoy your shopping');
          }
        return redirect('login')->with('status-fail', 'Wrong mail or password');
    }
    public function logout(Request $request) {
          $name = session ('name');
       $request->session()->flush();
     
       return redirect ('shop')->with('status', 'Bye Bye ' .   $name);
    }
}
