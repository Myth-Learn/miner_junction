<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Miner Junction</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.css') }}">
    <!-- Custom CSS -->
    <link href="{{ asset('css/user_style.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Style-CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="signup-main-wrapper">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <a class="navbar-brand" href="#"><img src="{{ asset('images/logo_sm.png') }}"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="nav-item dropdown">
                            @if (!Request::is('admin/*'))
                                @if (basename(request()->path()) == 'login')
                                    <a href="{{ route('register') }}" class="btn btn-primary btn-round" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-address-card-o" aria-hidden="true"></i> Sign Up
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-primary btn-round" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-sign-in" aria-hidden="true"></i> Login
                                    </a>
                                @endif
                            @endif
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>

                            <ul>
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
            <!-- /.navbar-collapse -->
        </div>
         <!-- /.container -->
    </nav>

    @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
