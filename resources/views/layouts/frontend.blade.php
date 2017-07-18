<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Learning English | @yield('title')</title>
    <link href="{{URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/css/font-awesome.min.css')}}" rel="stylesheet"> 

    @yield('add-style')

    <link href="{{URL::asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/css/frontend.css')}}" rel="stylesheet">
</head>

<body class="top-navigation @yield('body_class')">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom white-bg">
                <nav class="navbar navbar-static-top" role="navigation">
                    <div class="navbar-header">
                        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                            <i class="fa fa-reorder"></i>
                        </button>
                        <a href="/" class="navbar-brand">Learning English</a>
                    </div>
                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="nav navbar-nav">
                            <li><a aria-expanded="false" href="/phrases">1000 Most Common English Phrases</a></li>
                            <li><a aria-expanded="false" href="/word">1500 Most Common English Words</a></li>

                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            @if (Route::has('login'))
                                @if (Auth::check())
                                    <li class="dropdown">
                                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <span class="caret"></span></a>
                                        <ul role="menu" class="dropdown-menu">
                                            <li>
                                                <a href="{{ url('/profile') }}"><i class="fa fa-sign-out"></i> Profile</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                    <i class="fa fa-sign-out"></i> Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    </li>                                    
                                @else
                                    <li>
                                        <a href="{{ url('/login') }}">Login</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/register') }}">Register</a>
                                    </li>
                                @endif
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="notifications">
                            @if (Session::has('success'))
                                <div class="alert alert-info alert-dismissable animated fadeInDown" style="margin-top: 20px;">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    {{ Session::get('success') }}
                                </div>
                            @elseif (Session::has('error'))
                                <div class="alert alert-danger alert-dismissable animated fadeInDown" style="margin-top: 20px;">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    {{ Session::get('error') }}
                                </div>
                            @elseif (count($errors) > 0)
                                <div class="alert alert-danger  alert-dismissable animated fadeInDown" style="margin-top: 20px;">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content">
                <div class="container">
                    @yield('content')
                </div>
            </div>
            <div class="footer">
                <div class="text-center">
                    <strong>Copyright</strong> Example Company &copy; 2017-2018
                </div>
            </div>
        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="{{URL::asset('assets/js/jquery-2.1.1.js')}}"></script>
    <script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.metisMenu.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.slimscroll.min.js')}}"></script>
    <!-- Custom and plugin javascript -->
    <script src="{{URL::asset('assets/js/inspinia.js')}}"></script>
    <script src="{{URL::asset('assets/js/pace.min.js')}}"></script>

    @yield('add-script')

</body>

</html>