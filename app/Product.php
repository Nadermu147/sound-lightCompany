<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    public static function store($request) { 
        $product = new self();
        $product->name        = $request->name;
        $product->slug        = $request->slug;
        $product->price       = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->image       = $request->image->store('images/products', 'public');
        $product->save();
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public static function addToCart($id, $qty = 1) {

        $product = self::findOrFail($id);

        \Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $qty,
            'price' => $product->price,
            'weight' => 0
        ]);
    }

    public static function getProduct($cat, $pro) {

        $product = self::where('slug', $pro)->firstOrFail();
        $product_cat = $product->category->slug;

        abort_if($product_cat !== $cat, 404);
        return $product;
    }

    public static function getAll() {
        return self::orderBy('slug')->get();
    }

}
