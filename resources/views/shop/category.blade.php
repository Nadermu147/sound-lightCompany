@extends('template')
@section('content')


<h1 class="mb-5">{{strtoupper($category->name)}}</h1>
@if($category->products->isEmpty())
<h3>We don't have product to Show</h3>

@endif

<div class="row">
   
    @foreach($category->products as $product)

    <div class="col-md-4 mb-5">
        <div class="pro-container">
            <h3>{{strtoupper($product->name)}}</h3>
            <a class="" href='{{url('shop/' . $category->slug). '/' . $product->slug}}'><img class="img1" src="{{asset('images/product/' . $product->image)}}"></a>
            <h4>&#8362;{{$product->price}}</h4>
            <a href="{{url('add-to-cart/'. $product->id)}}" class="add-to-cart btn btn-primary">Add To Cart</a>
            <a   class="btn btn-info"href="{{url()->current(). '/' . $product->slug}}">Read More</a>
        </div>

    </div>

    @endforeach

</div>
@endsection