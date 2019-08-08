<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
     <!--CSRF Token-->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width" />

<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link rel="icon" type="image/png" href="{{URL::asset('images/icons/favicon.ico')}}"/>
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/util.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/main.css')}}">

    <!-- Bootstrap core CSS -->
    <link href="{{URL::asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{URL::asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{URL::asset('css/clean-blog.min.css')}}" rel="stylesheet">


    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{URL::asset('css/light-bootstrap-offnavbar.css?v=1.4.0')}}" rel="stylesheet"/>
    <style>
        .footer{
            text-align:right;
        }
        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .top-center {
            align:center;
            position: absolute;
            right: 30%;
            top: 18px;
        }

        .content {
            text-align: center;
        }
        .content-r {
            text-align: right;
        }
        .content2 {
            position: relative;
            top:20px;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 80px;
            text-align: center;
            font-size: 18px;
            color: #899199;
        }
        .title {
            font-size: 84px;
            color:white;
        }
        @media (max-width: 576px) {
            .title {
                font-size: 40px;
            }
        }
        .links > a {
            color: white;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .pagination li{
            list-style-type: none;
            float: left;
            margin-left: 10px;
        }
        .pagination li span {
            color: #000;
        }
        .pagination li a {
            color: #000;
            text-decoration: none;
        }


        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{route('welcome')}}">Главная</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Меню
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog') }}">Новости</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contacts') }}">Контакты</a>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        Информация &dArr;
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('docs') }}">Документы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('invite') }}">Поступление</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('adm') }}">Администрация</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('own') }}">Учредители</a>
                        </li>
                    </ul>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}">Личный кабинет</a></li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Вход</a></li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                            @endif
                        </li>
                    @endauth
                @endif
            </ul>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Упс!</strong> Что-то пошло не так.

            </div>
        @endif
    </div>
</nav>

    @yield('content')
<div class="content2">
    <div>
        &#169;  2019
    </div>
</div>
<!-- Bootstrap core JavaScript -->
<script src="{{URL::asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Custom scripts for this template -->
<script src="{{URL::asset('js/clean-blog.min.js')}}"></script>

</body>

</html>
