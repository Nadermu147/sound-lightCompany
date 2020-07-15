<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller
{
    public function addToCart($id){
       Product::addToCart($id);
       return \Cart::count();
   }
}
