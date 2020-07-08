<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    public function product (){
        return $this->hasMany('App\product');
    }
    
   public static function getCategories () {
       
  //return self::all()->sortBy('slug'); sort by ABC
  return self::orderBy('slug')->get();

   }
}
