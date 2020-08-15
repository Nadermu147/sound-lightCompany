
@extends('template')
@section('content')

<div class='row'>
    <div class="col-md-3">
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills">
                    <a class="nav-link active"  href="{{url('admin')}}">Welcom</a>
                    <a class="nav-link"  href="{{url('admin/orders')}}">Orders</a>
                    <a class="nav-link"  href="{{url('admin/categories')}}">Categories</a>
                    <a class="nav-link"  href="{{url('admin/products')}}">Product</a>
                    <a class="nav-link"  href="{{url('admin/users')}}">Users</a>
                    <a class="nav-link"  href="{{url('admin/pages')}}">Pages </a>
                   
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-9">
        @yield('admin-content')
    </div>

</div>
@endsection