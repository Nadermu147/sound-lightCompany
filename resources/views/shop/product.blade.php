@extends('template')
@section('content')

<div class="col-md-7">
    <h1>{{strtoupper($product->name)}}</h1>
    
    <p>{{$product->description}}</p>
    <p>only for:&#8362; {{$product->price}}</p>


    <div class="col-md-5">
        <img src="{{asset('images/product/'. $product->image)}}">
    </div>
    <form>
        <div class="number">
            <span class="minus">-</span>
            <input type="text" value="1"/>
            <span class="plus">+</span>
            <button class="btn btn-primary"type="submit">Add</button>
        </div>

    </form>
</div>

@endsection