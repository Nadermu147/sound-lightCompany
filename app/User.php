<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
class User extends Model
{
    public function role(){
        return $this->belongsTo('App\Role');
    }
    public static function getUsers(){
        return self::orderBy('name')->get();
    }
    public static function store ($request){
        $user = new self();
        $user->name = $request->name;
        $user->email = $request->email   ;
        $user->password = bcrypt($request->password);
     $user->role_id = $request->role ?? 35;
        $user->save(); 
 
     }
     public static function loginUser($request){
        $user = self::where('email', $request->email)->first(); 
        if(! $user || ! Hash::check($request->password , $user->password)){
            return false;
        }
        session([
            'name'=> $user->name,
            'role' => $user->role_id,
            'id' => $user->id,
                ]);
        return true;
     }
}
