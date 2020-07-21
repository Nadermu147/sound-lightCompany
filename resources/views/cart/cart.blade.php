@extends('template')
@section('content')
@if($items->isEmpty())
<h3>Your Cart is Empty start <a href="{{url('shop')}}">start shopping</a></h3>
@else
<h1>Your Cart is :</h1>


<table class="table table-hover table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">qty</th>
            <th scope="col">TotaL (&#8362;)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>

            <td class="delete"><a class="delete-product text-danger"href="{{url('delet-item/' . $item->rowId)}}">x</a></td>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>
                <form class="update-cart" method="post" action="{{url('update-cart')}}">
                    @csrf
                    <div class="number">
                        <span class="minus"style="color: black">-</span>
                        <input class="product-quantity" type="text" value="{{$item->qty}}" readonly name="quantity">
                        <span class="plus"style="color: black">+</span>
                    </div>
                    <input type="hidden" value="{{$item->rowId}}" name="rowId"> 
                </form>
            </td>
            <td class="product-total">{{number_format($item->total)}}</td>
        </tr>

        @endforeach

    </tbody>
    <tfoot>
        <tr>
            <th colspan="4">Total</th>
            <td class="cart-total">{{$total}}</td>
        </tr>
    </tfoot>

</table>

<a class="delete-cart" href="{{url('delete-cart')}}">Delet Cart</a>
<p class=" clearfix"><a class="btn btn-primary float-right" href="#">Place holder</a></p>
@endif
@endsection