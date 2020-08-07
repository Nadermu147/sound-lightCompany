@extends('admin.template')
@section('admin-content')
<h1>Edit Category</h1>
<form class="clearfix"action="{{url('admin/categories/' . $category->id)}}"method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name"{{$category->slug}}>
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" name="slug" class="form-control" id="slug"value="{{$category->slug}}">
    </div>


    <div class="form-group">
        <img class="admin-thumbnail"src="{{asset('storage/'. $category->image)}}">
        <label for="image">Uploade New image</label>
        <input type="file" class="form-control-file" id="image"name="image">
        <small>Leave empty to keep original image</small>
            
    </div>

    <button type="submit" class="btn btn-primary float-right">Submit</button>
</form>

@endsection