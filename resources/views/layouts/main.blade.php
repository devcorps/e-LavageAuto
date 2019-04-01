<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>

    <link rel="shortcut icon" href="images/wash.jpg">

	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/slider.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
</head>

<body class="home">
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top headroom ">
        <div class="container">
            <div class="navbar-header">
                <!-- Button for smallest screens -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand" href="{{ url('/') }}"><img src="uploads/logos/1552905418.jpg" alt="E-WASH" width="100px" height="50px"></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right">
                    <li><a href="{{ url('/') }}">Accueil</a></li>
                    <li><a href="{{ url('about') }}">A propos</a></li>
                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                    @if (Route::has('login'))
                    <div class="btn">
                        @auth
                        <a href="{{ url('/home') }}">Desktop</a>
                        @else
                        <a href="{{ route('login') }}" class="navbar-link">SIGN IN / SIGN UP</a>
                        @endauth
                    </div>
                    @endif
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
    <!-- /.navbar -->

    @yield('content')


    <footer id="footer" class="top-space">

        <div class="footer1">
            <div class="container">
                <div class="row">

                    <div class="col-md-3 widget">
                        <h3 class="widget-title"><div style="text-align: center;"><i class="fa fa-phone"></i></div></h3>
                        <div class="widget-body">
                            <p><div style="text-align: center;">(+225) 74622582/22469017 </div><br>
                        </div>
                    </div>
                    <div class="col-md-3 widget">
                        <h3 class="widget-title"><div style="text-align: center;"><i class="fa fa-envelope"></i></div> </h3>
                        <div class="widget-body">
                            <a href="mailto:#"><div style="text-align: center;">infos@reseaudigitaltechnologies-ci.com</div> </a><br>
                        </div>
                    </div>
                    <div class="col-md-3 widget">
                        <h3 class="widget-title"><div style="text-align: center;"><i class="fa fa-map-marker"></i> </div></h3>
                        <div class="widget-body">
                            <div style="text-align: center;"> Abidjan Cocody- Riviera Faya, route ancien camp</div>
                        </div>
                    </div>

                    <div class="col-md-3 widget">
                        <h3 class="widget-title">Follow me</h3>
                        <div class="widget-body">
                            <p class="follow-me-icons">
                                <a href="http://www.reseaudigitaltechnologies-ci.com/contactez-nous/"><i class="fa fa-envelope fa-2"></i></a>
                                <a href="https://www.linkedin.com/company/reseau-digital-technologies"><i class="fa fa-linkedin fa-2"></i></a>
                                <a href="https://web.facebook.com/Reseau-Digital-Technologies-237367473570558"><i class="fa fa-facebook fa-2"></i></a>
                            </p>
                        </div>
                    </div>


                </div> <!-- /row of widgets -->
            </div>
        </div>

        <div class="footer2">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 widget">
                        <div class="widget-body">
                            <p class="simplenav">
                                <a href="{{ url('/') }}">Home</a> |
                                <a href="{{ url('about') }}">About</a> |
                                <a href="{{ url('contact') }}">Contact</a> |
                                <b><a href="{{ route('login') }}">Sign up</a></b>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 widget">
                        <div class="widget-body">
                            <p class="text-right">
                                Copyright © 2019, Developpeurs Corporation. Designed by <a href="http://reseaudigitaltechnologies.com/" rel="designer">Reseau Digital Technologies</a>
                            </p>
                        </div>
                    </div>

                </div> <!-- /row of widgets -->
            </div>
        </div>

    </footer>

    <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="assets/js/headroom.min.js"></script>
    <script src="assets/js/slider.js"></script>
    <script src="assets/js/jQuery.headroom.min.js"></script>
    <script src="assets/js/template.js"></script>
</body>

</html>
