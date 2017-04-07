<!DOCTYPE html>
<html lang="en" ng-app="myApp">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blog Post - Start Bootstrap Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs.css')}}" rel="stylesheet">
    <script src="//code.angularjs.org/1.3.0-rc.1/angular.min.js"></script>
    <script src="//code.angularjs.org/1.3.0-rc.1/angular-messages.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Derek Blog</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{route('home.Index')}}">Blog</a>
                </li>
                <li>
                    <a href="{{route('home.aboutme')}}">About</a>
                </li>
                <li>
                    <a href="{{route('Contact.Controller.index')}}">Contact</a>
                </li>
            </ul>
            <div class="col-sm-3 col-md-3 pull-right">
                {!! Form::open(['method' => 'post','class'=>'navbar-form','role'=>'search','action'=>'AdminPostController@home_search']) !!}
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="search" id="srch-term">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                {!! Form::close() !!}

            </div>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
@yield('content')
<!-- /.container -->
<!-- jQuery -->
@yield('footer')
<script src="{{asset('js/libs.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
@yield('scripts')
</body>

</html>
