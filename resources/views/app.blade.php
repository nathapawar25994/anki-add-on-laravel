<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Anki-Web App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet"> -->
    <link href="{{ asset('css/bootstrap-responsive.min.css') }}" rel="stylesheet">
    <!-- <link href="css/pages/plans.css" rel="stylesheet">  -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />

    <link href="{{ asset('css/image-picker.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/plans.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/reports.css') }}" rel="stylesheet">
    <link href="{{ asset('css/recorder.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/demo.min.css') }}" rel="stylesheet"> -->

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> -->


    @yield('haider_scripts')
    <style>

        /* * {
  border: 1px solid #000000;
} */
</style>
    <!-- <link href="css/font-awesome.css" rel="stylesheet"> -->
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="{{ route('home') }}">Anki-Web App </a>
                <div class="nav-collapse">
                    <ul class="nav pull-right">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i> Account <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:;">Settings</a></li>
                                <li><a href="javascript:;">Help</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> {{Auth::User()->name}} <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:;">Profile</a></li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-search pull-right">
                        <input type="text" class="search-query" placeholder="Search">
                    </form>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!-- /container -->
        </div>
        <!-- /navbar-inner -->
    </div>
    <!-- /navbar -->
    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <ul class="mainnav">
                    <li class="active"><a href="{{ route('home') }}"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                    <!-- <li><a href="reports.html"><i class="icon-list-alt"></i><span>Reports</span> </a> </li> -->
                    <!-- <li><a href="guidely.html"><i class="icon-facetime-video"></i><span>App Tour</span> </a></li> -->
                    <li><a href="{{ route('Add') }}"><i class="icon-bar-chart"></i><span>Add</span> </a> </li>
                    <li><a href="{{ route('browser') }}"><i class="icon-search"></i><span>Browse</span> </a> </li>

                </ul>
            </div>
            <!-- /container -->
        </div>
        <!-- /subnavbar-inner -->
    </div>
    <!-- /subnavbar -->
    <div class="">
        <div class="main-inner">
            <div class="container">
                @include('flash-message')
                @yield('content')

                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /main-inner -->
    </div>
    <!-- /main -->

    <!-- /extra -->
    <div class="footer">
        <div class="footer-inner">
            <div class="container">
                <div class="row">
                    <div class="span12"> &copy; 2020 <a href="#">Anki web App</a>. </div>
                    <!-- /span12 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /footer-inner -->
    </div>
    <!-- /footer -->
    <!-- Le javascript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/base.js') }}"></script> -->

    <script src="{{asset('js/jquery-1.7.2.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{ asset('js/base.js') }}"></script>

    <script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
        type="text/javascript"></script>

    <!-- <script language="javascript" type="text/javascript" src="js/full-calendar/fullcalendar.min.js"></script> -->
    <!-- <script src="js/excanvas.min.js"></script> -->
    <script src="{{ asset('js/full-calendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('js/extention/choices.js') }}"></script>

    <script src="{{ asset('js/excanvas.min.js') }}"></script>
    <script src="{{ asset('js/chart.min.js') }}"></script>
    <script src="{{ asset('js/ouicards.js') }}"></script>
    <script src="{{ asset('js/image-picker.min.js') }}"></script>
    <script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
    <script src="{{ asset('js/app1.js') }}"></script>
    <script src="{{ asset('js/app2.js') }}"></script>

    @yield('footer_scripts')

    <!-- <script src="js/chart.min.js" type="text/javascript"></script>
	
    <script src="js/base.js"></script> -->
</body>

</html> 