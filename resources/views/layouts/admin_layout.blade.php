<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Being Liberal</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="assets/materialize/css/materialize.min.css" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="{{asset('assets/js/morris/morris-0.4.3.min.css')}}" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="{{asset('assets/css/custom-styles.css')}}" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    {{--<link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css">--}}
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,500,700,400italic|Material+Icons">

    <link rel="stylesheet" href="{{asset('css/toastr.min.css') }}">

</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand waves-effect waves-dark" style="background: #00BFFF" href="{{route('home')}}" target="_blank"><i class="large material-icons">landscape</i> <strong>Being Liberal</strong></a>
				
		<div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                {{--<li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown4"><i class="fa fa-envelope fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown3"><i class="fa fa-tasks fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown2"><i class="fa fa-bell fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>--}}
                <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1"><i class="fa fa-user fa-fw"></i> <b>{{auth()->user()->firstname}}</b> <i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
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



	   <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li id="dashboard-menu">
                        <a class=" waves-effect waves-dark" href="{{route('admin-home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li id="category-menu">
                        <a href="{{route('admin-categories')}}" class="waves-effect waves-dark"><i class="fa fa-outdent"></i>Manage Categories</a>
                    </li>
                    <li id="article-menu">
                        <a href="{{route('admin-articles')}}" class="waves-effect waves-dark"><i class="fa fa-desktop"></i>Add Articles</a>
                    </li>
					<li id="manage-article-menu">
                        <a href="{{route('manage-articles')}}" class="waves-effect waves-dark"><i class="fa fa-book"></i> Manage Articles</a>
                    </li>
                    <li id="comments">
                        <a href="{{route('comments')}}" class="waves-effect waves-dark"><i class="fa fa-qrcode"></i> Comments</a>
                    </li>
                    
                    <li id="manage-members">
                        <a href="{{route('members')}}" class="waves-effect waves-dark"><i class="fa fa-table"></i> Members</a>
                    </li>
                    <li id="advertisement">
                        <a href="{{route('advertisement')}}" class="waves-effect waves-dark"><i class="fa fa-edit"></i> Advertisement </a>
                    </li>
                    @if(checkPermission(['superadmin']))
                        <li id="new_admin">
                            <a href="{{route('new_admin')}}" class="waves-effect waves-dark"><i class="fa fa-fw fa-file"></i> Add Admin</a>
                        </li>
                    @endif
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
      
		<div id="page-wrapper">
		  <div class="header">

			  <br>
			  <h3></h3>

		</div>
            <div id="page-inner">
				<div id="app">
					@yield('content')
				</div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
	<script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('assets/js/jquery-1.10.2.js')}}"></script>
	
	<!-- Bootstrap Js -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	
	<script src="{{asset('assets/materialize/js/materialize.min.js')}}"></script>
	
    <!-- Metis Menu Js -->
    <script src="{{asset('assets/js/jquery.metisMenu.js')}}"></script>
    <!-- Morris Chart Js -->
    {{--<script src="{{asset('assets/js/morris/raphael-2.1.0.min.js')}}"></script>
    <script src="{{asset('assets/js/morris/morris.js')}}"></script>
	
	
	<script src="{{asset('assets/js/easypiechart.js')}}"></script>
	<script src="{{asset('assets/js/easypiechart-data.js')}}"></script>--}}
	
	 <script src="{{asset('assets/js/Lightweight-Chart/jquery.chart.js')}}"></script>
	
    <!-- Custom Js -->
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