@extends('template')
@section('content')
<h1 class="mb-5">Shop page</h1>


<div class="row">
    @if($categories->isEmpty())
    <h2>We dont have anythink to offer.</h2>
    @endif
    @foreach($categories as $categorey)

    <div class="col-md-4 mb-5">
        <div class="cat-container">
            <h3>{{strtoupper($categorey->name)}}</h3>
            <a class="stretched-link"href='{{url('shop/' . $categorey->slug)}}'><img src="{{asset('imagesd/categories/' . $categorey->image)}}"></a>
        </div>

    </div>

    @endforeach

</div>
@endsection