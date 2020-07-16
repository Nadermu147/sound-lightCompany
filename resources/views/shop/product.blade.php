@extends('template')
@section('content')

<div class="row">
    <div class="col-md-7">
        <h1>{{strtoupper($product->name)}}</h1>

        <p>{{$product->description}}</p>
        <p>only for:&#8362; {{$product->price}}</p>
        <form id="add-to-cart"method="post"action="{{url('add-to-cart')}}">
            @csrf

            <div class="number">
                <span class="minus">-</span>
                <input name="quantity"type="text" value="1" readonly>
                <span class="plus">+</span>

                <button class="btn btn-primary"type="submit">Add</button>
            </div>
            <input name="id"type="hidden"value="{{$product->id}}">
        </form>
    </div>
    <div class="col-md-5">
        <img src="{{asset('images/product/'. $product->image)}}">
    </div>
</div>

@endsection