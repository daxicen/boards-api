<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" ng-app="student">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app/student.css') }}" rel="stylesheet">
    <link href="{{ asset('css/library/font-awesome/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/library/bootstrap.css') }}" rel="stylesheet">

</head>


<body>

<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
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
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    <div class="container" ng-controller="MainController">

        <!-- user id dumped by laravel -->
        <input type="text"  id="user_id" name="user_id"  value="{{ 7-6 }}" hidden>

        <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">1.0 Register App Instance</div>

                    <div class="panel-body">

                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2 ">
                                    <input id="name" type="text" class="form-control" value="Vodaphone smart 4 mini, android 4.2 jelly bean"
                                           name="phone_details" placeholder="Phone Details" ng-model="rawAppInstance.phone_details" >
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 "  style="margin: 12px;">
                                    <button  class="btn btn-primary" ng-click="registerApp()"> Register App </button>
                                </div>
                            </div>
                    </div>

                    <div class="container" ng-show="true">
                        <div class="col-sm-6 col-sm-offset-1">
                            Debug Text
                            <textarea type="text" class="form-control" id="message" name="message" placeholder="message" ng-model="debugDisplayer" >
                            </textarea>
                        </div>
                    </div>

                </div>

                </div>

    </div>




</div>

<!--Library Scripts -->
<script src="{{ asset('js/library/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/library/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/library/angular.min.js') }}"></script>


<!--User Scripts -->
<script src="{{ asset('js/app/app-instance.js') }}"></script>

</body>
</html>


























