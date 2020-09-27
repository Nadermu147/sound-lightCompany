<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Facade\FlareClient\Http\Response;

class ShopController extends Controller
{

    public function displayProduct($cut, $pro)
    {
        $data['product'] = Product::getProduct($cut, $pro);
        return view('shop.product', $data);
    }

    public function displayCategory($slug)
    {
        $data['category'] = Category::getCategory($slug);
        return view('shop.category', $data);
    }

    public function displayShop()
    {
        $data['categories'] = Category::getCategories();
        //dd($data);
        return view('shop.shop', $data);
    }



    public function SearchProduct(Request $request)
    {
        $query = $request->input('query');
        if ($query) {

           $data = Product::where('name', 'like', "%$query%")->get();
            return view('shop.searchproduct')->with("products",   $data);
        } else {
            return  back();
        }

    }
    public function autoComplete(Request $request){
        if($request->ajax()){
        $request->get('searchPro');
        $data = Product::where('name', 'like', '%' . $request->get('searchPro') . '%')->get();

        $output = '';
         // if searched countries count is larager than zero
         if (count($data)>0) {
            // concatenate output to the array
            $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
            // loop through the result array
            foreach ($data as $row){
                // concatenate output to the array
                $output .='<li class="list-group-item link-class"><img src="storage/'. $row->image .
                '" height="40" width="40" class="img-thumbnail" />
                '.$row->name.'</li>';


            }
            // end of output
            $output .= '</ul>';
        }
        else {
            // if there's no matching results according to the input
            $output .= '<li class="list-group-item">'.'No results'.'</li>';
        }
        // return output result array
        return $output;
    }


}
}


/* public function SearchProduct(Request $request){
    $query = $request->input('query');
    if($query){
            $products = Product::where('name' , 'like', "%$query%")->get();
            return view('shop.searchproduct')->with("products",$products);

    }else{
        return view( url()->current());
    }
    } */
