<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller {

    ///////////////////////////////////
    public function addToCartByQty(Request $request) {

        Product::addToCart($request->id, (int) $request->quantity);
        return \Cart::count();
    }

    //////////////////////////////////////////
    public function addToCart($id) {
        Product::addToCart($id);
        return \Cart::count();
    }

    //////////////////////////////////////////
    public function displayCart() {
        \Cart::setGlobalTax(0);
        $data['items'] = \Cart::content();
        $data['total'] = \Cart::total(0);

        return view('cart.cart', $data);
    }

    //////////////////////////updateCart
    public function updateCart(Request $request) {
        \Cart::update($request->rowId, $request->quantity);
         $data = [
          
             'cart_count' => \Cart::count(),
             'cart_total' => \Cart::total(0),
             'product_total' => \Cart::get($request->rowId)->total(0),
              
         ];
       
        return json_encode($data);
    }
/////////////////////////////////////////
     public function deletItem ($rowId) {
         \Cart::remove($rowId);
         return redirect('cart')->with('status', 'The product was deleted from your Cart');
     }
     ///////////////////////////////////////////
     public function deletCart () {
         \Cart::destroy();
         return redirect('shop')->with('status', 'The Cart wase deleted  ');
     }
}
