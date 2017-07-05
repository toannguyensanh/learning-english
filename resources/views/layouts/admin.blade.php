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
    <!-- Toastr style -->
    <link href="{{URL::asset('assets/css/toastr.min.css')}}" rel="stylesheet">

     @yield('add-style')

    <link href="{{URL::asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet">
   
</head>

<body class="@yield('body_class')">
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="{{URL::asset('assets/images/profile_small.jpg')}}" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.html">Profile</a></li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            <img alt="image" class="img-circle" src="{{URL::asset('assets/images/profile_small.jpg')}}" />
                        </div>
                    </li>

                    @include('admin.menu.custom-menu', array('admin_menu' => Menu::get('admin_menu') ))

                </ul>
            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome to Admin Page</span>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i>Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>@yield('title-page')</h2>
                    <ol class="breadcrumb">
                        @yield('breadcrumb')                        
                    </ol>
                </div>
                <div class="col-lg-2">
                </div>
            </div>
            <div class="notifications">
                <!-- <div class="alert alert-info alert-dismissable animated fadeInDown" style="margin-top: 20px; padding: 0 10px">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    A wonderful serenity has taken possession. <a class="alert-link" href="#">Alert Link</a>.
                </div>
                <div class="alert alert-danger alert-dismissable animated fadeInDown" style="margin-top: 20px; padding: 0 10px">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    A wonderful serenity has taken possession. <a class="alert-link" href="#">Alert Link</a>.
                </div> -->
            </div>
            <div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="footer">
                <div class="pull-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2015
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