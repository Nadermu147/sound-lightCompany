<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>SoundLight</title>

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>

<body>
    <header class="mb-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img class="nav-logo"
                        src="{{ asset('images/light-sound.png') }}"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('about') }}">About</a>
                        </li>

                        @unless($pages->isEmpty())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    pages
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach ($pages as $page)
                                        <a class="dropdown-item" href="{{ url($page->slug) }}">{{ $page->name }}</a>
                                    @endforeach
                                </div>

                            </li>
                        @endunless


                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('shop') }}">Shop</a>
                        </li>
                    </ul>



                    <ul class="navbar-nav ml-auto">
                        @if (session('id'))
                            @if (session('role') === 17)
                                <li class="nav-item">
                                    <a class="nav-link font-weigh-bold" href="{{ url('admin ') }}">Dashboard</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ url('logout ') }}">{{ ucfirst(session('name')) }},Logout</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('signup') }}">Sign up</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('login') }}">Login</a>
                            </li>
                        @endif
                    </ul>
                    <div id='mini-cart' class="cart">
                        <a class="text secondary" href=" {{ url('cart') }}">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart4" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                            </svg>

                            <span>{{ $cart_count ?: '' }}</span>
                        </a>
                    </div>
                </div>
            </div>

        </nav>





    </header>

    <main>
        {{-- Search form --}}
        <div class="container" style="margin-top: 50px;">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <form id="searchp" action="{{ route('search') }}"method="GET" role="search">
                            {{ csrf_field() }}
                            {{-- <div class="md-form active-pink active-pink-2 mb-3 mt-0">

                                <input class="md-form mt-0" id="serachpro" type="text"
                                    value="{{ request()->input('query') }}" name="query"
                                    placeholder="Search for product">

                            </div> --}}
                            <div class="md-form active-pink active-pink-2 mb-3 mt-0">
                                <input class="form-control" id="serachpro" name="query" type="text"autocomplete="off" placeholder="{{ request()->input('query') }}" aria-label="Search">
                              </div>
                        </form>

                    </div>
                    <div id="list-search"></div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>


        <div class="container">
            <div id='alert'></div>
            @if (session('status'))
                <div class="alert alert-success">
                    {!! session('status') !!}
                </div>
            @endif

            @if (session('status-fail'))
                <div class="alert alert-danger">
                    {{ session('status-fail') }}
                </div>
            @endif
            @if ($errors->any())

                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div>

    </main>
    <footer class="bg-light">
        <div class="container text-center p-5"> @Develpoer by Nader Muhesen 2020</div>

    </footer>
    <!--       -->
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);

    </script>

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>

</body>

</html>
