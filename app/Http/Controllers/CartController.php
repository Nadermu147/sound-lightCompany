<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller {
    
    public function addToCartByQty(Request $request){
       Product::addToCart($request->id,(int) $request->quantity);
       return \Cart::count();
   }
    public function addToCart($id){
       Product::addToCart($id);
       return \Cart::count();
   }
  
    public function displayCart(){
     
       return view ('cart.cart');
   }
   
 }
