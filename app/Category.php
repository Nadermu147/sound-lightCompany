<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Category extends Model {

    public function products() {
        return $this->hasMany('App\product');
    }

    public static function getCategory($slug) {

        return self::where('slug', $slug)->firstOrFail();
    }

    public static function getCategories() {

        //return self::all()->sortBy('slug'); sort by ABC
        return self::orderBy('slug')->get();
    }

    public static function store($request) {
        $category       = new self();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->image = $request->image->store('images/categories', 'public');
        $category->save();
    }

    public static function getCategoryById($id) {
        return self::findOrFail($id);
    }

//    protected function parseCasterClass($class): string {
//        parent::parseCasterClass($class);
//    }

    public static function updateCategory($id, $request) {
        $category = self::findOrFail($id);
        $category->name = $request->name;
        $category->slug = $request->slug;

        if ($request->image) {
            Storage::disk('public')->delete($category->image);
            $category->image = $request->image->store('images/categories', 'public');
        }
        $category->save();
    }

    public static function deleteCategory($id) {
      $category = self::findOrFail($id) ;
      Storage::disk('public')->delete('$category->image');
      $products = $category->products;
      foreach ($products as $product){
          Product::deleteProduct($product->id);
      }
      self::destroy($id);
    }

}
