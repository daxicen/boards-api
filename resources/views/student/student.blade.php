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

    <style>
        .marginated{
            margin-top: 12px;
            margin-bottom: 12px;
        }

    </style>

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

        <!-- user appInstance dumped by laravel -->
        <input type="text"  id="app_instance" name="app_instance"  value="{{ 7-6 }}" hidden>

        <div class="col-md-10 col-md-offset-1">

                <!-- Basic information -->
                <div class="panel panel-primary">

                    <div class="panel-heading">1.0 Register user Test </div>

                    <div class="panel-body">

                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2 marginated">
                                    <input id="first_name" type="text" class="form-control" value=""
                                           name="first_name" placeholder="First name" ng-model="rawStudent.first_name" >
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2 marginated">
                                    <input id="name" type="text" class="form-control" value=""
                                           name="last_name" placeholder="Surname name" ng-model="rawStudent.last_name" >
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2 marginated">
                                    <input id="email" type="text" class="form-control" value=""
                                           name="email" placeholder="Email" ng-model="rawStudent.email" >
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2 marginated">
                                    <input id="password" type="text" class="form-control" value=""
                                           name="password" placeholder="choose password" ng-model="rawStudent.password" >
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2 marginated"  >
                                    <button  class="btn btn-primary" ng-click="registerStudent()"> Register user </button>
                                </div>
                            </div>
                    </div>

                </div>

                <!-- Academic information -->
                <div class="panel panel-primary">

                    <div class="panel-heading">2.0 Academic info Test</div>

                    <div class="panel-body">

                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2 marginated">
                                <input id="department" type="text" class="form-control" value=""
                                       name="department" placeholder="Department" ng-model="rawStudent.department" >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2 marginated">
                                <input id="course" type="text" class="form-control" value=""
                                       name="course" placeholder="Course" ng-model="rawStudent.course" >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2 marginated">
                                <input id="year" type="text" class="form-control" value=""
                                       name="year" placeholder="year" ng-model="rawStudent.year" >
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2 marginated"  >
                                <button  class="btn btn-primary" ng-click="addAcademicInfo()"> Update student </button>
                            </div>
                        </div>
                    </div>

               </div>

                <!-- Additional information -->
                <div class="panel panel-primary">

                    <div class="panel-heading">3.0 Additional info Test</div>

                    <div class="panel-body">

                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2 marginated">
                                <input id="title" type="text" class="form-control" value=""
                                       name="title" placeholder="Representative title" ng-model="rawStudent.title" >
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2 marginated"  >
                                <button  class="btn btn-primary" ng-click="updateStudentTitle()"> Update student </button>
                            </div>
                        </div>
                    </div>

               </div>

                <!-- Academic information -->
                <div class="panel panel-primary">

                    <div class="panel-heading">4.0 Login Test</div>

                    <div class="panel-body">

                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2 marginated">
                                <input id="email" type="text" class="form-control" value=""
                                       name="email" placeholder="Email" ng-model="loginInfo.email" >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2 marginated">
                                <input id="password" type="text" class="form-control" value=""
                                       name="password" placeholder="password" ng-model="loginInfo.password" >
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2 marginated"  >
                                <p >  << loginStatus >> </p>
                                <button  class="btn btn-primary" ng-click="login()"> Login</button>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- debug -->
                <div class="panel panel-primary" ng-show="true">
                    <div class="panel panel-heading">Debug Text </div>

                    <div class="panel panel-body">
                        <div class="col-sm-6 col-sm-offset-1">
                        <textarea type="text" class="form-control" id="message" name="message" placeholder="message" ng-model="debugDisplayer" >
                                </textarea>
                        </div>
                    </div>


                </div>
                 <!-- debug -->



        </div>

    </div>




</div>

<!--Library Scripts -->
<script src="{{ asset('js/library/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/library/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/library/angular.min.js') }}"></script>


<!--User Scripts -->
<script src="{{ asset('js/app/student.js') }}"></script>

</body>
</html>


























