@extends('admin.template')
@section('admin-content')
<h1>Add new page</h1>
<form class="clearfix"action="{{url('admin/pages')}}"method="post">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name"value="{{old('name')}}">
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" name="slug" class="form-control" id="slug"value="{{old('slug')}}">
    </div>


    <div class="form-group">
        <label for="content">content</label>
        <textarea   class="form-control" id="content"name="content" rows="10">{!! old('content') !!}</textarea>
    </div>

    <button type="submit" class="btn btn-primary float-right">Submit</button>
</form>

@endsection