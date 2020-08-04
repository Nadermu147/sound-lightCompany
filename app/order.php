<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model {

    public static function store() {
        $order = new self();
        $order->user_id = session('id');
        $order->order_list = \cart::content()->toJson();

        $order->save();
        \Cart::destroy();
    }

    public static function getAll(){
        return self::orderBy('created_at', 'desc')->get();
    }
    
}
