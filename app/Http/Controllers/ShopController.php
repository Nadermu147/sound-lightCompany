<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class ShopController extends Controller
{
    public function displayShop () {
        $data['categories'] = Category::getCategories();
        //dd($data);
        return view('shop.shop', $data);
    }
    public function displayCategory($slug) {
        $data['category'] = 'function';
        return view('shop.category' ,$data);
    }
}
