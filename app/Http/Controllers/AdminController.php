<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
class AdminController extends Controller
{
    public function displayDashboard (){
        return view('admin.main');
    }
    public function displayOrders(){
        $data['orders'] = order::getAll();
        return view('admin.orders', $data);
    }
}




