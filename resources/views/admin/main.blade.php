@extends('admin.template')
@section('admin-content')
<h1>Welcome, {{ucfirst(session('name'))}}</h1>
@endsection