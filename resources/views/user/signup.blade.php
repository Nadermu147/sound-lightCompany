@extends('template')
@section('content')
<link href="{{ asset('css/signup.css') }}" rel="stylesheet">
<h1>sign up</h1>
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="card card-signin flex-row my-5">
                <div class="card-img-left d-none d-md-flex">
                    <!-- Background image for card set in CSS! -->
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">Register</h5>
                    <form class="form-signin clearfix" method="post" action="{{url('signup')}}">
                        @csrf
                        <div class="form-label-group">
                            <label for="name">Username</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Username" required autofocus>

                        </div>

                        <div class="form-label-group">
                            <label for="email">Email address</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required>
                        </div>

                        <hr>

                        <div class="form-label-group">
                            <input type="password" id="password" name="password"class="form-control" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>

                        <div class="form-label-group">
                            <input type="repassword" id="repassword"name="password_confirmation" class="form-control" placeholder="Password" required>
                            <label for="repassword">Confirm password</label>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
                        <a class="d-block text-center mt-2 small" href="#">Sign In</a>
                        <hr class="my-4">
                        <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign up with Google</button>
                        <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign up with Facebook</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
