<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class ShopController extends Controller
{
    public function displayCategory($slug) {
        $data['category'] = Category::getCategory($slug);
        return view('shop.category' ,$data);
    }
    public function displayShop () {
        $data['categories'] = Category::getCategories();
        //dd($data);
        return view('shop.shop', $data);
    }
  
}
