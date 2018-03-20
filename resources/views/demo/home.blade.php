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


    <div class="container" ng-controller="StudentController">

        <!-- user id dumped by laravel -->
        <input type="text"  id="user_id" name="user_id"  value="{{ 7-6 }}" hidden>



        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">


                    <div class="panel-body">
                        <!-- mini menu -->
                        <div class="row mini-menu">
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#">Home</a></li>
                                <li><a href="#"> <i class="fa fa-clock"></i>Schedules</a></li>
                                <li><a href="#">Assignments</a></li>
                                <li class="pull-right"><button class="btn btn-primary" ng-click="showComposeForm()"> <i class="fa fa-edit"> </i> Send post</button></li>
                            </ul>

                        </div>
                        <!-- /mini menu -->

                        <!-- Posts -->
                        <div class="row posts-holder">

                            <div class="post" ng-repeat="post in posts" >

                                <div class=" post-heading">
                                    <h4> << post.heading >> </h4>
                                </div>

                                <div class=" post-body">
                                    <p> << post.message >> </p>
                                </div>

                                <div class=" post-sender">
                                    <p> << post.sender_name >> , << post.sender_title >> </p>
                                    <p> <i class="fa fa-clock"></i> << post.created_at >> </p>
                                </div>

                            </div>


                        </div>
                        <!-- /Posts -->


                    </div>

                    <!-- Modal (Sending a post) -->
                    <div class="modal fade" id="composePostModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title" id="myModalLabel"> Compose a Post </h4>
                                </div>


                                <div class="modal-body">

                                    <form name="frmEmployees" class="form-horizontal" novalidate="">

                                        <div class="form-group ">
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <select class="form-control" ng-model="targetScope" >
                                                    <option value="" selected hidden>Class</option>
                                                    <option value="class" >Class</option>
                                                    <option  value="department"> Department </option>
                                                    <option  value="institute"> Institute </option>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="form-group ">
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <input type="text" class="form-control" id="item_name" name="heading" placeholder="Heading" value="<< heading >>"
                                                       ng-model="raw_post.heading" ng-required="true">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <textarea type="text" class="form-control" id="message" name="message" placeholder="message" ng-model="raw_post.message">
                                                </textarea>
                                            </div>
                                        </div>

                                    </form>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="btn-save" ng-click="sendPost('new',{{ 9-8 }})"> Send </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- //Modal (Sending a post) -->


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




</div>

<!--Library Scripts -->
<script src="{{ asset('js/library/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/library/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/library/angular.min.js') }}"></script>


<!--User Scripts -->
<script src="{{ asset('js/app/user.js') }}"></script>

</body>
</html>












