<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Product extends Model {

    public static function getProductById($id) {
        return self::findOrFail($id);
    }

    public static function store($request) {
        $product = new self();
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->image = $request->image->store('images/products', 'public');
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

    public static function editProduct($request) {

        $product = self::findOrFail($request->product);

        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category;
        if($request->image){
            Storage::disk('public')->delete($product->image);
        $product->image = $request->image->store('images/products', 'public');
        }
        $product->save();
    }
    public static function deleteProduct($id) {
        $product = self::findOrFail($id);
        Storage::disk('public')->delete($product->image);
        self::destroy($id); 
    }
    
    public static function getProductByprice($cat, $pro){
       $min_price = Input::has('min_price') ? Input::get('min_price') : null;
       $max_price = Input::has('max_price') ? Input::get('max_price') : null;        if(isset($min_price) && isset($max_price)){
            $product->where('price', '>=', $min_price)->
                    where('price' ,$max_price);        }
        $product->get();
    }
}
