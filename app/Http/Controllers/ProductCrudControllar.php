<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\ProductHandler;

class ProductCrudControllar extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::getAll();
       return view('admin.products.list', $data);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data['categories'] = Category::getCategories();
       return view('admin.products.add', $data );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductHandler $request)
    {
        Product::store($request);
        return redirect('admin/products')->with('status', 'the product was add successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
               $data['categories'] = Category::getCategories();
               $data['product'] = Product::getProductById($id);
              return view('admin.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductHandler $request, $id)
    {
       Product::editProduct($request);
       return redirect('admin/products')->with('status','The product was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::deleteProduct($id);
        return redirect('admin/products')->with('status', 'The product was deleted successfully.');
    }
}
