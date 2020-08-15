@extends('admin.template')
@section('admin-content')
<h1>Add new user</h1>


<div class="container">
    <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="card card-signin flex-row my-5">
                <div class="card-img-left d-none d-md-flex">
                    <!-- Background image for card set in CSS! -->
                </div>
                <div class="card-body">

                    <form class="form-signin clearfix" method="post" action="{{url('admin/users')}}">
                        @csrf
                        <div class="form-label-group">
                            <label for="name">Username</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="username">
                        </div>

                        <div class="form-label-group">
                            <label for="email">Email address</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>


                        <div class="form-label-group">
                            <label for="role">Role</label>
                            <select class="form-control"id="role" name="role">
                                <option value="0">Choose Role </option>
                                @foreach($roles as $role)
                                <option value="{{$role->id}}"}}>{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="form-label-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password"class="form-control">
                        </div>

                        <div class="form-label-group">
                             <label for='repassword'>Confirm password</label>
                             <input type="password" id="repassword" name="password_confirmation" class="form-control" placeholder="Password" required>

                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Submit</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection