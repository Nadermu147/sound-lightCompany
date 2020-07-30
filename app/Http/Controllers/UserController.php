<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Http\Requests\UserSignup;
use App\User;
class UserController extends Controller
{
    public function DisplaySignup () {
        return View('user.signup');
    }
    public function processSignup(UserSignup $request) {
        User::store($request);
        return redirect('login');
    }
}
