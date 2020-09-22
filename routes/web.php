
<?php

use Illuminate\Support\Facades\Route;
use App\Product;
use App\User;

use Illuminate\Support\Facades\Request;
use Spatie\Searchable\Search;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
//
//old way
//Route::get('/', function () {
//    return view('pages.home');
//});
//
//
//Route::get('/about', function () {
//    return view('pages.about');
//});
//new way
Route::view('/', 'pages.home');
Route::view('about', 'pages.about');
//Route::view('shop', 'shop.shop');
Route::get('shop', 'ShopController@displayShop');
Route::get('shop/{categorey}', 'shopController@displayCategory');
Route::get('shop/{categorey}/{product}', 'shopController@displayProduct');

Route::get('add-to-cart/{product_id}', 'CartController@addToCart');
Route::post('add-to-cart', 'CartController@addToCartByQty');
Route::get('cart', 'CartController@displayCart');
Route::post('update-cart', 'CartController@updateCart');
Route::get('delet-item/{rowId}', 'CartController@deletItem');
Route::get('delete-cart', 'CartController@deletCart');

Route::get('signup', 'UserController@DisplaySignup');
Route::post('signup', 'UserController@processSignup');

Route::get('login', 'UserController@displayLogin');
Route::post('login', 'UserController@processLogin');

Route::get('logout', 'UserController@logout');


Route::get('place-order', 'CartController@placeOrder');

Route::get('admin', 'AdminController@displayDashboard')->middleware('validate_admin');
Route::get('admin/orders', 'AdminController@displayOrders')->middleware('validate_admin');

Route::resource('admin/categories', 'CategryCrudController')->middleware('validate_admin');
Route::resource('admin/products', 'ProductCrudControllar')->middleware('validate_admin');
Route::resource('admin/users', 'UserCrudController')->middleware('validate_admin');
Route::resource('admin/pages', 'PageCrudController')->middleware('validate_admin');
Route::get('shop/searchproduct',' SearchProduct@SearchPro');
//search product


Route::any('/search',function(){
    $q = Request::get ( 'q' );

    if ($q) {
    $product = Product::where('name','LIKE','%'.$q.'%')->orWhere('slug','LIKE','%'.$q.'%')->get();
    if(count($product) > 0){
        return view('shop/searchproduct')->withDetails($product)->withQuery ( $q );


    }
    else {

        return redirect('shop')->with('status', 'We don\'t have product to show');
    }
}  else {

    return redirect('shop')->with('status', '');
}
});

Route::get('shop/searchproduct','SearchControllar@searchCategory');

//should be the last rout
Route::get('{slug}', 'PageController@displayPage');
