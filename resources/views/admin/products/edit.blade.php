@extends('admin.template')
@section('admin-content')
<h1>Edit Product</h1>


<form class="clearfix"action="{{url('admin/product/' . $product->id)}}"method="post" enctype="multipart/form-data">
    @csrf 
   
     @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" value="{{old('name',$product->name)}}">
    </div>

    <div class="form-group">
        <label for="slug">slug</label>
        <input type="text" name="slug" class="form-control" id="slug"value="{{old('slug',$product->slug)}}">
    </div>
    <div class="form-group">
              <label for="category">Category</label>
              <select class="form-control"id="category"name="category">
                  <option value="0">Choose Category</option>
                  @foreach($categories as $category)
                  <option value="{{$category->id}}" {{$category->id == old('category', $product->category_id)? 'selected' : ''}}>{{$category->name}}</option>
                  @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" name="price" class="form-control" id="price"step="0.01"value="{{old('price',$product->price)}}">
    </div>


    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control"id="description"name="description"">{{old('description', $product->description)}}</textarea>
    </div>



    <div class="form-group">
        <label for="image">Product image</label>
        <input type="file" class="form-control-file" id="image"name="image">
    </div>

    <button type="submit" class="btn btn-primary float-right">Submit</button>
</form>

@endsection