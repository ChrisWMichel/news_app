<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Being Liberal</title>
    <link rel="stylesheet" href="assets/materialize/css/materialize.min.css" media="screen,projection" />
    {{--<link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" />--}}
    <!-- FontAwesome Styles-->
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="{{asset('assets/js/morris/morris-0.4.3.min.css')}}" rel="stylesheet" />
    <!-- Custom Styles-->

    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,500,700,400italic|Material+Icons">
    {{--<link href="https://unpkg.com/vuetify/dist/vuetify.min.css" rel="stylesheet">--}}

    <link href="{{asset('assets_public/css/custom-styles.css')}}" rel="stylesheet" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/toastr.min.css') }}">

    <style>
        .admin-btn li a{
            color: white ;
            text-decoration: none !important;
            vertical-align: middle !important;
        }
        .admin-btn{
            margin-bottom: 20px !important;
        }

    </style>
</head>

<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-fixed-top top-navbar" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand center waves-effect waves-dark " href="index.html">
                <img src="{{asset('images/header.jpg')}}" alt="Being Liberal" style="margin-left: 75px;"  height="55px" width="55px">
            </a>

            <div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
        </div>

        @guest
            <ul class="nav navbar-top-links navbar-right">
                {{--<li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown4"><i class="fa fa-envelope fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown3"><i class="fa fa-tasks fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown2"><i class="fa fa-bell fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>--}}
                <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown2"><i class="fa fa-user fa-fw"></i> <b>Login/Register</b> <i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>

        @else
        <ul class="nav navbar-top-links navbar-right">
            {{--<li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown4"><i class="fa fa-envelope fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown3"><i class="fa fa-tasks fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>--}}
             @if(checkPermission(['admin','superadmin']))
                 <div  class="admin-btn btn btn-primary btn-xs " >
                     <li class="waves-effect "><a href="{{ route('admin-home') }}">Admin</a></li>
                 </div>


            @endif

            <li><a class="dropdown-button waves-effect waves-dark" href="#" data-activates="dropdown1"><i class="fa fa-user fa-fw"></i> <b>{{auth()->user()->firstname}}</b> <i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
        @endguest
    </nav>


    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="#"><i class="fa fa-user fa-fw"></i> My Profile</a>
        </li>
        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
        </li>
        <li>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out fa-fw"></i>Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>

    <ul id="dropdown2" class="dropdown-content">
        <li class="nav-item"><a class="nav-link" style="text-align: right" href="javascript:" data-toggle="modal" data-target="#registerModal">Register</a></li>
        <li class="nav-item"><a class="nav-link" style="text-align: right" href="javascript:" data-toggle="modal" data-target="#loginModal">Login</a></li>
    </ul>



    <!--/. NAV TOP  -->

    <!-- /. NAV SIDE  -->

    {{--<div id="page-wrapper">--}}
        <div id="app">
        <div id="page-inner">


                @yield('content')
            </div>

            <vue-login></vue-login>
            <vue-register></vue-register>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
{{--</div>--}}
<!-- /. WRAPPER  -->
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/core.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-1.10.2.js')}}"></script>

<!-- Bootstrap Js -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<script src="{{asset('assets/materialize/js/materialize.min.js')}}"></script>

<!-- Metis Menu Js -->
<script src="{{asset('assets/js/jquery.metisMenu.js')}}"></script>
<script src="{{asset('assets/js/custom-scripts.js')}}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script>
    @if(Illuminate\Support\Facades\Session::has('success'))
    toastr.success("{{Illuminate\Support\Facades\Session::get('success')}}");
    @endif

    @if(Illuminate\Support\Facades\Session::has('info'))
    toastr.info("{{Illuminate\Support\Facades\Session::get('info')}}");
    @endif

</script>

@yield('jquery')

</body>

</html>