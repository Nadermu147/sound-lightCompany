@extends('template')

@section('content')


<h1 class="mb-5">{{strtoupper($category->name)}}</h1>
@if($category->products->isEmpty())
<h3>We don't have product to Show ,press <a href="{{url('shop')}}">shop</a> to start shop. </h3>
@else
<div class="searchbtndiv">
<button type="button" class="btn btn-warning searchbtn"><a href="{{ url()->current().'/?sort=DESC'}}" style="color:black"> High to low</a></button>
<button type="button" class="btn btn-warning searchbtn"><a href="{{ url()->current().'/?sort=ASC' }}" style="color:black">Low to high</a>
</button>
</div>

@endif
<?php
if(!isset($_GET['sort'])){
    $_GET['sort'] = "ASC";
}
$_GET['sort'] == "ASC" ? $products = $category->products->sortBy('price') : $products = $category->products;


?>

<div class="row">

    @foreach($products as $product)

    <div class="col-md-4 mb-5">
        <div class="pro-container">
            <h3>{{strtoupper($product->name)}}</h3>
            <a class="" href='{{url('shop/' . $category->slug). '/' . $product->slug}}'><img class="img1" src="{{asset('storage/' . $product->image)}}"></a>
            <h4>&#8362;{{$product->price}}</h4>
            <a href="{{url('add-to-cart/'. $product->id)}}" class="add-to-cart btn btn-primary">Add To Cart</a>
            <a   class="btn btn-info"href="{{url()->current() . '/' . $product->slug}}">Read More</a>
        </div>

    </div>

    @endforeach

</div>

@endsection
