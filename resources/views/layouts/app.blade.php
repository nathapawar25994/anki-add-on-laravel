<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>{% block title %}{% endblock %}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/bootstrap-responsive.min.css') }}" rel="stylesheet">

<!-- <link href="static/css/bootstrap.min.css" rel="stylesheet"> -->
<!-- <link href="static/css/bootstrap-responsive.min.css" rel="stylesheet"> -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

<!-- <link href="static/css/font-awesome.css" rel="stylesheet">
<link href="static/css/style.css" rel="stylesheet">
<link href="static/css/pages/dashboard.css" rel="stylesheet"> -->
{% block extracss %}{% endblock %}


<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
{% include 'navbar_public.html' %}
<div class="main">
  <div class="main-inner">
    <div class="container">
      {% block content %}{% endblock %}
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->



<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<!-- <script src="static/js/jquery-1.7.2.min.js"></script>  -->
<script src="{{ asset('js/jquery-1.7.2.min.js') }}"></script>
<script src="{{ asset('js/excanvas.min.js') }}" ></script>
<script src="{{ asset('js/chart.min.js') }}" ></script>
<script src="{{ asset('js/bootstrap.js') }}" ></script>
<script src="{{ asset('js/full-calendar/fullcalendar.min.js') }}" ></script>
<script src="{{ asset('js/base.js') }}"></script>

<!-- <script src="static/js/excanvas.min.js"></script> 
<script src="static/js/" type="text/javascript"></script> 
<script src="static/js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="static/js/full-calendar/fullcalendar.min.js"></script>
 
<script src="static/js/base.js"></script>  -->

{% block extrajs %}{% endblock %}
</body>
</html>
