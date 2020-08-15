@extends('admin.template')
@section('admin-content')
<h1>Add new Product</h1>
@if($categories->isEmpty())
<h2>In order to create product, please <a href="{{url('admin/categories/create')}}"> create at least category</a></h2>
@else

<form class="clearfix"action="{{url('admin/products')}}"method="post" enctype="multipart/form-data">
    @csrf 
   

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}">
    </div>

    <div class="form-group">
        <label for="slug">slug</label>
        <input type="text" name="slug" class="form-control" id="slug"value="{{old('slug')}}">
    </div>
    <div class="form-group">
              <label for="category">Category</label>
              <select class="form-control"id="category"name="category">
                  <option value="0">Choose Category</option>
                  @foreach($categories as $category)
                  <option value="{{$category->id}}"{{$category->id == old('category')? 'selected' : ''}}>{{$category->name}}</option>
                  @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" name="price" class="form-control" id="price"step="0.01"value="{{old('price')}}">
    </div>


    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control"id="description"name="description"">{{old('description')}}</textarea>
    </div>



    <div class="form-group">
        <label for="image">Product image</label>
        <input type="file" class="form-control-file" id="image"name="image">
    </div>

    <button type="submit" class="btn btn-primary float-right">Submit</button>
</form>
@endif
@endsection