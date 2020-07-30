<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public static function store ($request){
        $user = new self();
        $user->name = $request->name;
        $user->email = $request->email   ;
        $user->password = bcrypt($request->password);
        $user->rol_id = 35;
        $user->save(); 
 
     }
}
