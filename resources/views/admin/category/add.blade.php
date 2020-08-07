@extends('admin.template')
@section('admin-content')
<h1>Add new Category</h1>
<form class="clearfix"action="{{url('admin/categories')}}"method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name">
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" name="slug" class="form-control" id="slug">
    </div>


    <div class="form-group">
        <label for="image">Example file input</label>
        <input type="file" class="form-control-file" id="image"name="image">
    </div>

    <button type="submit" class="btn btn-primary float-right">Submit</button>
</form>

@endsection